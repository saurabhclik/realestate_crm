<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Maintenance | System Update</title>

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
}

.countdown-box{
    display:flex;
    gap:18px;
    justify-content:center;
    margin-bottom:30px;
}

.count-item{
    text-align:center;
}

.count-number{
    font-size:32px;
    font-weight:600;
    background:white;
    border:1px solid #e5e7eb;
    border-radius:8px;
    padding:10px 14px;
    min-width:60px;
    display:inline-block;
}

.count-label{
    font-size:12px;
    color:#6b7280;
    margin-top:6px;
    letter-spacing:1px;
}

.title{
    font-size:28px;
    font-weight:600;
    margin-bottom:10px;
}

.subtitle{
    color:#6b7280;
    font-size:14px;
    margin-bottom:20px;
}

.notify-box{
    max-width:420px;
    margin:auto;
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

#clock{
    font-weight:600;
    margin-bottom:15px;
}
</style>
</head>

<body>

<div class="maintenance-wrapper">
<div>

<div id="clock">--:--:--</div>

<!-- Countdown -->
<div class="countdown-box">
    <div class="count-item">
        <div class="count-number" id="cdDays">00</div>
        <div class="count-label">DAYS</div>
    </div>

    <div class="count-item">
        <div class="count-number" id="cdHours">02</div>
        <div class="count-label">HOURS</div>
    </div>

    <div class="count-item">
        <div class="count-number" id="cdMinutes">15</div>
        <div class="count-label">MINUTES</div>
    </div>

    <div class="count-item">
        <div class="count-number" id="cdSeconds">00</div>
        <div class="count-label">SECONDS</div>
    </div>
</div>

<h2 class="title">CRM is undergoing maintenance right now.</h2>

<p class="subtitle">
System upgrade in progress. Estimated completion:
<strong class="text-primary" id="etaHighlight">2h 15m</strong>
</p>

<!-- Features -->
<div class="feature-list">
    <div class="feature-item"><i class="bi bi-stars text-warning"></i> New features</div>
    <div class="feature-item"><i class="bi bi-bug text-danger"></i> Bug fixes</div>
    <div class="feature-item"><i class="bi bi-speedometer2 text-primary"></i> Performance</div>
    <div class="feature-item"><i class="bi bi-shield-lock text-success"></i> Security</div>
</div>

<div class="mt-4 text-muted small">
ID: M24-0415 • © 2026 — Back shortly
</div>

</div>
</div>

<script>
(function(){

let targetTime = new Date();
targetTime.setTime(targetTime.getTime() + (2*60*60*1000 + 15*60*1000));

const d = document.getElementById('cdDays');
const h = document.getElementById('cdHours');
const m = document.getElementById('cdMinutes');
const s = document.getElementById('cdSeconds');

function updateCountdown(){
    const now = Date.now();
    const diff = targetTime - now;

    if(diff <= 0) return;

    const days = Math.floor(diff / (1000*60*60*24));
    const hours = Math.floor((diff % (1000*60*60*24)) / (1000*60*60));
    const minutes = Math.floor((diff % (1000*60*60)) / (1000*60));
    const seconds = Math.floor((diff % (1000*60)) / 1000);

    d.innerText = String(days).padStart(2,'0');
    h.innerText = String(hours).padStart(2,'0');
    m.innerText = String(minutes).padStart(2,'0');
    s.innerText = String(seconds).padStart(2,'0');

    document.getElementById('etaHighlight').innerText =
        hours > 0 ? `${hours}h ${minutes}m` : `${minutes}m ${seconds}s`;
}

function updateClock(){
    document.getElementById('clock').innerText =
        new Date().toLocaleTimeString('en-GB',{hour12:false});
}

setInterval(updateClock,1000);
setInterval(updateCountdown,1000);

})();
</script>

</body>
</html>