@extends('maintenance.layout')

@section('title', 'Emergency Maintenance')
@section('code', '503')
@section('icon', 'bi-exclamation-octagon')
@section('iconColor', 'danger')
@section('heading', 'Emergency maintenance is in progress.')
@section('message', 'We are fixing an urgent system issue. CRM access will return as soon as the service is stable.')
@section('maintenanceId', 'M-EMERGENCY')

@section('items')
    <div class="feature-item"><i class="bi bi-tools text-danger"></i> Urgent fix</div>
    <div class="feature-item"><i class="bi bi-database-lock text-primary"></i> Data protected</div>
    <div class="feature-item"><i class="bi bi-arrow-clockwise text-success"></i> Back soon</div>
@endsection
