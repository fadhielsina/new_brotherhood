<?php

namespace App\Http\Controllers;

use App\Models\MasterProgram;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class MasterProgramController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $program = MasterProgram::all();
        return view('admin/master_program', compact('program'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        MasterProgram::create($request->all());
        return redirect()->route('master_program.index')->with('success', 'Data berhasil ditambah');
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
        $data = MasterProgram::find($id);
        return view('admin/form_master_program', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = ['name_program' => $request->name_program];
        MasterProgram::where('id', $id)->update($data);
        return redirect()->route('master_program.index')->with('success', 'Data berhasil dirubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        MasterProgram::where('id', $id)->delete();
        Session::flash('success', 'Data Berhasil Dihapus!');
        return response()->json([
            'success' => true,
            'data'    => $id
        ]);
    }
}
