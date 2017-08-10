@extends('layouts.app_layout')
@section('content')
    Welcome, {{ Auth::user()->name }}!
@endsection