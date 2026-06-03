@extends('errors.layout')

@section('title', 'Login Required')
@section('code', '401')
@section('icon', 'bi-person-lock')
@section('iconColor', 'primary')
@section('heading', 'Please log in to continue.')
@section('message', 'Your account needs to be verified before opening this page. Log in again and continue your work.')
@section('errorId', 'E401-AUTH')

@section('tips')
    <div class="action-chip"><i class="bi bi-person-check text-success"></i> Login required</div>
    <div class="action-chip"><i class="bi bi-shield-check text-primary"></i> Account check</div>
@endsection
