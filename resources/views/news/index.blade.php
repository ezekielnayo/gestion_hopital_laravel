<!-- resources/views/news/index.blade.php -->

@extends('app')

@section('content')
<div class="container mt-5">
    <h1>Actualités</h1>
    <p>Toutes les dernières nouvelles et informations.</p>
    <div class="row">
        @foreach($news as $article)
            <div class="col-md-4">
                @if($article->image_path)
                        <img src="{{ asset($article->image_path) }}" class="card-img-top" alt="{{ $article->title }}">
                    @else
                        <img src="{{ asset('images/clinic_01.jpg') }}" class="card-img-top" alt="Image par défaut">
                    @endif
                    <div class="card-body">
                        <h5 class="card-title">{{ $article->title }}</h5>
                        <p class="card-text">{{ Str::limit($article->content, 100) }}</p>
                        <a href="#" class="btn btn-primary">Lire la suite</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
