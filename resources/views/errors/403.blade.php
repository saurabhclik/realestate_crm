@extends('errors.layout')

@section('title', 'Access Denied')
@section('code', '403')
@section('icon', 'bi-shield-lock')
@section('iconColor', 'danger')
@section('heading', 'You do not have permission to open this page.')
@section('message', 'This section is restricted for your current role. If you need access, please contact your reporting manager or administrator.')
@section('errorId', 'E403-ACCESS')

@section('tips')
    <div class="action-chip"><i class="bi bi-person-lock text-danger"></i> Role restricted</div>
    <div class="action-chip"><i class="bi bi-headset text-primary"></i> Contact admin</div>
@endsection
