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
    $rental = Rental::where('user_id', auth()->user()->id)->where('status', 'rented')->get();
    if (count($rental) === 2) {
      return redirect(route('home'));
    }

    $request->validate(['shoe_id' => ['required', Rule::in(Shoe::where('available', true)->pluck('id')->all())]]);
    Rental::create(
      [
        'user_id' => auth()->user()->id,
        'shoe_id' => $request->shoe_id,
      ]
    );

    $shoe = Shoe::find($request->shoe_id);
    $shoe->update(
      [
        'available' => false,
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
    $shoe = Shoe::find($rental->shoe->id);
    $shoe->update(
      [
        'available' => $rental->status === 'pending_rent' ? false : true,
      ]
    );

    $rental->update(
      [
        'status' => $rental->status === 'pending_rent' ? 'rented' : 'returned',
      ]
    );
    return back();
  }

  public function deny(Request $request, Rental $rental)
  {
    $shoe = Shoe::find($rental->shoe->id);
    if ($rental->status === 'pending_rent') {
      $rental->delete();
      $shoe->update(
        [
          'available' => true,
        ]
      );
    }

    if ($rental->status === 'pending_return') {
      $rental->update(
        [
          'status' => 'rented',
        ]
      );
    }
    return back();
  }

  public function return(Request $request, Rental $rental)
  {
    $rental->update(
      [
        'status' => 'pending_return',
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
