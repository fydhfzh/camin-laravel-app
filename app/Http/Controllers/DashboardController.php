<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\User;
use App\Models\Transaction;

class DashboardController extends Controller
{
    public function index(){
        return view('dashboard.index', [
            'products' => Product::all()
        ]);
    }

    public function customers(){
        return view('dashboard.customers', [
            'customers' => User::all()
        ]);
    }

    public function transactions(){
        return view('dashboard.transactions', [
            'transactions' => Transaction::all()
        ]);
    }
}
