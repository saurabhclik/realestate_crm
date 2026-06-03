@extends('errors.layout')

@section('title', 'Session Expired')
@section('code', '419')
@section('icon', 'bi-clock-history')
@section('iconColor', 'warning')
@section('heading', 'Your session has expired.')
@section('message', 'For security, this page was closed after being inactive. Please go back or log in again before submitting the form.')
@section('errorId', 'E419-SESSION')

@section('tips')
    <div class="action-chip"><i class="bi bi-shield-check text-success"></i> Security check</div>
    <div class="action-chip"><i class="bi bi-arrow-repeat text-primary"></i> Try again</div>
@endsection
