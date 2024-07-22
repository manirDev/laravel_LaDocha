@php
    $setting = \App\Http\Controllers\frontend\HomeController::getSetting();
@endphp
@extends('frontend.main_master')
@section('description', $setting->description)
@section('keywords', $setting->keywords)
@section('title', $setting->title)

@section('main-section')
    {!! $data->aboutus !!}
@endsection
