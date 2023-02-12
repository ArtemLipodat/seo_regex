@extends('layouts.app')
@section('title', 'Index')

{{--{{ dd(\Illuminate\Support\Facades\Auth::user()) }}--}}

@section('content')
    <posts user="{{ \Illuminate\Support\Facades\Auth::user() }}"></posts>
@endsection
