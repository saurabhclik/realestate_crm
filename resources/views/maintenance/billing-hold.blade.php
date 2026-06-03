@extends('maintenance.layout')

@section('title', 'Billing Hold')
@section('code', '402')
@section('icon', 'bi-receipt')
@section('iconColor', 'warning')
@section('heading', 'CRM is temporarily on billing hold.')
@section('message', 'Access is paused because billing confirmation is pending. Please complete the payment process or contact support.')
@section('maintenanceId', 'M-BILLING')

@section('items')
    <div class="feature-item"><i class="bi bi-hourglass-split text-warning"></i> Payment pending</div>
    <div class="feature-item"><i class="bi bi-shield-check text-success"></i> Data safe</div>
    <div class="feature-item"><i class="bi bi-headset text-primary"></i> Support available</div>
@endsection
