<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>@yield('title', 'Error') | Real Estate CRM</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

<style>
body{
    min-height:100vh;
    background:#f7f8fb;
    font-family:system-ui;
    color:#1f2937;
}

.error-wrapper{
    min-height:100vh;
    display:flex;
    align-items:center;
    justify-content:center;
    text-align:center;
    padding:24px;
}

.error-code{
    display:inline-flex;
    align-items:center;
    justify-content:center;
    min-width:110px;
    height:78px;
    padding:0 20px;
    background:white;
    border:1px solid #e5e7eb;
    border-radius:8px;
    font-size:34px;
    font-weight:700;
    color:#2563eb;
    margin-bottom:24px;
}

.error-icon{
    font-size:36px;
    margin-bottom:14px;
}

.title{
    font-size:28px;
    font-weight:600;
    margin-bottom:10px;
}

.subtitle{
    color:#6b7280;
    font-size:14px;
    margin:0 auto 22px;
    max-width:520px;
    line-height:1.6;
}

.action-list{
    display:flex;
    gap:10px;
    justify-content:center;
    flex-wrap:wrap;
    margin-top:24px;
}

.action-chip{
    padding:6px 12px;
    border:1px solid #e5e7eb;
    border-radius:20px;
    font-size:13px;
    background:white;
    color:#374151;
}

.btn-primary{
    background:#3762b8;
    border-color:#3762b8;
}

.error-meta{
    margin-top:28px;
    color:#6b7280;
    font-size:12px;
}
.text-primary{
    color:#3762b8 !important;
}
</style>
</head>

<body>
@php
    $dashboardUrl = \Illuminate\Support\Facades\Route::has('dashboard') ? route('dashboard') : url('/');
@endphp
<div class="error-wrapper">
    <div>
        <div class="error-code">@yield('code')</div>

        <div class="error-icon text-@yield('iconColor', 'primary')">
            <i class="bi @yield('icon', 'bi-exclamation-circle')"></i>
        </div>

        <h2 class="title">@yield('heading')</h2>

        <p class="subtitle">@yield('message')</p>

        <div class="d-flex gap-2 justify-content-center flex-wrap">
            <a href="{{ url()->previous() }}" class="btn btn-outline-secondary btn-sm">
                <i class="bi bi-arrow-left"></i> Go Back
            </a>
            <a href="{{ $dashboardUrl }}" class="btn btn-primary btn-sm">
                <i class="bi bi-speedometer2"></i> Dashboard
            </a>
        </div>

        <div class="action-list">
            @yield('tips')
        </div>

        <div class="error-meta">
            ID: @yield('errorId', 'CRM-ERROR') &bull; &copy; 2026
        </div>
    </div>
</div>
</body>
</html>
