<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;
use App\Models\User;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::all();
        return view('product', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
        */
    public function create(){
        return view("addProduct.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'name' => 'required',
            'category' => 'required|max:255',
            'image' => 'required|mimes:png,jpg,jpeg',
            'price' => 'required',
            'created_by' => 'required'
        ]);



        if (!$validate) {
            dd($request->all());
        }


        $file = $request->file('image')->store('product', 'public');
        Product::create([
            'name' => $request->name,
            'category' => $request->category,
            'image' => $file,
            'price' => $request->price,
            'created_by' => $request->created_by
        ]);

        return redirect()->route('product', 'home')->with('success', 'product berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $product = Product::findOrFail($id);
        return view('admin.layouts.edit-product', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $product = Product::findOrFail($id);
        $request->validate([
            'name' => 'required',
            'category' => 'required',
            'image' => 'required|mimes:png,jpg,jpeg',
            'price' => 'required',
            'created_by' => 'required'
        ]);

        if ($request->hasFile('image')) {
            if ($product->image) {
                Storage::delete('public/' . $product->image);
            }

            $file = $request->file('image')->store('product', 'public');
            $product->image = $file;
        }

        $product->name = $request->name;
        $product->category = $request->category;
        $product->price = $request->price;
        $product->save();


        return redirect()->route('home');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = Product::findOrFail($id);
        if ($product->image) {
            Storage::delete('public/' . $product->image);
        }
        $product->delete();
        return redirect()->route('home');
    }

    public function home()
{
    $products = Product::all();
    return view('home', compact('products'));
}
}
