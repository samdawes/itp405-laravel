@extends('layout')

@section('title', 'Edit Genre')

@section('main')
<div class="row">
  <div class="col">
    <form action="/genres" method="post">
      @csrf
      <input type="hidden" name="genreId" value="{{$genre->GenreId}}" />
      <div class="form-group">
        <label for="name">Name</label>
        <input type="text" name="name" class="form-control" value="{{old('name') ? old('name') : $genre->Name}}" />
        <small class="text-danger">{{$errors->first('name')}}</small>
      </div>
      <button type="submit" class="btn btn-primary">Save</button>
    </form>
  </div>
</div>

@endsection
