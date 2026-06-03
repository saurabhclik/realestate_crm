@extends('maintenance.layout')

@section('title', 'Planned Maintenance')
@section('code', '503')
@section('icon', 'bi-tools')
@section('iconColor', 'primary')
@section('heading', 'CRM is undergoing maintenance right now.')
@section('message', 'System upgrade in progress. We are improving performance, security, and reliability. Please check again shortly.')
@section('maintenanceId', 'M-PLANNED')

@section('items')
    <div class="feature-item"><i class="bi bi-stars text-warning"></i> New features</div>
    <div class="feature-item"><i class="bi bi-bug text-danger"></i> Bug fixes</div>
    <div class="feature-item"><i class="bi bi-speedometer2 text-primary"></i> Performance</div>
    <div class="feature-item"><i class="bi bi-shield-lock text-success"></i> Security</div>
@endsection
