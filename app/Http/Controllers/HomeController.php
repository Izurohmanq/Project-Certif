<?php

namespace App\Http\Controllers;

use App\Models\Rental;
use App\Models\Shoe;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $data = Shoe::all();
        return view ('home', [
            'shoes' => $data
        ]);
    }

    public function searchShoes() {
        $data = Shoe::latest();
        if(request('search')) {
            $data->where('name', 'like', '%' . request('search') . '%');
        }

        return view('home', [
            'shoes' => $data->get()
        ]);
    }

    public function store(Request $request)
    {
        Rental::create(
            [   
                'user_id'=> $request->user_id,
                'shoe_id'=> $request->shoe_id,
            ]
            );
            return redirect(route('myrents.myrents'));
    }
}
