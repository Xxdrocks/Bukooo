<?php

namespace App\Http\Controllers;

use App\Models\SellerProfile;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;



class SellerController extends Controller
{

    public function create()
    {
        return view('seller.become'); // form untuk isi data seller
    }

    public function store(Request $request)
    {
        $request->validate([
            'store_name' => 'required|string|max:255',
            'address' => 'required|string',
            'phone_number' => 'required|string',
        ]);

        $user = Auth::user();


        SellerProfile::create([
            'user_id' => Auth::id(),
            'store_name' => $request->store_name,
            'address' => $request->address,
            'phone_number' => $request->phone_number,
        ]);


        $user->update(['role' => 'seller']);


        return redirect('/')->with('success', 'Sekarang kamu adalah seller!');
    }
}
