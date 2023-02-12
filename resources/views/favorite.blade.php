@extends('layouts.app')
@section('title', 'Favorite')

@section('content')
    <favorite user="{{ \Illuminate\Support\Facades\Auth::user() }}"></favorite>
@endsection
