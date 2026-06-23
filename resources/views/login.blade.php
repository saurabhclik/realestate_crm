<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Login | Pro-leadexpertz</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Pro-leadexpertz login" name="description">
    <meta content="saurabh" name="author">
    <link rel="shortcut icon" href="{{ asset($logo) }}">
    <link href="css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css">
    <link href="{{asset('css/icons.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('css/app.min.css')}}" id="app-style" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet" />
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Inter', Arial, sans-serif;
        }

        body {
            background: #eef4f3;
            /* overflow-x:hidden; */
            overflow: hidden
        }

        .container-main {
            display: flex;

            padding: 14px;
            gap: 14px;
        }

        /* ===== LEFT PANEL ===== */
        .left {
            width: 55%;
            background: linear-gradient(155deg, #ffffff 0%, #f0faf6 50%, #e8f4ef 100%);
            border-radius: 22px;
            padding: 40px 52px;
            position: relative;
            overflow: hidden;
            display: flex;
            flex-direction: column;
        }

        .left::before {
            content: "";
            position: absolute;
            top: 28px;
            right: 32px;
            width: 96px;
            height: 96px;
            background-image: radial-gradient(circle, #c5ddd5 1.5px, transparent 1.5px);
            background-size: 10px 10px;
            opacity: .65;
        }

        .left::after {
            content: "";
            position: absolute;
            bottom: -80px;
            left: -80px;
            width: 220px;
            height: 220px;
            background: radial-gradient(circle, rgba(16, 185, 129, .05) 0%, transparent 70%);
            border-radius: 50%;
        }

        /* ===== LOGO ===== */
        .logo {
            display: flex;
            flex-direction: column;
            align-items: flex-start;
            gap: 3px;
            position: relative;
            z-index: 1;
        }

        .logo-icon {
            width: 120px;
            height: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
            background: #f1f5f4;
        }

        .logo-icon img {
            width: 100%;
            height: 100%;
            object-fit: contain;
        }

        .logo-sub {
            font-size: 13px;
            color: #64748b;
            font-weight: 400;
            margin-left: 18px;
            letter-spacing: .2px;
        }

        .tag {
            margin-top: 42px;
            font-size: 10.5px;
            font-weight: 700;
            color: #10b981;
            letter-spacing: 2.5px;
            position: relative;
            z-index: 1;
        }

        h1 {
            margin-top: 12px;
            font-size: 36px;
            font-weight: 800;
            color: #0f172a;
            line-height: 1.15;
            letter-spacing: -.4px;
            position: relative;
            z-index: 1;
        }

        h1 span {
            color: #10b981;
        }

        .desc {
            margin-top: 14px;
            font-size: 13px;
            color: #64748b;
            line-height: 1.7;
            max-width: 480px;
            position: relative;
            z-index: 1;
        }

        /* ===== FEATURE CARDS — renamed to avoid Bootstrap .card conflict ===== */
        .cards {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 12px;
            position: relative;
            z-index: 1;
            margin-top: 28px;
        }

        .feature-card {
            background: #ffffff;
            /* padding:16px 14px; */
            border-radius: 14px;
            box-shadow: 0 2px 16px rgba(15, 23, 42, .045);
            transition: transform .25s, box-shadow .25s;
            cursor: default;
            border: 1px solid rgba(0, 0, 0, .03);
        }

        .feature-card:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 24px rgba(15, 23, 42, .08);
        }

        .feature-card h3 {
            margin-top: 10px;
            font-size: 12.5px;
            font-weight: 600;
            color: #0f172a;
        }

        .feature-card p {
            margin-top: 3px;
            font-size: 11px;
            color: #94a3b8;
            line-height: 1.4;
        }

        /* Icon boxes */
        .card-icon-box {
            width: 38px;
            height: 38px;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
        }

        .card-icon-box svg {
            width: 20px;
            height: 20px;
            stroke: currentColor;
            fill: none;
            stroke-width: 1.8;
            stroke-linecap: round;
            stroke-linejoin: round;
        }

        .card-icon-box.green {
            background: rgba(16, 185, 129, .1);
            color: #10b981;
        }

        .card-icon-box.blue {
            background: rgba(59, 130, 246, .1);
            color: #3b82f6;
        }

        .card-icon-box.amber {
            background: rgba(245, 158, 11, .1);
            color: #f59e0b;
        }

        .card-icon-box.purple {
            background: rgba(139, 92, 246, .1);
            color: #8b5cf6;
        }

        /* Brands */
        .brands {
            margin-top: 4px;
            padding-top: 2px;
            position: relative;
            z-index: 1;
        }

        .brand-logo {
            height: 22px;
            width: auto;
            opacity: .45;
            filter: grayscale(1);
            transition: opacity .2s, filter .2s;
            object-fit: contain;
        }

        .brands-label {
            font-size: 9.5px;
            font-weight: 600;
            color: #94a3b8;
            letter-spacing: 1.8px;
            text-transform: uppercase;
            text-align: center;

        }

        .brand-row {
            display: flex;
            justify-content: flex-start;
            align-items: center;
            gap: 70px;
            margin-top: 28px;
            flex-wrap: wrap;
        }

        .brand-row span {
            font-size: 12.5px;
            font-weight: 700;
            color: #475569;
            letter-spacing: .5px;
            opacity: .65;
        }

        /* NEW */
        .bottom-tagline {
            margin-top: 76px;
            font-size: 14px;
            color: #94a3b8;
            font-weight: 500;
            letter-spacing: .3px;
        }

        .tagline-tick {
            width: 14px;
            height: 14px;
            stroke: #10b981;
            fill: none;
            stroke-width: 2;
            stroke-linecap: round;
            stroke-linejoin: round;
            vertical-align: middle;
            margin-right: 3px;
            margin-top: -1px;
        }

        /* ===== RIGHT PANEL ===== */
        .right {
            width: 42%;
            display: flex;
            align-items: center;
            position: relative;
            background: #eef4f3;
            border-radius: 22px;
        }

        .top-badge {
            position: absolute;
            top: 25px;
            right: -17px;
            background: #fff;
            padding: 7px 14px;
            border-radius: 50px;
            box-shadow: 0 3px 16px rgba(0, 0, 0, .06);
            font-size: 11.5px;
            font-weight: 500;
            color: #334155;
            display: flex;
            align-items: center;
            gap: 7px;
        }

        .pulse-dot {
            width: 8px;
            height: 8px;
            background: #10b981;
            border-radius: 50%;
            position: relative;
        }

        .pulse-dot::after {
            content: "";
            position: absolute;
            inset: -3px;
            border-radius: 50%;
            background: rgba(16, 185, 129, .3);
            animation: pulse 2s ease infinite;
        }

        @keyframes pulse {

            0%,
            100% {
                transform: scale(1);
                opacity: .6;
            }

            50% {
                transform: scale(1.8);
                opacity: 0;
            }
        }

        .login-box {
            width: 95%;
            max-width: 400px;
            background: rgba(255, 255, 255, .94);
            backdrop-filter: blur(24px);
            -webkit-backdrop-filter: blur(24px);
            padding: 5px 30px 10px;
            border-radius: 22px;
            box-shadow: 0 16px 50px rgba(2, 6, 23, .09), 0 1px 2px rgba(0, 0, 0, .03);
            border: 1px solid rgba(255, 255, 255, .85);
            margin-top: 35px;
        }

        .login-box h2 {
            font-size: 21px;
            font-weight: 700;
            color: #0f172a;
        }

        .sub-text {
            margin-top: 5px;
            font-size: 12.5px;
            color: #94a3b8;
        }

        /* Input with icon */
        .form-group {
            margin-top: 20px;
        }

        .form-group label {
            display: block;
            font-size: 11.5px;
            font-weight: 500;
            color: #334155;
            margin-bottom: 5px;
        }

        .input-wrap {
            position: relative;
            display: flex;
            align-items: center;
        }

        .input-wrap .input-icon {
            position: absolute;
            left: 13px;
            width: 16px;
            height: 16px;
            color: #94a3b8;
            pointer-events: none;
            display: flex;
            align-items: center;
            justify-content: center;
            z-index: 2;
        }

        .input-wrap .input-icon svg {
            width: 16px;
            height: 16px;
            stroke: currentColor;
            fill: none;
            stroke-width: 1.8;
            stroke-linecap: round;
            stroke-linejoin: round;
        }

        .input-wrap input.form-control {
            width: 100%;
            padding: 11px 42px 11px 40px;
            border: 1.5px solid #e2e8f0;
            border-radius: 11px;
            outline: none;
            background: #f8fafc;
            font-size: 13px;
            color: #0f172a;
            transition: border-color .2s, background .2s, box-shadow .2s;
            font-family: 'Inter', Arial, sans-serif;
            height: auto;
            position: relative;
            z-index: 1;
        }

        .input-wrap input.form-control:focus {
            border-color: #10b981;
            background: #fff;
            box-shadow: 0 0 0 3px rgba(16, 185, 129, .1);
        }

        .input-wrap input.form-control::placeholder {
            color: #b0bec5;
        }

        /* Password eye toggle */
        .eye-toggle {
            position: absolute;
            right: 6px;
            top: 50%;
            transform: translateY(-50%);
            background: none;
            border: none;
            cursor: pointer;
            padding: 6px 8px;
            color: #94a3b8;
            display: flex;
            align-items: center;
            justify-content: center;
            z-index: 10;
            border-radius: 6px;
            transition: background .15s, color .15s;
        }

        .eye-toggle:hover {
            color: #64748b;
            background: rgba(0, 0, 0, .05);
        }

        .eye-toggle i {
            font-size: 18px;
            line-height: 1;
        }

        .options-row {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 14px;
        }

        .remember {
            display: flex;
            align-items: center;
            gap: 5px;
            font-size: 11.5px;
            color: #64748b;
            cursor: pointer;
            user-select: none;
        }

        .remember input[type="checkbox"] {
            width: 15px;
            height: 15px;
            accent-color: #10b981;
            cursor: pointer;
            margin: 0;
        }

        .forgot-link {
            font-size: 11.5px;
            color: #10b981;
            text-decoration: none;
            font-weight: 500;
            transition: color .2s;
            cursor: pointer;
        }

        .forgot-link:hover {
            color: #059669;
        }

        .login-btn {
            width: 100%;
            margin-top: 20px;
            padding: 11.5px;
            border: none;
            border-radius: 12px;
            background: linear-gradient(135deg, #10b981 0%, #0d9488 100%);
            color: #fff;
            font-size: 13.5px;
            font-weight: 600;
            cursor: pointer;
            box-shadow: 0 6px 20px rgba(16, 185, 129, .28);
            transition: transform .2s, box-shadow .2s;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 7px;
            font-family: 'Inter', Arial, sans-serif;
        }

        .login-btn:hover:not(:disabled) {
            transform: translateY(-1px);
            box-shadow: 0 10px 28px rgba(16, 185, 129, .32);
        }

        .login-btn:active:not(:disabled) {
            transform: translateY(0);
        }

        .login-btn:disabled {
            opacity: .75;
            cursor: not-allowed;
        }

        .login-btn svg {
            width: 14px;
            height: 14px;
            stroke: currentColor;
            fill: none;
            stroke-width: 2.2;
            stroke-linecap: round;
            stroke-linejoin: round;
            flex-shrink: 0;
        }

        .login-btn .spinner-border {
            width: 16px;
            height: 16px;
            border-width: 2px;
            border-color: rgba(255, 255, 255, .3);
            border-right-color: #fff;
        }

        .sys-status {
            margin-top: 16px;
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 7px;
            font-size: 11px;
            color: #10b981;
            font-weight: 500;
        }

        .status-line {
            display: flex;
            align-items: center;
            gap: 6px;
        }

        .sys-dot {
            width: 6px;
            height: 6px;
            background: #10b981;
            border-radius: 50%;
            flex-shrink: 0;
        }

        .divider {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-top: 20px;
        }

        .divider::before,
        .divider::after {
            content: "";
            flex: 1;
            height: 1px;
            background: #e8edf2;
        }

        .divider span {
            font-size: 10px;
            color: #94a3b8;
            font-weight: 500;
            white-space: nowrap;
        }

        .help-row {
            display: flex;
            gap: 6px;
            margin-top: 14px;
            margin-left: -9px
        }

        .help-box {
            flex: 1;
            background: #f6f9f8;
            border: 1px solid #edf2f0;
            padding: 11px 4px;
            border-radius: 11px;
        }

        .help-box h4 {
            font-size: 11px;
            font-weight: 600;
            color: #0f172a;
            margin-bottom: 2px;
        }

        .help-box p {
            font-size: 10px;
            color: #94a3b8;
            line-height: 1.4;
        }

        #location-warning {
            font-size: 11px;
            border-radius: 10px;
            padding: 8px 12px;
            margin-top: 10px;
        }

        .form-check-input:checked {
            background-color: #10b981;
            border-color: #10b981;
        }

        @media(max-width:700px) {

            body {
                overflow: hidden;
                /* no page scroll */
            }

            .container-main {
                flex-direction: column;
                padding: 0;
                height: 100vh;
            }

            .left {
                display: none;
                /* 🔥 IMPORTANT */
            }

            .right {
                width: 100%;
                height: 100vh;
                padding: 0;
                display: flex;
                justify-content: center;
                align-items: center;
            }

            .login-box {
                width: 92%;
                margin-top: 0;
            }
        }

        /* @media(max-width:500px){
  .container-main{flex-direction:column;overflow-y:auto;}
  .left,.right{width:100%;min-height:auto;}
  .left{padding:28px 24px;}
  h1{font-size:26px;}
  .cards{grid-template-columns:1fr 1fr;gap:8px;}
  .right{padding:16px 0;}
  .login-box{width:92%;padding:24px 22px 22px;}
} */
        .bottom-tagline-row {
            margin-top: 50px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-size: 14px;
            color: #94a3b8;
            font-weight: 500;
        }

        .bottom-tagline-left {
            display: flex;
            align-items: center;
            gap: 6px;
        }

        .bottom-tagline-right a {
            font-size: 12px;
            color: #10b981;
            font-weight: 600;
            text-decoration: none;
            transition: 0.2s;
        }

        .bottom-tagline-right a:hover {
            color: #059669;
            text-decoration: underline;
        }

        .tagline-tick {
            width: 14px;
            height: 14px;
            stroke: #10b981;
            fill: none;
            stroke-width: 2;
        }
    </style>
</head>

<body>

    <div class="container-main">

        <!-- LEFT PANEL -->
        <div class="left">

            <div class="logo">
                <div class="logo-icon">
                    <img src="{{ asset($logo) }}" alt="Logo" onerror="...">
                </div>
                <span class="logo-sub">Real-estate CRM</span>
            </div>

            <p class="tag">WELCOME BACK</p>

            <h1>Smarter Real Estate.<br /><span>Stronger Relationships.</span></h1>

            <p class="desc">Realestate Industry Focused CRM to manage leads, projects, inventory, site visits, payments
                and sales teams — all in one powerful platform.</p>

            <div class="cards">
                <div class="feature-card">
                    <div class="card-icon-box blue">
                        <svg viewBox="0 0 24 24">
                            <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2" />
                            <circle cx="9" cy="7" r="4" />
                            <path d="M23 21v-2a4 4 0 0 0-3-3.87" />
                            <path d="M16 3.13a4 4 0 0 1 0 7.75" />
                        </svg>
                    </div>
                    <h3>Enterprise <br>Security</h3>
                </div>
                <div class="feature-card">
                    <div class="card-icon-box green">
                        <svg viewBox="0 0 20 20" fill="none" stroke="currentColor" stroke-width="1.5"
                            stroke-linecap="round" stroke-linejoin="round">
                            <!-- Left Building -->
                            <rect x="3" y="10.5" width="4" height="8" rx="0.5" />
                            <line x1="4.5" y1="13" x2="5.5" y2="13" />
                            <line x1="4.5" y1="15" x2="5.5" y2="15" />
                            <line x1="5" y1="17" x2="5" y2="18.5" />

                            <!-- Center Building -->
                            <rect x="8" y="5.5" width="5" height="13" rx="0.5" />
                            <line x1="9.5" y1="8" x2="11.5" y2="8" />
                            <line x1="9.5" y1="10.5" x2="11.5" y2="10.5" />
                            <line x1="9.5" y1="13" x2="11.5" y2="13" />
                            <line x1="9.5" y1="15.5" x2="11.5" y2="15.5" />
                            <line x1="10.5" y1="17" x2="10.5" y2="18.5" />

                            <!-- Right Building -->
                            <rect x="14" y="8.5" width="5" height="10" rx="0.5" />
                            <line x1="15.5" y1="11" x2="17.5" y2="11" />
                            <line x1="15.5" y1="13.5" x2="17.5" y2="13.5" />
                            <line x1="15.5" y1="16" x2="17.5" y2="16" />
                            <line x1="16.5" y1="17" x2="16.5" y2="18.5" />

                            <!-- Ground Line -->
                            <line x1="2" y1="18.5" x2="20" y2="18.5" />
                        </svg>
                    </div>
                    <h3>Real time <br> analytics</h3>
                </div>

                <div class="feature-card">
                    <div class="card-icon-box amber">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"
                            stroke-linecap="round" stroke-linejoin="round">
                            <!-- Funnel Outline -->
                            <path d="M2 4H22L17.5 11.5V17.5L15 20H9L6.5 17.5V11.5L2 4Z" />
                            <!-- Stage 1 Line -->
                            <line x1="9" y1="11.5" x2="15" y2="11.5" />
                            <!-- Stage 2 Line -->
                            <line x1="9.5" y1="15" x2="14.5" y2="15" />
                            <!-- Converted Lead Drop -->
                            <circle cx="12" cy="22.5" r="0.8" fill="currentColor" stroke="none" />
                        </svg>
                    </div>
                    <h3>Lead Lifecycle<br> Tracking</h3>
                </div>
                <div class="feature-card">
                    <div class="card-icon-box purple">
                        <svg class="tagline-tick" viewBox="0 0 24 24">
                            <path d="M12 2l8 4v6c0 5.5-3.8 10.7-8 12-4.2-1.3-8-6.5-8-12V6l8-4z" />
                            <polyline points="9 12 11 14 15 10" />
                        </svg>
                    </div>
                    <h3>Actionable business insights</h3>
                </div>
            </div>

            <div class="brands">
                <div class="brands-label">TRUSTED BY LEADING DEVELOPERS & BROKERS</div>
                <div class="brand-row">
                    <img src="https://cdn.brandfetch.io/dlf.in/w/120/h/40/fallback:false/logo" alt="DLF"
                        class="brand-logo"
                        onerror="this.src='https://upload.wikimedia.org/wikipedia/commons/thumb/6/6a/DLF_Logo.svg/200px-DLF_Logo.svg.png'">
                    <img src="https://cdn.brandfetch.io/omaxe.com/w/120/h/40/fallback:false/logo" alt="OMAXE"
                        class="brand-logo" onerror="this.style.display='none';this.outerHTML='<span>OMAXE</span>'">
                    <img src="https://cdn.brandfetch.io/godrej.com/w/120/h/40/fallback:false/logo" alt="GODREJ"
                        class="brand-logo"
                        onerror="this.src='https://upload.wikimedia.org/wikipedia/commons/thumb/f/f9/Godrej_Group_logo.svg/200px-Godrej_Group_logo.svg.png'">
                    <img src="https://cdn.brandfetch.io/sobha.com/w/120/h/40/fallback:false/logo" alt="SOBHA"
                        class="brand-logo" onerror="this.style.display='none';this.outerHTML='<span>SOBHA</span>'">
                    <img src="https://cdn.brandfetch.io/mahindra.com/w/120/h/40/fallback:false/logo" alt="MAHINDRA"
                        class="brand-logo"
                        onerror="this.src='https://upload.wikimedia.org/wikipedia/commons/thumb/2/2a/Mahindra_Group_logo.svg/200px-Mahindra_Group_logo.svg.png'">
                </div>

                <div class="bottom-tagline-row">

                    <div class="bottom-tagline-left">
                        <svg class="tagline-tick" viewBox="0 0 24 24">
                            <path d="M12 2l8 4v6c0 5.5-3.8 10.7-8 12-4.2-1.3-8-6.5-8-12V6l8-4z" />
                            <polyline points="9 12 11 14 15 10" />
                        </svg>
                        Secure. Reliable. Built for Growth.
                    </div>

                    <div class="bottom-tagline-right">
                        <a href="https://clikzop.com/" target="_blank">
                            Built by ClikzopInnovaions
                        </a>
                    </div>

                </div>
            </div>

        </div>

        <!-- RIGHT PANEL -->
        <div class="right">

            <div class="top-badge">
                <span class="pulse-dot"></span>
                System Online
            </div>

            <div class="login-box">

                <h2>Welcome Back</h2>
                <p class="sub-text">Sign in to access your Real Estate CRM</p>

                <form class="form-horizontal" action="{{route('login')}}" method="POST" id="loginForm">

                    @csrf

                    <div class="form-group">
                        <label for="email">Email Address</label>
                        <div class="input-wrap">
                            <span class="input-icon">
                                <svg viewBox="0 0 24 24">
                                    <rect x="2" y="4" width="20" height="16" rx="2" />
                                    <path d="M22 7l-10 7L2 7" />
                                </svg>
                            </span>
                            <input type="email" class="form-control" id="email" name="email"
                                placeholder="Enter email address" value="{{old('email')}}" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="password">Password</label>
                        <div class="input-wrap">
                            <span class="input-icon">
                                <svg viewBox="0 0 24 24">
                                    <rect x="3" y="11" width="18" height="11" rx="2" ry="2" />
                                    <path d="M7 11V7a5 5 0 0 1 10 0v4" />
                                </svg>
                            </span>
                            <input type="password" class="form-control" id="password" name="password"
                                placeholder="Enter password" required>
                            <button type="button" class="eye-toggle" id="toggle-password">
                                <i class="mdi mdi-eye-outline"></i>
                            </button>
                        </div>
                    </div>

                    <div class="options-row">
                        <label class="remember">
                            <input class="form-check-input" type="checkbox" id="remember-check">
                            Remember me
                        </label>
                        <a class="forgot-link" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                            <i class="mdi mdi-lock" style="font-size:12px;margin-right:2px;"></i> Forgot your password?
                        </a>
                    </div>

                    <div class="mt-3" style="margin-top:20px;">
                        <button type="submit" class="login-btn" id="SubmitBtn">
                            <svg viewBox="0 0 24 24" id="lockIcon">
                                <rect x="3" y="11" width="18" height="11" rx="2" ry="2" />
                                <path d="M7 11V7a5 5 0 0 1 10 0v4" />
                            </svg>
                            <span id="SubmitText">Login Securely</span>
                            <span id="SubmitSpinner" class="d-none">
                                <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                                Please wait...
                            </span>
                        </button>
                    </div>

                </form>

                <div class="sys-status">
                    <div class="status-line">
                        <span class="pulse-dot"></span>
                        System Online
                    </div>

                    <div class="status-line">
                        All Systems Operational
                    </div>
                </div>

                <div style="font-size: small" class="divider"><span>Need Help?</span></div>

                <div class="help-row">
                    <div class="help-box">
                        <h4 style="display:flex;align-items:center;gap:5px;">
                            <i class="mdi mdi-lifebuoy" style="font-size:14px;color:#10b981;"></i>
                            Clickzop Support
                        </h4>
                        <p style="font-size: small">Get help and support</p>
                        <p style="color:#10b981;">http://clikzop.support/client-login</p>
                    </div>
                    <div class="help-box" data-bs-toggle="modal" data-bs-target="#faqModal" style="cursor:pointer;">
                        FAQ
                    </div>
                    <div class="help-box">
                        <h4 style="display:flex;align-items:center;gap:5px;">
                            <i class="mdi mdi-email-outline" style="font-size:14px;color:#10b981;"></i>
                            Email Support
                        </h4>
                        <p style="font-size: small">We are here to help</p>
                        <p style="color:#10b981;">support@clikzopinnovations.com</p>
                    </div>
                </div>

            </div>

        </div>

    </div>

    @include('modals.forgot-password')

    <script src="{{asset('js/jquery.min.js')}}"></script>
    <script src="{{asset('js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('js/metisMenu.min.js')}}"></script>
    <script src="{{asset('js/simplebar.min.js')}}"></script>
    <script src="{{asset('js/waves.min.js')}}"></script>
    <script src="{{asset('js/app.js')}}"></script>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            $('#toggle-password').on('click', function () {
                var pwdField = $('#password');
                var icon = $(this).find('i');
                if (pwdField.attr('type') === 'password') {
                    pwdField.attr('type', 'text');
                    icon.removeClass('mdi-eye-outline').addClass('mdi-eye-off-outline');
                } else {
                    pwdField.attr('type', 'password');
                    icon.removeClass('mdi-eye-off-outline').addClass('mdi-eye-outline');
                }
            });

            var form = document.getElementById('loginForm');
            var submitBtn = document.getElementById('SubmitBtn');
            var warning = document.createElement('div');
            warning.id = 'location-warning';
            warning.className = 'text-danger mt-2 alert alert-warning';
            warning.style.display = 'none';
            submitBtn.closest('.mt-3').appendChild(warning);

            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(
                    function (position) {
                        var latInput = document.createElement('input');
                        var lngInput = document.createElement('input');
                        latInput.type = 'hidden';
                        lngInput.type = 'hidden';
                        latInput.name = 'latitude';
                        lngInput.name = 'longitude';
                        latInput.value = position.coords.latitude;
                        lngInput.value = position.coords.longitude;
                        form.appendChild(latInput);
                        form.appendChild(lngInput);
                    },
                    function (error) {
                        warning.textContent = 'Location permission denied. You can still log in.';
                        warning.style.display = 'block';
                    }
                );
            }
            else {
                warning.textContent = 'Geolocation is not supported by your browser.';
                warning.style.display = 'block';
            }

            $('#SubmitBtn').closest('form').on('submit', function () {
                $('#SubmitBtn').prop('disabled', true);
                $('#SubmitText').addClass('d-none');
                $('#SubmitSpinner').removeClass('d-none');
                $('#lockIcon').addClass('d-none');
            });
        });

        var form = document.getElementById('resetPasswordForm');
        var btn = document.getElementById('resetBtn');
        var btnText = document.getElementById('btnText');
        var btnLoader = document.getElementById('btnLoader');

        if (form) {
            form.addEventListener('submit', function () {
                btn.disabled = true;
                btnLoader.classList.remove('d-none');
                btnText.textContent = 'Sending...';
            });
        }
    </script>
    <div class="modal fade" id="faqModal">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title">Frequently Asked Questions</h5>
                    <button class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <div class="modal-body">

                    <div class="accordion" id="faqAccordion">

                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" data-bs-toggle="collapse"
                                    data-bs-target="#q1">
                                    How do I reset my password?
                                </button>
                            </h2>
                            <div id="q1" class="accordion-collapse collapse">
                                <div class="accordion-body">
                                    Click "Forgot Password" and follow the instructions sent to your email.
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" data-bs-toggle="collapse"
                                    data-bs-target="#q2">
                                    Why can't I login?
                                </button>
                            </h2>
                            <div id="q2" class="accordion-collapse collapse">
                                <div class="accordion-body">
                                    Verify your email and password or contact support.
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" data-bs-toggle="collapse"
                                    data-bs-target="#q3">
                                    How do I contact support?
                                </button>
                            </h2>
                            <div id="q3" class="accordion-collapse collapse">
                                <div class="accordion-body">
                                    Use the support portal or email support@clikzopinnovations.com.
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" data-bs-toggle="collapse"
                                    data-bs-target="#q4">
                                    Why is my account locked?
                                </button>
                            </h2>
                            <div id="q4" class="accordion-collapse collapse">
                                <div class="accordion-body">
                                    Multiple failed login attempts may temporarily lock the account.
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" data-bs-toggle="collapse"
                                    data-bs-target="#q5">
                                    Is my data secure?
                                </button>
                            </h2>
                            <div id="q5" class="accordion-collapse collapse">
                                <div class="accordion-body">
                                    Yes, all data is protected using secure authentication and encryption.
                                </div>
                            </div>
                        </div>

                    </div>

                </div>

            </div>
        </div>
    </div>
</body>

</html>