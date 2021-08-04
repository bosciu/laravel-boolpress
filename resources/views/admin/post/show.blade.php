@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="row">
        <div class="col-6">
            <img class="img-fluid" src="{{asset('storage\/') . $post->cover}}" alt="">
        </div>
        <div class="col-6">
            @if (session('update'))
            <div class="alert alert-success">Il post {{session('update')}} è stato modificato con successo</div>
            @endif
            <h1>Titolo</h1>
            <h2 class="mb-5">{{$post->title}}</h2>
            <h3>Autore</h3>
            <h3 class="mb-5">{{$post->author}}</h3>
            <h3>Categoria</h3>
            @if (!$post->category)
                <div class="mb-4">Nessuna categoria associata al post</div>
            @else
                <div class="mb-4">{{$post->category->name}}</div>
            @endif
            <h3>Tags</h3>
            @if (count($post->tags)==0)
                <div class="mb-4">Nessun tag associato al post</div>
            @else
                <ul class="mb-4">
                    @foreach ($post->tags as $tag)
                        <li>{{$tag->name}}</li>
                    @endforeach
                </ul>
            @endif
            <p>
                {{$post->content}}
            </p>
            <div class="buttons  mt-5">
                <a href="{{route('admin.posts.edit', $post)}}" class="btn btn-warning">Modifica</a>
                <a href="{{route('admin.posts.index')}}" class="btn btn-secondary">Indietro</a>
            </div>
        </div>
    </div>
</div>
@endsection