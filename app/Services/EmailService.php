<?php

namespace App\Services;

use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Config;
use Illuminate\Mail\Message;
use Exception;
use Illuminate\Support\Facades\Validator;

class EmailService
{
    private $fromEmail;
    private $fromName;
    private $smtpConfig;

    public function __construct()
    {
        $settings = DB::table('integration_settings')
            ->where('integration_type', 'gmail')
            ->where('status', 'active')
            ->first();

        if ($settings && !empty($settings->settings)) 
        {
            $config = json_decode($settings->settings, true);

            $this->smtpConfig = [
                'host'       => $config['mail_host'] ?? 'smtp.gmail.com',
                'port'       => $config['mail_port'] ?? 587,
                'encryption' => $config['mail_encryption'] ?? 'tls',
                'username'   => $config['mail_username'] ?? null,
                'password'   => $config['mail_password'] ?? null,
                'from' => [
                    'address' => $config['mail_from_address'] ?? null,
                    'name'    => $config['mail_from_name'] ?? null
                ]
            ];
        } 
        else 
        {
            $this->smtpConfig = [
                'host'       => 'smtp.gmail.com',
                'port'       => 587,
                'encryption' => 'tls',
                'username'   => null,
                'password'   => null,
                'from' => [
                    'address' => null,
                    'name'    => null
                ]
            ];
        }

        $this->fromEmail = $this->smtpConfig['from']['address'];
        $this->fromName  = $this->smtpConfig['from']['name'];
        $this->configureSmtp();
    }


    private function configureSmtp()
    {
        config([
            'mail.mailers.smtp.host' => $this->smtpConfig['host'],
            'mail.mailers.smtp.port' => $this->smtpConfig['port'],
            'mail.mailers.smtp.encryption' => $this->smtpConfig['encryption'],
            'mail.mailers.smtp.username' => $this->smtpConfig['username'],
            'mail.mailers.smtp.password' => $this->smtpConfig['password'],
            'mail.from.address' => $this->fromEmail,
            'mail.from.name' => $this->fromName,
        ]);
    }

    private function validateEmail($email)
    {
        if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) 
        {
            return false;
        }
        return true;
    }

    public function sendWithAttachments($to, $subject, $message, $attachments = [])
    {
        $processedAttachments = [];

        try 
        {
            if (!$this->validateEmail($to)) 
            {
                throw new \Exception("Invalid email address: {$to}");
            }

            Log::info('Attempting to send email', [
                'to' => $to,
                'subject' => $subject,
                'from' => $this->fromEmail
            ]);

            $processedAttachments = $this->processAttachments($attachments);

            Mail::html($message, function (Message $mail) use ($to, $subject, $processedAttachments) 
            {
                $mail->from($this->fromEmail, $this->fromName)
                     ->to($to)
                     ->subject($subject);
                foreach ($processedAttachments as $attachment) 
                {
                    $fullPath = storage_path('app/public/' . $attachment['path']);
                    if (file_exists($fullPath)) 
                    {
                        $mail->attach($fullPath, [
                            'as' => $attachment['name'],
                            'mime' => $attachment['mime'],
                        ]);
                    }
                }
            });

            $this->cleanupTempFiles($processedAttachments);

            Log::info('Email sent successfully', ['to' => $to]);

            return [
                'success' => true,
                'message' => 'Email sent successfully',
            ];

        } 
        catch (\Throwable $e) 
        {
            Log::error('Email send failed', [
                'error' => $e->getMessage(),
                'to' => $to
            ]);

            $this->cleanupTempFiles($processedAttachments);

            return [
                'success' => false,
                'message' => $e->getMessage()
            ];
        }
    }

    public function send($to, $subject, $message)
    {
        return $this->sendWithAttachments($to, $subject, $message, []);
    }

    public function sendTemplateWithAttachments($to, $templateId, $parameters = [], $subject = null, $attachments = [])
    {
        try {
            $template = DB::table('email_templates')->find($templateId);

            if (!$template) {
                throw new \Exception("Email template not found");
            }

            $message = $this->prepareTemplateMessage($template->body, $parameters);
            $emailSubject = $subject ?: $this->prepareTemplateMessage($template->subject, $parameters);

            Log::info('Sending template email', [
                'to' => $to,
                'template_id' => $templateId,
                'subject' => $emailSubject
            ]);

            return $this->sendWithAttachments($to, $emailSubject, $message, $attachments);

        } catch (\Exception $e) {
            Log::error('Email template send failed', [
                'error' => $e->getMessage(),
                'template_id' => $templateId,
                'to' => $to,
                'trace' => $e->getTraceAsString()
            ]);
            return [
                'success' => false,
                'message' => $e->getMessage()
            ];
        }
    }

    public function sendTemplate($to, $templateId, $parameters = [], $subject = null)
    {
        return $this->sendTemplateWithAttachments($to, $templateId, $parameters, $subject, []);
    }

    public function getTemplates()
    {
        return DB::table('email_templates')
            ->select('*')
            ->orderBy('created_at', 'desc')
            ->get();
    }

    public function createTemplate($data)
    {
        try {
            $templateId = DB::table('email_templates')->insertGetId([
                'name' => $data['name'],
                'subject' => $data['subject'] ?? '',
                'body' => $data['body'],
                'category' => $data['category'] ?? 'General',
                'created_at' => now(),
                'updated_at' => now()
            ]);

            return [
                'success' => true,
                'template_id' => $templateId,
                'message' => 'Email template created successfully'
            ];

        } catch (\Exception $e) {
            Log::error('Create email template error', ['error' => $e->getMessage()]);
            return [
                'success' => false,
                'message' => $e->getMessage()
            ];
        }
    }

    private function processAttachments($attachments)
    {
        $processed = [];

        if (empty($attachments)) {
            return $processed;
        }

        foreach ($attachments as $attachment) {
            if ($attachment instanceof \Illuminate\Http\UploadedFile) {
                try {
                    $originalName = $attachment->getClientOriginalName();
                    $fileName = time() . '_' . uniqid() . '_' . preg_replace('/[^A-Za-z0-9\.\-]/', '', $originalName);
                    $path = $attachment->storeAs('temp/email', $fileName, 'public');

                    $processed[] = [
                        'path' => $path,
                        'name' => $originalName,
                        'size' => $attachment->getSize(),
                        'mime' => $attachment->getMimeType(),
                        'extension' => $attachment->getClientOriginalExtension()
                    ];
                    
                    Log::info('Attachment processed successfully', [
                        'original_name' => $originalName,
                        'stored_path' => $path,
                        'size' => $attachment->getSize()
                    ]);
                } catch (\Exception $e) {
                    Log::error('Attachment processing error', [
                        'error' => $e->getMessage(),
                        'file' => $attachment->getClientOriginalName()
                    ]);
                }
            }
        }

        return $processed;
    }

    private function cleanupTempFiles($attachments)
    {
        try {
            foreach ($attachments as $attachment) {
                if (isset($attachment['path']) && Storage::disk('public')->exists($attachment['path'])) {
                    Storage::disk('public')->delete($attachment['path']);
                    Log::info('Cleaned up temp file', ['path' => $attachment['path']]);
                }
            }
        } catch (\Exception $e) {
            Log::error('Email cleanup temp files error: ' . $e->getMessage());
        }
    }

    private function prepareTemplateMessage($template, $parameters)
    {
        $message = $template;

        $defaultVariables = [
            'current_date' => now()->format('d F Y'),
            'current_time' => now()->format('h:i A'),
            'company_name' => '',
            'support_phone' => '',
            'support_email' => '',
            'website' => '',
            'year' => now()->format('Y'),
        ];

        $allVariables = array_merge($defaultVariables, $parameters);

        foreach ($allVariables as $key => $value) {
            $message = str_replace("{{" . $key . "}}", $value, $message);
            $message = str_replace("{" . $key . "}", $value, $message);
            $message = str_replace("%%" . $key . "%%", $value, $message);
        }

        return $message;
    }

}