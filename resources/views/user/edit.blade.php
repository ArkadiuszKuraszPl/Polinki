@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Name</h1>
    
    {{-- Komunikaty sukcesu lub błędów --}}
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    {{-- Formularz edycji --}}
    <form action="{{ url('/user/' . $user->id . '/update-name') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">New Name</label>
            <input 
                type="text" 
                id="name" 
                name="name" 
                class="form-control @error('name') is-invalid @enderror" 
                value="{{ old('name', $user->name) }}" 
                required
            >
            @error('name')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Update Name</button>
    </form>
</div>
@endsection
