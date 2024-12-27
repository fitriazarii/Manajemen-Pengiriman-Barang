<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\View\View;

class GuestController extends Controller
{
  public function index(): View
  {
    $products = Product::latest()->paginate(10);
    return view('guest.index', compact('products'));
  }
}

