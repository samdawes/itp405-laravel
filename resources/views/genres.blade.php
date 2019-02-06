@extends('layout')

@section('title', 'Genres')

@section('main')
<table class="table">
  <tr>
    <th>
      Genre
    </th>
  </tr>
  @foreach($genres as $genre)
  <tr>
    <td>
      <a href="/genres/{{$genre->GenreId}}/edit"><button class="btn btn-warning">Edit</button></a>
      <a href="tracks?genre={{$genre->Name}}">{{$genre->Name}}</a>
    </td>
  </tr>
  @endforeach

</table>
@endsection
