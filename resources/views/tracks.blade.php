@extends('layout')

@section('title', $genre)

@section('main')
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
