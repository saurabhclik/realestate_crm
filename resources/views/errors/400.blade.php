@extends('errors.layout')

@section('title', 'Bad Request')
@section('code', '400')
@section('icon', 'bi-exclamation-triangle')
@section('iconColor', 'warning')
@section('heading', 'This request could not be understood.')
@section('message', 'The link or form request looks incomplete or invalid. Please go back, refresh the page, and try again.')
@section('errorId', 'E400-REQUEST')

@section('tips')
    <div class="action-chip"><i class="bi bi-link-45deg text-warning"></i> Invalid request</div>
    <div class="action-chip"><i class="bi bi-arrow-repeat text-primary"></i> Refresh page</div>
@endsection
