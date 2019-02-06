@extends('layout')

@section('title', 'Add a Playlist')

@section('main')
<div class="row">
  <div class="col">
    <form action="/playlists" method="post">
      @csrf
      <div class="form-group">
        <label for="name">Name</label>
        <input type="text" name="name" class="form-control" value="{{old('name')}}" />
        <small class="text-danger">{{$errors->first()}}</small>
      </div>
      <button type="submit" class="btn btn-primary">Save</button>
    </form>
  </div>
</div>

@endsection
