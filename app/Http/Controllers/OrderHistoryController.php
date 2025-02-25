<?php

namespace App\Http\Controllers;

use App\Models\OrderHistory;
use App\Models\Keranjang;
use Illuminate\Support\Facades\Auth;


class OrderHistoryController extends Controller
{
    public function index()
    {
        $orders = OrderHistory::where('user_id', Auth::id())->with('product')->get();
        return view('order_history.index', compact('orders'));
    }

    public function store()
    {
        // Ambil data dari keranjang berdasarkan user yang login
        $keranjangs = Keranjang::where('user_id', Auth::id())->get();

        // Cek apakah keranjang kosong
        if ($keranjangs->isEmpty()) {
            return response()->json(['error' => 'Keranjang kosong, tidak ada pesanan yang diproses.'], 400);
        }

        // Simpan ke order history
        foreach ($keranjangs as $keranjang) {
            OrderHistory::create([
                'user_id' => $keranjang->user_id,
                'product_id' => $keranjang->product_id,
                'quantity' => $keranjang->quantity,
                'price' => $keranjang->price
            ]);
        }

        // Hapus item dari keranjang setelah diproses
        Keranjang::where('user_id', Auth::id())->delete();

        // Kembalikan response JSON sukses
        return response()->json(['success' => true]);
    }

    public function destroy($id)
    {
        // Cari order berdasarkan ID dan hapus
        $order = OrderHistory::findOrFail($id);
        $order->delete();

        // Redirect kembali ke halaman orders dengan pesan sukses
        return back()->with('success', 'Order berhasil dihapus!');
    }
}
