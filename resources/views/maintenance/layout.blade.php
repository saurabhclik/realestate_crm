<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>@yield('title', 'Maintenance') | Real Estate CRM</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

<style>
body{
    min-height:100vh;
    background:#f7f8fb;
    font-family:system-ui;
    color:#1f2937;
}

.maintenance-wrapper{
    min-height:100vh;
    display:flex;
    align-items:center;
    justify-content:center;
    text-align:center;
    padding:24px;
}

.status-box{
    display:inline-flex;
    align-items:center;
    justify-content:center;
    min-width:92px;
    height:72px;
    padding:0 20px;
    background:white;
    border:1px solid #e5e7eb;
    border-radius:8px;
    font-size:28px;
    font-weight:700;
    color:#2563eb;
    margin-bottom:22px;
}

.status-icon{
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
    max-width:540px;
    line-height:1.6;
}

.feature-list{
    display:flex;
    gap:10px;
    justify-content:center;
    flex-wrap:wrap;
    margin-top:25px;
}

.feature-item{
    padding:6px 12px;
    border:1px solid #e5e7eb;
    border-radius:20px;
    font-size:13px;
    background:white;
}

.meta{
    margin-top:28px;
    color:#6b7280;
    font-size:12px;
}
</style>
</head>

<body>
<div class="maintenance-wrapper">
    <div>
        <div class="status-box">@yield('code', '503')</div>

        <div class="status-icon text-@yield('iconColor', 'primary')">
            <i class="bi @yield('icon', 'bi-tools')"></i>
        </div>

        <h2 class="title">@yield('heading')</h2>

        <p class="subtitle">@yield('message')</p>

        <div class="feature-list">
            @yield('items')
        </div>

        <div class="meta">
            ID: @yield('maintenanceId', 'CRM-MAINTENANCE') &bull; &copy; 2026
        </div>
    </div>
</div>
</body>
</html>
