@extends('errors.layout')

@section('title', 'Server Error')
@section('code', '500')
@section('icon', 'bi-tools')
@section('iconColor', 'danger')
@section('heading', 'Something went wrong on our side.')
@section('message', 'The CRM could not complete this request right now. Please try again, or contact support if the issue continues.')
@section('errorId', 'E500-SERVER')

@section('tips')
    <div class="action-chip"><i class="bi bi-bug text-danger"></i> System error</div>
    <div class="action-chip"><i class="bi bi-headset text-primary"></i> Report issue</div>
@endsection
