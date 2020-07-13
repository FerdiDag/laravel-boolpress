@extends('layouts.dashboard')

@section('content')
<div class="row">
    <div class="col-12">
        <h1>Crea nuovo post</h1>


    </div>
    <form action="{{ route('admin.posts.store') }}" method="post">
        @csrf
        <div class="form-group">
            <label for="titolo">Titolo</label>
            <input type="text" name="title" class="form-control" id="titolo" placeholder="Titolo post" value="{{ old('title') }}">
        </div>
        <div class="form-group">
            <label for="testo">Testo articolo</label>
            <textarea type="text" name="content" class="form-control" id="testo" placeholder="Scrivi qualcosa...">{{ old('content') }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Salva</button>
    </form>

</div>




@endsection