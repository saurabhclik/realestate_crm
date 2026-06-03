@extends('maintenance.layout')

@section('title', 'Subscription Expired')
@section('code', '402')
@section('icon', 'bi-credit-card')
@section('iconColor', 'danger')
@section('heading', 'CRM subscription has expired.')
@section('message', 'Your CRM access is paused because the active subscription period has ended. Please renew the subscription to continue using the system.')
@section('maintenanceId', 'M-SUBSCRIPTION')

@section('items')
    <div class="feature-item">
        <i class="bi bi-calendar-x text-danger"></i> Plan expired</div>
    <div class="feature-item">
        <i class="bi bi-credit-card text-primary"></i> Renewal required</div>
    <div class="feature-item">
        <i class="bi bi-headset text-success"></i> Contact support</div>
@endsection
