<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Validator;

class GenresController extends Controller
{
    //
    public function index()
    {
      $query = DB::table('genres');
      $genres = $query->get();

      return view('genres', ['genres' => $genres]);
    }

    public function edit($genreId = null)
    {
      $genre = DB::table('genres')
      ->where('GenreId', $genreId)
      ->first();

      return view('editgenre', [
        'genre' => $genre
      ]);

    }

    public function store(Request $request)
    {
      $input = $request->all();
      $validation = Validator::make($input, [
        'name' => 'required|min:3|unique:genres,Name'
      ]);

      if ($validation->fails()) {
        return redirect('/genres/{id}/edit')
        ->withInput()
        ->withErrors($validation);
      }

      DB::table('genres')
      ->where('GenreId', $request->genreId)
      ->update(['Name' => $request->name]);

      return redirect('/genres');
    }
}
