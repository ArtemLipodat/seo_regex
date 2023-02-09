@extends('layouts.app')
@section('title', 'Index')

{{--{{ dd(\Illuminate\Support\Facades\Auth::user()->hasRole('admin')) }}--}}

@section('content')
    <posts></posts>
@endsection
