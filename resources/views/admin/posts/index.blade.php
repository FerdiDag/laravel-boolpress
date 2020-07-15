@extends('layouts.dashboard')

@section('content')
<div class="row">
    <div class="col-12">
        <h1>Lista posts</h1>
        <a class="btn btn-primary" href="{{ route('admin.posts.create') }}">Crea nuovo post</a>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Titolo</th>
                    <th>Slug</th>
                    <th>Categoria</th>
                    <th>Tags</th>
                    <th>Azioni</th>

                </tr>
            </thead>
            <tbody>
                @foreach ($posts as $post)
                <tr>
                    <td> {{$post->id}} </td>
                    <td> {{$post->title}} </td>
                    <td> {{$post->slug}} </td>
                    <td> {{$post->category->name ?? '' }} </td>
                    <td>
                        @forelse ($post->tags as $tag)
                        {{ $tag->name }}{{ $loop->last ? '' : ', '}}
                        @empty
                        -
                        @endforelse
                    </td>
                    <td>
                        <a class="btn btn-small btn-info" href="{{ route('admin.posts.show', ['post' => $post->id]) }}">
                            Dettaglio
                        </a>
                        <a class="btn btn-small btn-warning" href="{{ route('admin.posts.edit', ['post' => $post->id]) }}">
                            Modifica
                        </a>
                        <form class="d-inline" action="{{ route('admin.posts.destroy', ['post' => $post->id]) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <input type="submit" class="btn btn-small btn-danger" value="Elimina">
                        </form>
                    </td>
                </tr>
                @endforeach

            </tbody>
        </table>
    </div>
</div>




@endsection