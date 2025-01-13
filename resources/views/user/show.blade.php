@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Profile: {{ $user->name }}</h1>
    <p><strong>Email:</strong> {{ $user->email }}</p>
    <p><strong>Slug:</strong> {{ $user->slug }}</p>

    @foreach ($links as $link)
        <p><strong>Link:</strong> {{ $link->url }}</p>        
    @endforeach
</div>
@endsection
