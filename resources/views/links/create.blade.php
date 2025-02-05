@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">

        <div class="col-md-8">
            <form action="{{ route('links.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="logo">Wybierz logo z dostępnych</label>
                    <select class="form-control" name="logo" id="logo">
                        <option value="Facebook">Facebook</option>
                        <option value="Instagram">Instagram</option>
                        <option value="Twitter">Twitter</option>
                        <option value="TikTok">TikTok</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="url">Wklej link do strony</label>
                    <input type="text" class="form-control" id="url" name="url" required>
                </div>
                <div class="form-group">
                    <label for="title">Nadaj tytuł linku, będzie widoczny na przycisku przekierowującym do strony</label>    
                    <input type="text" class="form-control" id="title" name="title" required>
                </div>
                <div class="form-group">
                    <label for="description">Możesz krótko opisać co znajduje się po wejściu w link</label>
                    <textarea class="form-control" id="description" name="description"></textarea>
                </div>
                <div>
                    <label for="age_restricted">Czy zawiera treści tylko dla dorosłych?</label>
                    <input type="checkbox" id="age_restricted" name="age_restricted" value="1">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Dodaj link</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
