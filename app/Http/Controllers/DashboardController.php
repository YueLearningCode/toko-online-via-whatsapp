<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Keranjang;
use App\Models\Product;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {        
        return view('dashboard');
    }

    public function totalUsers()
    {
        $users = User::all();
        return view('total_users', compact('users'));
    }

    public function totalSales()
    {
        $sales = Keranjang::select('product_id', DB::raw('SUM(quantity) as total_sold'))
            ->groupBy('product_id')
            ->with('product') 
            ->get();

        return view('total_sales', compact('sales'));
    }
}