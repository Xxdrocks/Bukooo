<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Product;
use App\Models\Payment;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.dashboard');
    }

    // USER CRUD
    public function getAllUsers()
    {
        // return response()->json(User::all());
        return view('admin.user.index', ['users' => User::all()]);
    }

    public function storeUser(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
            'role' => 'required|in:user,superadmin,seller'
        ]);

        $validated['password'] = bcrypt($validated['password']);
        User::create($validated);

        return redirect()->route('user.index')->with('success', 'User berhasil dibuat');
    }

    public function createUser()
    {
        return view('admin.user.create');
    }

    public function editUser($id)
    {
        $user = User::findOrFail($id);
        return view('admin.user.edit', compact('user'));
    }


    public function updateUser(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $data = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $id,
            'password' => 'nullable|min:6',
            'role' => 'required|in:user,superadmin,seller'
        ]);

        if (!empty($data['password'])) {
            $data['password'] = bcrypt($data['password']);
        } else {
            unset($data['password']);
        }

        $user->update($data);

        return redirect()->route('user.index')->with('success', 'User berhasil diperbarui');
    }

    public function destroyUser($id)
    {
        User::findOrFail($id)->delete();
        return redirect()->route('user.index')->with('success', 'User berhasil dihapus');
    }

    // PRODUCT CRUD
    public function getAllProducts()
    {
        return view('admin.product.index', ['products' => Product::all()]);
    }

    public function createProduct()
    {
        return view('admin.product.create');
    }

    public function storeProduct(Request $request)
    {

        // $validate = $request->validate([
        //     'name' => 'required',
        //     'category' => 'required|max:255',
        //     'image' => 'required|mimes:png,jpg,jpeg',
        //     'price' => 'required',
        //     'created_by' => 'required'
        // ]);



        // if (!$validate) {
        //     dd($request->all());
        // }


        $file = $request->file('image')->store('product', 'public');
        Product::create([
            'name' => $request->name,
            'category' => $request->category,
            'image' => $file,
            'price' => $request->price,
            'created_by' => $request->created_by
        ]);

        return redirect()->route('product.index')->with('success', 'Product berhasil dibuat');
    }

    public function editProduct($id)
    {
        $product = Product::findOrFail($id);
        return view('admin.product.edit', compact('product'));
    }

    public function updateProduct(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        $validated = $request->validate([
            'name' => 'required',
            'category' => 'required',
            'image' => 'mimes:png,jpg,jpeg',
            'price' => 'required|numeric',
            'created_by' => 'exists:users,id'
        ]);


        if ($request->hasFile('image')) {
            if ($product->image && Storage::exists($product->image)) {
                Storage::delete($product->image);
            }
            $path = $request->file('image')->store('product', 'public');
            $validated['image'] = $path;
        }


        $product->update($validated);

        return redirect(route('product.index'))->with('success', 'Produk berhasil diubah');
    }

    public function destroyProduct($id)
    {
        Product::findOrFail($id)->delete();
        return redirect()->route('product.index')->with('success', 'Product berhasil dihapus');
    }

    // PAYMENT CRUD
    public function getAllPayments()
    {
        return view('admin.payment.index', ['payments' => Payment::all()]);
    }

    public function createPayment()
    {
        return view('admin.payment.create');
    }




    public function storePayment(Request $request)
    {
        $payment = Payment::create($request->validate([
            'product_id' => 'required|exists:products,id',
            'user_id' => 'required|exists:users,id',
            'payment_method' => 'required',
            'status' => 'required|in:pending,completed,cancelled',
            'paid_at' => 'nullable|date'
        ]));
        return response()->json($payment);
    }

    public function updatePayment(Request $request, $id)
    {
        $payment = Payment::findOrFail($id);
        $payment->update($request->validate([
            'product_id' => 'required|exists:products,id',
            'user_id' => 'required|exists:users,id',
            'payment_method' => 'required',
            'status' => 'required|in:pending,completed,cancelled',
            'paid_at' => 'nullable|date'
        ]));
    }

    public function destroyPayment($id)
    {
        Payment::findOrFail($id)->delete();
        return response()->json(['success' => true]);
    }
}
