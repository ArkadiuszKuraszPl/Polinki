@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Profile: {{ $user->name }}</h1>
    <p><strong>Email:</strong> {{ $user->email }}</p>
    <p><strong>Slug:</strong> {{ $user->slug }}</p>
    <a href="{{ url('links') }}" class="btn btn-secondary">Back to Community</a>
</div>
@endsection
