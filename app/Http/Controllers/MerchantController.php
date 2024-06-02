<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Transaction;
use App\Models\TransactionDetail;
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
        $transaction = new Transaction;
        $transaction->name_customer = $request->nama;
        $transaction->email = $request->email;
        $transaction->phone = $request->tlp;
        $transaction->address = $request->alamat;
        $transaction->total = (int)$request->total * 1000;
        $transaction->save();
        $id_transaction = $transaction->id;

        $i = 0;
        foreach ($request->nama_produk as $val) :
            $transaction_detail = new TransactionDetail;
            $transaction_detail->transaction_id = $id_transaction;
            $transaction_detail->name_product = $request->nama_produk[$i];
            $transaction_detail->description = $request->deskripsi[$i];
            $transaction_detail->qty = $request->qty[$i];
            $transaction_detail->price = (int)$request->price[$i] * 1000;
            $transaction_detail->save();
            $i++;
        endforeach;
        return view('front/thanks');
    }
}
