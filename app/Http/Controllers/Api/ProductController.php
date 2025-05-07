<?php
namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all(); // Ambil semua produk
        return view('product_list', compact('products')); // Tampilkan ke view
    }

    public function create()
    {
        return view('product_form'); // Tampilkan form untuk membuat produk
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
        ]);

        Product::create($request->only(['name', 'price'])); // Simpan produk ke database
        return redirect()->route('products.index')->with('success', 'Produk berhasil ditambahkan!');
    }

    public function edit(Product $product)
    {
        return view('product_form', compact('product')); // Tampilkan form untuk edit produk
    }

    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
        ]);

        $product->update($request->only(['name', 'price'])); // Update produk di database
        return redirect()->route('products.index')->with('success', 'Produk berhasil diperbarui!');
    }

    public function destroy(Product $product)
    {
        $product->delete(); // Hapus produk dari database
        return redirect()->route('products.index')->with('success', 'Produk berhasil dihapus!');
    }
}