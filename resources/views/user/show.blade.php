@extends('layouts.site')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow border-0">
                <div class="card-body text-center">
                    <!-- Awatar użytkownika -->
                    <div class="d-flex justify-content-center mb-3">
                        <div class="rounded-circle bg-secondary text-white d-flex align-items-center justify-content-center" 
                             style="width: 80px; height: 80px; font-size: 30px;">
                            {{ strtoupper(substr($user->name, 0, 1)) }}
                        </div>
                    </div>

                    <!-- Informacje o użytkowniku -->
                    <h2 class="card-title">{{ $user->name }}</h2>
                    <p class="text-muted mb-1">{{ $user->email }}</p>
                    <p class="small text-secondary">ID: {{ $user->slug }}</p>

                    <!-- Lista linków -->
                    <div class="mt-4">
                        <h5 class="mb-3">Linki użytkownika:</h5>
                        <div class="list-group">
                            @foreach ($links as $link)
                                <a href="{{ $link->url }}" target="_blank" 
                                   class="list-group-item list-group-item-action d-flex align-items-center">
                                    <i class="bi bi-link-45deg me-2"></i> 
                                    {{ parse_url($link->url, PHP_URL_HOST) }}
                                </a>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
