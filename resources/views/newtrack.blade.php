@extends('layout')

@section('title', 'New Track')

@section('main')
<div class="row">
  <div class="col">
    <form action="/tracks" method="post">
      @csrf
      <div class="form-group">
        <label for="name">Name</label>
        <input type="text" name="name" class="form-control" value="{{old('name')}}" />
        <small class="text-danger">{{$errors->first('name')}}</small>
      </div>
      <div class="form-group">
        <label for="album">Album</label>
        <select class="form-control" id="album" name="album">
          @foreach($albums as $album)
          <option value="{{$album->AlbumId}}" {{$album->AlbumId == old('album') ? "selected" : ""}} >{{$album->Title}}</option>
          @endforeach
        </select>
      </div>
      <div class="form-group">
        <label for="mediaType">Media Type</label>
        <select class="form-control" id="mediaType" name="mediaType">
          @foreach($mediaTypes as $mediaType)
          <option value="{{$mediaType->MediaTypeId}}" {{$mediaType->MediaTypeId == old('mediaType') ? "selected" : ""}}>{{$mediaType->Name}}</option>
          @endforeach
        </select>
      </div>
      <div class="form-group">
        <label for="genre">Genre</label>
        <select class="form-control" id="genre" name="genre">
          @foreach($genres as $genre)
          <option value="{{$genre->GenreId}}" {{$genre->GenreId == old('genre') ? "selected" : ""}}>{{$genre->Name}}</option>
          @endforeach
        </select>
      </div>
      <div class="form-group">
        <label for="composer">Composer</label>
        <input type="text" name="composer" class="form-control" value="{{old('composer')}}" />
        <small class="text-danger">{{$errors->first('composer')}}</small>
      </div>
      <div class="form-group">
        <label for="milliseconds">Milliseconds</label>
        <input type="text" name="milliseconds" class="form-control" value="{{old('milliseconds')}}" />
        <small class="text-danger">{{$errors->first('milliseconds')}}</small>
      </div>
      <div class="form-group">
        <label for="bytes">Bytes</label>
        <input type="text" name="bytes" class="form-control" value="{{old('bytes')}}" />
        <small class="text-danger">{{$errors->first('bytes')}}</small>
      </div>
      <div class="form-group">
        <label for="unitPrice">Unit Price</label>
        <input type="text" name="unitPrice" class="form-control" value="{{old('unitPrice')}}" />
        <small class="text-danger">{{$errors->first('unitPrice')}}</small>
      </div>
      <button type="submit" class="btn btn-primary">Save</button>
    </form>
  </div>
</div>
@endsection
