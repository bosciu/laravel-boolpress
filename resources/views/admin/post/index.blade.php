@extends('layouts.app')

@section('content')
<div class="container py-4">
    @if (session('created'))
        <div class="alert alert-success">Il post {{session('created')}} è stato creato con successo</div>
    @elseif (session('deleted'))
        <div class="alert alert-success">Il post {{session('deleted')}} è stato eliminato con successo</div>
    @endif
    <a class="btn btn-primary mb-5" href="{{route('admin.posts.create')}}">Crea nuovo post</a>
    <table class="table">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Titolo</th>
            <th scope="col">Autore</th>
            <th scope="col">Categoria</th>
            <th scope="col">Anteprima</th>
            <th scope="col" colspan=3>Azioni</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($posts as $post)
            <tr>
                <th scope="row">{{$post->id}}</th>
                <td>
                    @if (strlen($post->title)>=50)
                        {{substr($post->title,0,50).'...'}}
                    @else
                        {{$post->title}}
                    @endif
                </td>
                <td>{{$post->author}}</td>
                <td>
                    @if ($post->category)
                        {{$post->category->name}}
                    @else
                        Vuota
                    @endif
                </td>
                <td>
                    @if (strlen($post->content)>=50)
                        {{substr($post->content,0,50).'...'}}
                    @else
                        {{$post->content}}
                    @endif
                </td>
                <td>
                    <a class="btn btn-success" href="{{route('admin.posts.show', $post)}}">Mostra</a>
                </td>
                <td>
                    <a class="btn btn-warning" href="{{route('admin.posts.edit', $post)}}">Modifica</a>
                </td>
                <td>
                    <form action="{{route('admin.posts.destroy', $post)}}" method="POST" onsubmit="return confirm('Sei sicuro di voler eliminare il post?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Cancella</button>
                    </form>
                </td>
            </tr> 
            @endforeach
        </tbody>
      </table>
      <div class="d-flex justify-content-center mt-5">
          {{$posts->links()}}
      </div>
</div>
@endsection