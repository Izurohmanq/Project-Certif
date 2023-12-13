<?php

namespace App\Http\Controllers;

use App\Models\Rental;
use App\Models\Shoe;
use Illuminate\Http\Request;

class HomeController extends Controller
{
  public function index()
  {
    if (request('search')) {
      $data = Shoe::where('name', 'like', '%' . request('search') . '%')->latest()->get();
    } else {
      $data = Shoe::all();
    }
    return view('home', [
      'shoes' => $data
    ]);
  }
}
