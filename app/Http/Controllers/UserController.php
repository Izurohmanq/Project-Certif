<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    $users = User::all();
    return view('users.index', compact('users'));
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create()
  {
    return view('users.create');
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(Request $request)
  {
    $request->validate([
      'name' => ['required', 'string', 'max:255'],
      'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
      'password' => ['required', 'confirmed', Rules\Password::defaults()],
    ]);

    User::create([
      'name' => $request->name,
      'email' => $request->email,
      'password' => Hash::make($request->password),
      'is_admin' => $request->is_admin === 'on' && true
    ]);

    return redirect(route('users.index'));
  }

  /**
   * Display the specified resource.
   */
  public function show(User $user)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(User $user)
  {
    if (auth()->user()->id === $user->id) {
      return redirect(route('users.index'));
    }
    return view('users.edit', [
      'user' => $user,
    ]);
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request, User $user)
  {
    $request->validate([
      'name' => ['required', 'string', 'max:255'],
      'email' => ['required', 'string', 'lowercase', 'email', 'max:255', Rule::unique(User::class)->ignore($user->id)] ,
    ]);

    $user->update([
      'name' => $request->name,
      'email' => $request->email,
      'is_admin' => $request->is_admin === 'on' ? true : false
    ]);

    return redirect(route('users.index'));
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(User $user)
  {
    if (auth()->user()->id === $user->id) {
      return redirect(route('users.index'));
    }
    $user->delete();
    return back();
  }
}
