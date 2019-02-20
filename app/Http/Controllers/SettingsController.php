<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class SettingsController extends Controller
{
    public function index()
    {
      $mode = DB::table('configurations')
      ->where('name', 'maintenance')
      ->value('value');

      return view('/settings', ['maintenance' => $mode]);
    }

    public function changeSettings(Request $request)
    {
      $input = $request->all();

      if ($request->maintenance == "on") {
        DB::table('configurations')
        ->where('name', 'maintenance')
        ->update(['value' => $request->maintenance]);
      } else {
        DB::table('configurations')
        ->where('name', 'maintenance')
        ->update(['value' => 'off']);
      }



      return redirect('/settings');
    }
}
