<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use Illuminate\Http\Request;
use App\Models\MasterProgram;
use Illuminate\Support\Facades\Session;

class NewsActivityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $activity = Activity::where('status', 1)->get();
        $program = MasterProgram::get();
        return view('admin/news_activity', compact('activity', 'program'));
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
        $request->validate([
            'program_id' => 'required',
            'name_activity' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'description' => 'required',
        ]);
        $input = $request->except(['_token', '_method']);
        Activity::create($input);
        return redirect()->route('news_activity.index')->with('success', 'Data berhasil ditambahkan');
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Activity::where('id', $id)->delete();
        Session::flash('success', 'Data Berhasil Dihapus!');
        return response()->json([
            'success' => true,
            'data'    => $id
        ]);
    }
}
