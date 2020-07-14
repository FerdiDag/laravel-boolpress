@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
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
                    <strong>Categoria: </strong>
                    {{$post->category->name ?? '' }}
                </p>
                <p>
                    <strong>Creato il: </strong>
                    {{ $post->created_at }}
                </p>
                <p>
                    <strong>Aggiornato il: </strong>
                    {{ $post->updated_at }}
                </p>
            </div>
        </div>
    </div>
    @endsection