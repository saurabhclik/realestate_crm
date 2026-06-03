@extends('errors.layout')

@section('title', 'Service Unavailable')
@section('code', '503')
@section('icon', 'bi-cloud-slash')
@section('iconColor', 'primary')
@section('heading', 'CRM service is temporarily unavailable.')
@section('message', 'The system may be updating or temporarily offline. Please wait a little while and refresh the page.')
@section('errorId', 'E503-SERVICE')

@section('tips')
    <div class="action-chip"><i class="bi bi-stars text-warning"></i> Update in progress</div>
    <div class="action-chip"><i class="bi bi-arrow-clockwise text-primary"></i> Refresh later</div>
@endsection
