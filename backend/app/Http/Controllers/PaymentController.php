<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Payment;
use App\Models\User;
use Midtrans\Config;
use Midtrans\Snap;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;



class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        $payments = Auth::user()->payments;
        $products = Product::all();

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


    public function prosess(Request $request)
    {
        $request->validate([
            'price' => 'required|numeric|min:1',
        ]);

        $user = Auth::user();
        $product = Product::findOrFail($request->product_id);
        $grossAmount = (int) round($request->price);

        // Unique order ID
        $orderId = 'ORDER-' . uniqid();

        // Create local payment record
        $payment = Payment::create([
            'user_id' => $user->id,
            'product_id' => $product->id,
            'price' => $request->price,
            'status' => 'paid',
            'gross_amount' => $grossAmount,
            'order_id' => $orderId,
        ]);

        // Midtrans config
        Config::$serverKey = config('midtrans.serverKey');
        Config::$isProduction = config('midtrans.isProduction');
        Config::$isSanitized = config('midtrans.isSanitized');
        Config::$is3ds = config('midtrans.is3ds');

        // Payload to Midtrans
        $params = [
            'transaction_details' => [
                'order_id' => $orderId,
                'gross_amount' => $grossAmount,
            ],
            'customer_details' => [
                'first_name' => $user->name,
                'email' => $user->email,
            ],
        ];

        // Request snap token from Midtrans
        $snapToken = Snap::getSnapToken($params);

        if ($request->status === 'paid') {

            $payment->paid_at = now();
        }
        // Save token
        $payment->snap_token = $snapToken;
        $payment->save();

        return redirect()->route('payment.checkout', $payment->id);
    }

    public function checkout(Payment $payment)
    {
        $products = Product::all();
        return view('payment.checkout', compact('payment', 'products'));
    }




    // public function store(Request $request)
    // {
    //     $validate = $request->validate([
    //         'product_id' => 'required|exists:products,id',
    //         'user_id' => 'required|exists:users,id',
    //         'payment_method' => 'required|string',
    //         'status' => 'required|in:pending,paid,failed',

    //     ]);

    //     $user = User::find($request->user_id);

    //     // penyimpanan
    //     $payment = new Payment();
    //     $payment->product_id = $request->product_id;
    //     $payment->user_id = Auth::id();
    //     $payment->user_id = $request->user_id;
    //     $payment->buyer = $user->name;
    //     $payment->payment_method = $request->payment_method;
    //     $payment->status = $request->status;

    //     //jika status paid



    //     $payment->save();

    //     return redirect()->route('product')->with('success', 'anda berhasil melakukan pembayaran');
    // }

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
