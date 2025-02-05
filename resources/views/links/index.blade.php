@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <!-- Przyciski akcji -->
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h3>Panel użytkownika</h3>
                <div>
                    <a href="{{ route('user.show', $user->slug) }}" class="btn btn-success">
                        <i class="fas fa-user"></i> Profil użytkownika
                    </a>
                    <a href="{{ url('/user/' . $user->id . '/edit-name') }}" class="btn btn-secondary">
                        <i class="fas fa-edit"></i> Edytuj nazwę
                    </a>
                    <a href="{{ route('links.create') }}" class="btn btn-primary">
                        <i class="fas fa-plus"></i> Dodaj link
                    </a>
                </div>
            </div>

            <!-- Lista linków -->
            <div class="card">
                <div class="card-header">
                    <h5>Twoje linki</h5>
                </div>
                <div class="card-body">
                    @if($links->count() > 0)
                        <ul class="list-group">
                            @foreach ($links as $link)
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <a href="{{ $link->url }}" target="_blank">{{ $link->url }}</a>
                                    <span class="badge bg-info">{{ $link->created_at->format('d.m.Y') }}</span>
                                </li>
                            @endforeach
                        </ul>
                    @else
                        <p class="text-muted">Nie masz jeszcze żadnych linków.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
