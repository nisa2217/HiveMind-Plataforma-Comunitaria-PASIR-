@extends('layouts.app')
@section('content')
<div class="container">
    <div class="titlebar">
        <a class="btn btn-secondary float-end mt-3" href="{{ route('posts.create') }}" role="button">Nuevo Post</a>
        <h1>Blog de Ciberseguridad</h1>
    </div>
    
    <hr>
    
    @if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
    @endif
    
    @if (count($posts) > 0)
        @foreach ($posts as $post)
            <div class="row mb-4">
                <div class="col-12">
                    <div class="row align-items-center">
                        <div class="col-2">
                            <img class="img-fluid rounded" style="max-width:100%;" src="{{ asset('images/'.$post->image)}}" alt="{{ $post->title }}">
                        </div>
                        <div class="col-10">
                            <h4>{{ $post->title }}</h4>
                            <p class="text-muted">Publicado el {{ $post->created_at->format('d/m/Y') }}</p>
                        </div>
                    </div>
                    <p class="mt-2">{{ $post->description }}</p>
                    <hr>
                </div>
            </div>
        @endforeach
    @else
        <div class="alert alert-info">
            No hay artículos publicados aún.
        </div>
    @endif
</div>
@endsection