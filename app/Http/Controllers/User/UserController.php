<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class UserController extends Controller
{
    //
    public function index()
    {
        $products = Product::all();
        return view('user.dashboard', compact('products'));
    }
    
}
