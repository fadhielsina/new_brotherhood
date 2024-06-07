<?php

namespace App\Http\Controllers;

use App\Models\Merchant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class MasterMerchantController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $id_user = Auth::user()->id;
        $role = Auth::user()->roles->pluck('id');
        if ($role[0] == 1) :
            $data = Merchant::get();
        else :
            $data = Merchant::where('user_id', $id_user)->get();
        endif;
        return view('admin/master_merchant', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $form = 'add';
        return view('admin/form_master_merchant', compact('form'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name_product' => 'required',
            'description' => 'required',
            'price' => 'required',
            'picture' => 'required'
        ]);

        $file = $request->file('picture');
        $filename = 'merchant_' . date('YMdHis') . '.' . $file->getClientOriginalExtension();
        $path = 'merchant/' . $filename;
        Storage::disk('public')->put($path, file_get_contents($file));

        $data = [
            'user_id' => Auth::user()->id,
            'name_product' => $request->name_product,
            'description' => $request->description,
            'price' => $request->price,
            'picture' => $filename
        ];
        Merchant::create($data);
        return redirect()->route('master_merchant.index')->with('success', 'Data berhasil ditambah');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $form = 'edit';
        $data = Merchant::where('id', $id)->first();
        return view('admin/form_master_merchant', compact('form', 'data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name_product' => 'required',
            'description' => 'required',
            'price' => 'required',
        ]);

        $data = [
            'user_id' => Auth::user()->id,
            'name_product' => $request->name_product,
            'description' => $request->description,
            'price' => $request->price
        ];

        if ($request->file('picture')) :
            $file = $request->file('picture');
            $filename = 'merchant_' . date('YMdHis') . '.' . $file->getClientOriginalExtension();
            $path = 'merchant/' . $filename;
            Storage::disk('public')->put($path, file_get_contents($file));
            $data['picture'] = $filename;
        endif;

        Merchant::where('id', $id)->update($data);
        return redirect()->route('master_merchant.index')->with('success', 'Data berhasil ditambah');
    }

    public function posting(string $id)
    {
        Merchant::where('id', $id)->update(["status" => 0]);
        return redirect()->route('master_merchant.index')->with('success', 'Data berhasil di publish');
    }

    public function unposting(string $id)
    {
        Merchant::where('id', $id)->update(["status" => 1]);
        return redirect()->route('master_merchant.index')->with('success', 'Data berhasil di publish');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $cek_status = Merchant::where('id', $id)->first();
        if ($cek_status->status == 0) :
            return redirect()->route('master_merchant.index')->with('error', 'Data yang sedang aktif tidak bisa dihapus');
        else :
            Merchant::where('id', $id)->delete();
            return redirect()->route('master_merchant.index')->with('success', 'Data berhasil dihapus');
        endif;
    }
}
