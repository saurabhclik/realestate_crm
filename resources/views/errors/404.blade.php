@extends('errors.layout')

@section('title', 'Page Not Found')
@section('code', '404')
@section('icon', 'bi-search')
@section('iconColor', 'primary')
@section('heading', 'Page not found.')
@section('message', 'The page you are looking for may have been moved, deleted, or the link may be incorrect.')
@section('errorId', 'E404-NOTFOUND')

@section('tips')
    <div class="action-chip"><i class="bi bi-link-45deg text-primary"></i> Check the URL</div>
    <div class="action-chip"><i class="bi bi-house-door text-success"></i> Return home</div>
@endsection
