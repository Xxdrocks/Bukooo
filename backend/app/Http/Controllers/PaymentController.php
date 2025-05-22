<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Payment;
use Illuminate\Support\Facades\Auth;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();

        // Ambil semua payment user beserta data pro duk-nya
        $payments = $user->payments->with('product')->get();

        return view('payment.index', compact('payments'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $productId = $request->input('product_id');
        $product = Product::findOrFail($productId);
        return view('payment.create', compact('product'));
    }



    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'product_id' => 'required|exists:products,id',
            'user_id' => 'required|exists:users,id',
            'payment_method' => 'required|string',
            'status' => 'required|in:pending,paid,failed',
        ]);

        // penyimpanan
        $payment = new Payment();
        $payment->product_id = $request->product_id;
        $payment->user_id = Auth::id();
        $payment->payment_method = $request->payment_method;
        $payment->status = $request->status;

        //jika status paid

        if ($request->status === 'paid') {

            $payment->paid_at = now();
        }

        $payment->save();

        return redirect()->route('payment.index')->with('success', 'anda berhasil melakukan pembayaran');
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
