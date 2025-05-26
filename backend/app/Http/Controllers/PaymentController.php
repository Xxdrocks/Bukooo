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

        $data = $request->all();

        $payment = Payment::create([
            'user_id' => Auth::user()->id,
            'product_id' => $data['product_id'],
            'price' => $data['price'],
            'status' => 'pending',
            'gross_amount' => (int) round($data['price']),
        ]);

        // Midtrans configuration
        Config::$serverKey = config('midtrans.serverKey');
        Config::$isProduction = false;
        Config::$isSanitized = true;
        Config::$is3ds = true;

        $params = array(
            'transaction_details' => array(
                'order_id' => rand(),
                'gross_amount' => (int) round($data['price']),
            ),
            'customer_details' => array(
                'user_id' => Auth::user()->id,
                'email' => Auth::user()->email,
            )
        );


        $snapToken = Snap::getSnapToken($params);

        $payment->snap_token = $snapToken;
        $payment->save();

        // Return the view with payment data instead of redirecting
        return view('product.index', compact('payment'));
    }
    public function checkout(Payment $payment)
    {
        $products = config('products');
        $product = collect($products)->firstWhere('id', $payment->product_id);

        return view('product.index', compact('payment', 'product'));
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

    //     if ($request->status === 'paid') {

    //         $payment->paid_at = now();
    //     }

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
