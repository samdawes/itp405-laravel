@extends('layout')

@section('title', 'Tracks')

@section('main')
<a href="/tracks/new"><button class="btn btn-primary">Add new track</button></a>

<table class="table">
  <tr>
    <th>Track</th>
    <th>Album</th>
    <th>Artist</th>
    <th>Price</th>
  </tr>
  @foreach($tracks as $track)
  <tr>
    <td>
      {{$track->TrackName}}
    </td>
    <td>
      {{$track->Title}}
    </td>
    <td>
      {{$track->ArtistName}}
    </td>
    <td>
      {{$track->UnitPrice}}
    </td>
  </tr>
  @endforeach
</table>
@endsection
