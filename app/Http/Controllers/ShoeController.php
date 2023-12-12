<?php

namespace App\Http\Controllers;

use App\Models\Shoe;
use App\Http\Requests\StoreShoeRequest;
use App\Http\Requests\UpdateShoeRequest;
use App\Models\Category;

class ShoeController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    $shoe = Shoe::all();
    return view('shoes.index', [
      'shoe' => $shoe
    ]);
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create()
  {
    $categories = Category::all();
    return view('shoes.create', [
      'categories' => $categories
    ]);
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(StoreShoeRequest $request)
  {
    $data = $request->validated();
    $image = "{$data['name']}.{$data['image']->extension()}";
    $request->file('image')->move(public_path('/img/shoes'), $image);
    $data['image'] = "/img/shoes/$image";

    Shoe::create($data);
    return redirect(route('shoes'));
  }

  /**
   * Display the specified resource.
   */
  public function show(Shoe $shoe)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(Shoe $shoe)
  {
    $categories = Category::all();
    return view('shoes.edit', [
      'data' => $shoe,
      'categories' => $categories
    ]);
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(UpdateShoeRequest $request, Shoe $shoe)
  {
    // dd($request->all());

    $data = $request->validated();

    if ($request->image) {
      unlink(public_path($shoe['image']));
      $image = "{$data['name']}.{$data['image']->extension()}";
      $request->file('image')->move(public_path('/img/shoes'), $image);
      $data['image'] = "/img/shoes/$image";
    }
    $shoe->update($data);
    return redirect(route('shoes'));
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(Shoe $shoe)
  {
    if ($shoe['image']) {
      unlink(public_path($shoe['image']));
    }

    // Shoe::where('id', $shoe['id'])->delete();

    $shoe->delete();

    return redirect(route('shoes'))->with('status', 'Data berhasi dihapus');
  }
}
