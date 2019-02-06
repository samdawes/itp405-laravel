<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Validator;

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
      return view('tracks', [
        'tracks' => $tracks
      ]);
    }

    public function new()
    {
      $albums = DB::table('albums')
      ->select('albums.Title', 'albums.AlbumId')
      ->get();

      $mediaTypes = DB::table('media_types')
      ->get();

      $genres = DB::table('genres')
      ->get();

      return view('newtrack', [
        'albums' => $albums,
        'mediaTypes' => $mediaTypes,
        'genres' => $genres
      ]);
    }

    public function store(Request $request)
    {
      $input = $request->all();
      $validation = Validator::make($input, [
        'name' => 'required',
        'composer' => 'required',
        'milliseconds' => 'required|numeric',
        'bytes' => 'required|numeric',
        'unitPrice' => 'required|numeric'
      ]);

      if ($validation->fails()) {
        return redirect('/tracks/new')
        ->withInput()
        ->withErrors($validation);
      }

      $id = DB::table('tracks')->insertGetId([
        'Name' => $request->name,
        'AlbumId' => $request->album,
        'MediaTypeId' => $request->mediaType,
        'GenreId' => $request->genre,
        'Composer' => $request->composer,
        'Milliseconds' => $request->milliseconds,
        'Bytes' => $request->bytes,
        'UnitPrice' => $request->unitPrice
      ], 'TrackId');

      return redirect('/tracks');
    }
}
