@extends('layout')

@section('content')
    <h1>Watched Time</h1>
    <p>You have watched a total of {{ $hours }} hours and {{ $minutes }} minutes.</p>
    <a href="{{ route('dashboard') }}">Back to Dashboard</a>
@endsection
