<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Keranjang;
use App\Models\Product;

class ShopController extends Controller
{
    public function index()
    {
        $products = Product::all(); 

        return view('welcome', compact('products'));
    }

    public function addToKeranjang(Request $request)
    {
        $keranjang = Keranjang::where('user_id', auth()->id())
            ->where('product_id', $request->input('id'))
            ->first();

        if ($keranjang) {
            $keranjang->update([
                'quantity' => $keranjang->quantity + 1,
            ]);
        } else {
            Keranjang::create([
                'user_id' => auth()->id(),
                'product_id' => $request->input('id'),  
                'quantity' => 1,
                'price' => $request->input('price'),
            ]);
        }

        return redirect()->route('keranjang')->with('success', 'Produk berhasil ditambahkan ke keranjang!');
    }


    public function keranjang()
    {
        $keranjang = Keranjang::with('product')->where('user_id', auth()->id())->get();
        
        return view('keranjang', compact('keranjang'));
    }


    public function updateKeranjang(Request $request)
    {
        $quantities = $request->input('quantities', []);

        foreach ($quantities as $id => $quantity) {
            $keranjangItem = Keranjang::find($id);
            if ($keranjangItem && $keranjangItem->user_id === auth()->id()) {
                $keranjangItem->update([
                    'quantity' => max(1, (int)$quantity), // Pastikan quantity >= 1
                ]);
            }
        }

        return redirect()->route('keranjang')->with('success', 'Keranjang diperbarui!');
    }

    public function removeFromKeranjang($id)
    {
        $keranjangItem = Keranjang::where('id', $id)->where('user_id', auth()->id())->first();

        if ($keranjangItem) {
            $keranjangItem->delete();
            return redirect()->route('keranjang')->with('success', 'Produk berhasil dihapus dari keranjang!');
        }

        return redirect()->route('keranjang')->with('success', 'Produk berhasil dihapus dari keranjang!');
    }

    public function halamantambah()
    {
        return view("halamantambah");
    }

    public function tambahProduct(Request $request)
    {
        // Validasi input
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required|numeric',
            'stock' => 'required|numeric',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Validasi untuk gambar
        ]);

        // Upload gambar jika ada
        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('uploads/Foto', 'public'); // Simpan gambar ke folder "public/storage/products"
        }

        // Simpan data ke database
        Product::create([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'stock' => $request->stock,
            'image' => $imagePath, // Simpan path gambar
            
        ]);

        // Redirect kembali ke halaman utama
        return redirect('/')->with('success', 'Produk berhasil ditambahkan');
    }
}
