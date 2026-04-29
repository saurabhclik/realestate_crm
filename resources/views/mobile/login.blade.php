<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="{{ asset($logo) }}">
    <title>Login | Enterprise Portal</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Playfair+Display:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="{{ asset('mobile/css/login.css') }}" rel="stylesheet">
</head>
<body style="background: linear-gradient(135deg, rgba(79, 70, 229, 0.2) 0%, rgba(67, 56, 202, 0.1) 100%);">
    <div class="flash">
        <div class="logo">
            <img src="{{ asset($logo) }}" alt="Enterprise Portal" width="82" height="82">
        </div>
        <h4 class="text-light">Lead Management Portal</h4>
        <p class="subtitle">The ultimate business management solution for modern enterprises</p>
        <div class="loader"></div>
    </div>

    <div class="particles" id="particles"></div>
    <div class="app-login-wrapper">
        <div class="app-login-container">
            <div class="app-brand">
                <div class="app-logo shadow">
                    <span class="bg-light rounded">
                        <img src="{{ asset($logo) }}" alt="Enterprise Portal">
                    </span>
                </div>
                <h1 class="app-title">Welcome Back</h1>
                <p class="app-subtitle">Sign in to access your enterprise dashboard and management tools</p>
            </div>
            
            <form action="{{ route('mobile.login') }}" method="POST">
                @csrf
                <input type="hidden" name="action" value="login">
                <input type="hidden" name="fcm_token" id="fcm_token">
                <div class="mb-4">
                    <label for="email" class="form-label">Corporate Email</label>
                    <input type="email" class="form-control form-control-app" name="email" id="email" placeholder="your.name@company.com" required>
                </div>
                
                <div class="mb-4">
                    <label for="password" class="form-label">Password</label>
                    <div class="input-group mb-2">
                        <input type="password" class="form-control form-control-app" id="password" name="password" placeholder="••••••••" required>
                        <span class="input-group-text" id="togglePassword">
                            <i class="fas fa-eye"></i>
                        </span>
                    </div>
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="rememberMe">
                            <label class="form-check-label" for="rememberMe" style="font-size: 0.8125rem;">Remember me</label>
                        </div>
                        <a href="#" data-bs-toggle="modal" data-bs-target="#resetPasswordModal" class="forgot-password-link">Forgot password?</a>
                    </div>
                </div>
                
                <div class="d-grid gap-2 mt-4">
                    <button type="submit" class="btn btn-app btn-primary">
                        <i class="fas fa-sign-in-alt me-2"></i> Sign In
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <script src="{{ asset('mobile/js/login.js') }}"></script>
    <script type="module">
        import { initializeApp } from "https://www.gstatic.com/firebasejs/10.7.1/firebase-app.js";
        import { getMessaging, getToken, onMessage } from "https://www.gstatic.com/firebasejs/10.7.1/firebase-messaging.js";

        let firebaseEnabled = @json(!empty($firebaseConfig));
        let firebaseConfig = @json($firebaseConfig);

        if (!firebaseEnabled || !firebaseConfig?.api_key) 
        {
            console.log("Firebase disabled");
        } 
        else 
        {
            const app = initializeApp({
                apiKey: firebaseConfig.api_key,
                authDomain: firebaseConfig.auth_domain,
                projectId: firebaseConfig.project_id,
                storageBucket: firebaseConfig.storage_bucket,
                messagingSenderId: firebaseConfig.messagingSenderId,
                appId: firebaseConfig.app_id
            });
            const messaging = getMessaging(app);
            let fcmToken = null;
            async function initFCM() 
            {
                try 
                {
                    const swRegistration = await navigator.serviceWorker.register('/firebase-messaging-sw.js');
                    const permission = await Notification.requestPermission();
                    if (permission !== "granted") return;
                    fcmToken = await getToken(messaging, {
                        vapidKey: firebaseConfig.vapidKey,
                        serviceWorkerRegistration: swRegistration
                    });
                    document.getElementById("fcm_token").value = fcmToken;

                } 
                catch (e) 
                {
                    console.log("FCM error:", e);
                }
            }

            initFCM();
            onMessage(messaging, (payload) => {
                console.log("Foreground notification:", payload);

                const title = payload?.notification?.title || "Notification";
                const body = payload?.notification?.body || "";

                alert(title + "\n" + body);
            });
        }
    </script>
</body>
</html>