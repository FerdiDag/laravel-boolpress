@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            <h1>{{ $post->title }}</h1>
            <p>{{ $post->content }}</p>
            <p>Categoria:{{ $post->category->name }}
            </p>
            <p>Tags:
                @forelse ($post->tags as $tag)
                {{ $tag->name }}{{ $loop->last ? '' : ', '}}
                @empty
                -
                @endforelse
            </p>
        </div>
    </div>
</div>
@endsection