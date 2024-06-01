<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MerchantController extends Controller
{
    public function index()
    {
        $products = [
            [
                'id' => 1,
                'name' => 'jakcet',
                'image' => url('front/merchant/jacket.jpg'),
                'price' => 500000,
                'description' => 'Jaket berbahan kulit. <br> Tersedia ukuran XXL,XL,L,M,S'
            ],
            [
                'id' => 2,
                'name' => 'stiker',
                'image' => url('front/merchant/stiker.jpg'),
                'price' => 10000,
                'description' => 'Stiker anti air'
            ],
        ];
        $product = json_encode($products);
        return view('front/merchant_new', compact('product'));
    }

    public function checkout(Request $request)
    {
        $product = $request->all();
        return view('front/billing_form', compact('product'));
    }

    public function submit_form(Request $request)
    {
        dd($request->all());
    }
}
