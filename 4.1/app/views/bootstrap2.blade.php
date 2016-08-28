@extends('layouts/bootstrap2')

@section('content')

    <h1>Twitter Bootstrap 2</h1>

    <?php Breadcrumbs::setView('laravel-breadcrumbs::bootstrap2') ?>
    @include('_samples')

@stop
