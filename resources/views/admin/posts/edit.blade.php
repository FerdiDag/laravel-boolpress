@extends('layouts.dashboard')

@section('content')
<div class="row">
    <div class="col-12">
        <h1>Modifica post</h1>


    </div>
    <form action="{{ route('admin.posts.update', ['post' => $post->id]) }}" method="post">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="titolo">Titolo</label>
            <input type="text" name="title" class="form-control" id="titolo" placeholder="Titolo post" value="{{ old('title', $post->title) }}">
        </div>
        <div class="form-group">
            <label for="testo">Testo articolo</label>
            <textarea type="text" name="content" class="form-control" id="testo" placeholder="Scrivi qualcosa...">{{ old('content', $post->content) }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Salva</button>
    </form>

</div>




@endsection