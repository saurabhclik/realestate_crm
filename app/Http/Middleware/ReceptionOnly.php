<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ReceptionOnly
{
    protected $allowedRoutes = [
        'lead/add',
        'lead/create',
        'lead/all-lead',
        'lead/filter-lead',
        'leads/filter-lead',
        'task/create',
        'task/store',
        'task/list',
        'data-center/data',
        'data-center/create',
        'data-center/store',
        'data-center/import/upload',
        'attendance-toggle',
        'setting/profile',
        'setting/profile/update',
        'setting/password/update',
        'lead/import/upload',
        'lead/generate-share-link',
    ];

    public function handle($request, Closure $next)
    {
        $userType = session('user_type');

        if ($userType === 'reception')
        {
            $currentPath = $request->path();
            $allowed = in_array($currentPath, $this->allowedRoutes)
                || preg_match('#^task/(create|store|delete|update-status|project)(/.*)?$#', $currentPath)
                || preg_match('#^data-center/(data|create|store|import/upload|comments|[0-9]+|status/[0-9]+)(/.*)?$#', $currentPath)
                || preg_match('#^lead/(edit|update|[0-9]+/comments)(/.*)?$#', $currentPath);

            if (!$allowed)
            {
                return redirect()->route('lead.add')
                    ->with('error', 'You do not have rights to access this page');
            }
        }

        return $next($request);
    }
}
