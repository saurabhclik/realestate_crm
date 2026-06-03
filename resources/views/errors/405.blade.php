@extends('errors.layout')

@section('title', 'Method Not Allowed')
@section('code', '405')
@section('icon', 'bi-sign-stop')
@section('iconColor', 'danger')
@section('heading', 'This action is not allowed here.')
@section('message', 'The page received an unsupported request method. Please return to the previous page and use the available action button.')
@section('errorId', 'E405-METHOD')

@section('tips')
    <div class="action-chip"><i class="bi bi-signpost text-danger"></i> Wrong action</div>
    <div class="action-chip"><i class="bi bi-arrow-left text-primary"></i> Go back</div>
@endsection
