@extends('errors.layout')

@section('title', 'Too Many Requests')
@section('code', '429')
@section('icon', 'bi-speedometer')
@section('iconColor', 'warning')
@section('heading', 'Too many requests.')
@section('message', 'The system received too many requests in a short time. Please wait a moment and try again.')
@section('errorId', 'E429-LIMIT')

@section('tips')
    <div class="action-chip"><i class="bi bi-hourglass-split text-warning"></i> Wait briefly</div>
    <div class="action-chip"><i class="bi bi-arrow-repeat text-primary"></i> Retry later</div>
@endsection
