<?php

namespace App\Http\Controllers\User;

use App\Models\Brand;
use App\Models\Slider;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function index()
    {
        $sliders = Slider::with('translations')->get();
        $products = Product::with('translations')->orderBy('created_at', 'desc')->take(8)->get();
        $teachers = Brand::with('translations')->get();
        return view('user.index', compact('sliders', 'products', 'teachers'));
    }

    public function shop(Request $request)
    {
        $products = Product::with('translations')
            ->orderBy('created_at', 'desc')
            ->paginate(12);

        return view('user.shop', compact('products'));
    }

    // public function productDetail($id)
    // {
    //     $product = Product::FindOrFail($id);
    //     return view('user.detail', compact('product'));
    // }
}
