<?php

namespace App\Http\Controllers;

use App\Models\Shoe;
use App\Models\Rental;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Requests\StoreRentalRequest;
use App\Http\Requests\UpdateRentalRequest;

class RentalController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    $rents = Rental::all();
    return view('rents.index', compact('rents'));
  }
  public function myRent()
  {
    $data = Rental::where('user_id', auth()->user()->id)->get();
    return view('myrents.index', [
      'myrents' => $data
    ]);
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create()
  {
    //
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(Request $request)
  {
    $rental = Rental::where('user_id', auth()->user()->id)->get();
    if (count($rental) === 2) {
      return redirect(route('home'));
    }
    
    $request->validate(['shoe_id' => ['required', Rule::in(Shoe::pluck('id')->all())]]);
    Rental::create(
      [
        'user_id' => auth()->user()->id,
        'shoe_id' => $request->shoe_id,
      ]
    );
    return redirect(route('myrents.myrents'));
  }

  /**
   * Display the specified resource.
   */
  public function show(Rental $rental)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(Rental $rental)
  {
    //
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request, Rental $rental)
  {
    $rental->update(
      [
        'status' => 'rented',
      ]
    );
    return back();
  }


  /**
   * Remove the specified resource from storage.
   */
  public function destroy(Rental $rental)
  {
    //
  }

}
