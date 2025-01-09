@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <a href="{{ route('links.create') }}" class="btn btn-primary">Dodaj link</a>
        <div class="col-md-8">
            @foreach ($links as $link)
                Link: {{ $link->url }} <br>
            @endforeach
        </div>
    </div>
</div>
@endsection
