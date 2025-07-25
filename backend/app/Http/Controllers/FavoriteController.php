<?php

namespace App\Http\Controllers;

use App\Models\Favorite;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class FavoriteController extends Controller
{

    public function profile()
    {
        $user = Auth::user();

        $favorites = Favorite::with('product')
            ->where('user_id', $user->id)
            ->get();

        return view('profile.index', ['favorites' => $favorites]);
    }

    public function index()
    {
        $user = Auth::user();

        $favorites = Favorite::with('product')
            ->where('user_id', $user->id)
            ->get();

        return view('favorite.index', compact('favorites'));
    }
    public function toggle(Request $request)
    {
        $user = Auth::user();
        $productId = $request->input('product_id');

        $favorite = Favorite::where('user_id', $user->id)
            ->where('product_id', $productId)
            ->first();

        if ($favorite) {
            $favorite->delete();
            return response()->json(['status' => 'removed']);
        } else {
            Favorite::create([
                'user_id' => $user->id,
                'product_id' => $productId,
            ]);
            return response()->json(['status' => 'added']);
        }
    }
}
