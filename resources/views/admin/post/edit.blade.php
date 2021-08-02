@extends('layouts.app')

@section('content')
<div class="container py-4">
  <a href="{{route('admin.posts.index')}}" class="btn btn-secondary mb-3">Indietro</a>
    <h1>Pagina modifica</h1>
    <form action="{{route('admin.posts.update', $post)}}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
          <label for="title" class="form-label">Titolo</label>
          <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" placeholder="Inserisci il titolo" value="{{old('title', $post->title)}}">
          @error('title')
            <div class="invalid-feedback mt-1">{{ $message }}</div> 
          @enderror
        </div>
        <div class="mb-3">
          <label for="author" class="form-label">Autore</label>
          <input type="text" class="form-control @error('author') is-invalid @enderror" id="author" name="author" placeholder="Inserisci l'autore" value="{{old('author', $post->author)}}">
          @error('author')
            <div class="invalid-feedback mt-1">{{ $message }}</div> 
          @enderror
        </div>
        <div class="mb-3">
          <label for="category" class="form-label">Categoria</label>
          <select class="form-control @error('category_id') is-invalid @enderror" name="category_id" id="category">
            <option value="">-- Seleziona una categoria --</option>
            @foreach ($categories as $category)
                <option value="{{$category->id}}" {{old('category_id',$post->category_id) == $category->id?'selected':''}}>{{$category->name}}</option>
            @endforeach
          </select>
          @error('category_id')
            <div class="invalid-feedback mt-1">{{ $message }}</div> 
          @enderror
        </div>
        <div class="mb-3">
          <div class="form-label mb-2">Tag</div>
          <div class="form-check form-check-inline">
            @if ($errors->any())
              @foreach ($tags as $tag)
              <input class="form-check-input" type="checkbox" {{in_array($tag->id,old('tags_id',[]))?'checked':''}} id="tag-{{$tag->id}}" value="{{$tag->id}}" name="tags_id[]">
              <label class="form-check-label mr-3" for="tags">{{$tag->name}}</label>
              @endforeach
            @else
              @foreach ($tags as $tag)
              <input class="form-check-input" type="checkbox" {{$post->tags->contains($tag->id)?'checked':''}} id="tag-{{$tag->id}}" value="{{$tag->id}}" name="tags_id[]">
              <label class="form-check-label mr-3" for="tags">{{$tag->name}}</label>
              @endforeach
            @endif
          </div>
          @error('tags_id')
            <div class="text-danger">{{$message}}</div> 
          @enderror
        </div>
        <div class="mb-3">
            <label for="content">Contenuto</label>
            <textarea class="form-control @error('content') is-invalid @enderror" placeholder="Inserisci il contenuto" id="content" name="content" rows="10">{{old('content', $post->content)}}</textarea>
            @error('content')
            <div class="invalid-feedback mt-1">{{ $message }}</div> 
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Invia</button>
      </form>
</div>
@endsection