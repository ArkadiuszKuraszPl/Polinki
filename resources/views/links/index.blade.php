@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <a href="{{ url('/user/' . $user->id . '/edit-name') }}" class="btn btn-secondary">Edit Name</a>

        <a href="{{ route('links.create') }}" class="btn btn-primary">Dodaj link</a>
        <div class="col-md-8">
            @foreach ($links as $link)
                Link: {{ $link->url }} <br>
            @endforeach
        </div>
    </div>
</div>
@endsection
