@extends('errors::layout')

@section('title', __('Not Found'))
@section('code', '404')
@section('message', $exception->getMessage() ?: __('Not Found'))
@section('image', asset('images/404.png'))

