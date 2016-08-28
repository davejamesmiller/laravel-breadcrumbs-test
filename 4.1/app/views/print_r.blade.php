@extends('layouts/bootstrap3')

@section('content')

    <h1>Custom View (<code>print_r($breadcrumbs)</code>)</h1>

    <?php Breadcrumbs::setView('_breadcrumbs/print_r') ?>
    @include('_samples')

@stop
