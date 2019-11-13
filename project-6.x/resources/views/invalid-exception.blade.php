<?php
config(['breadcrumbs.invalid-named-breadcrumb-exception' => true]);
?>
@extends('layouts/default')

@section('breadcrumbs', Breadcrumbs::render('invalid'))

@section('content')

    <h1>Invalid breadcrumb</h1>
    <p>Content goes here...</p>

@stop
