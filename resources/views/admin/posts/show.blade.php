@extends('layouts.dashboard')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">

            <h1>Dettagli posts</h1>

            <p>
                <strong>Titolo:</strong>
                {{ $post->title }}
            </p>
            <p>
                <strong>Contenuto:</strong>
                {{ $post->content }}
            </p>
            <p>
                <strong>Slug: </strong>
                {{ $post->slug }}
            </p>
            <p>
                <strong>Creato il: </strong>
                {{ $post->created_at }}
            </p>
            <p>
                <strong>Aggiornato il: </strong>
                {{ $post->updated_at }}
            </p>
            <form class="d-inline" action="{{ route('admin.posts.destroy', ['post' => $post->id]) }}" method="post">
                @csrf
                @method('DELETE')
                <input type="submit" class="btn btn-small btn-danger" value="Elimina">
            </form>
        </div>
    </div>
</div>
@endsection