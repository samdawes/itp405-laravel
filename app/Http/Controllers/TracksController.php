<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class TracksController extends Controller
{
    //
    public function index(Request $request)
    {
      $query = DB::table('tracks')
      ->join('albums', 'albums.AlbumId', '=', 'tracks.AlbumId')
      ->join('artists', 'artists.ArtistId', '=', 'albums.ArtistId')
      ->join('invoice_items', 'invoice_items.TrackId', '=', 'tracks.TrackId')
      ->join('genres', 'genres.GenreId', '=', 'tracks.GenreId')
      ->select('tracks.Name as TrackName', 'albums.Title', 'artists.Name as ArtistName', 'invoice_items.UnitPrice');

      if ($request->query('genre')) {
        $query->where('genres.Name', '=', $request->query('genre'));
      }

      $tracks = $query->get();

      if ($request->query('genre')) {
        return view('tracks', [
          'genre' => $request->query('genre'),
          'tracks' => $tracks
        ]);
      }

    }
}
