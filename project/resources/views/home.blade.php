@extends('layouts/default')

@section('content')

    <h1>Laravel Breadcrumbs Test</h1>

    <p><em>Laravel {{ app()->version() }} &mdash; PHP {{ phpversion() }}</em></p>

    @include('_samples')

@stop
