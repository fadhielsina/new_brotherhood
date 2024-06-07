<?php

namespace App\Http\Controllers;

use App\Models\MasterChapter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class MasterChapterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $chapter = MasterChapter::all();
        return view('admin/master_chapter', compact('chapter'));
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
            'name_chapter' => ['required'],
            'location' => ['required'],
            'logo_chapter' => ['required'],
        ]);

        $file = $request->file('logo_chapter');
        $filename = 'logo_chapter_' . date('YMdHis') . '.' . $file->getClientOriginalExtension();
        $path = 'logo_chapter/' . $filename;

        Storage::disk('public')->put($path, file_get_contents($file));

        $data = [
            'name_chapter' => $request->name_chapter,
            'location' => $request->location,
            'logo_chapter' => $filename
        ];
        MasterChapter::create($data);
        return redirect()->route('master_chapter.index')->with('success', 'Data berhasil ditambah');
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
        $data = MasterChapter::where('id', $id)->first();
        return view('admin/form_master_chapter', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $data = [
            'name_chapter' => $request->name_chapter,
            'location' => $request->location
        ];

        $request->validate([
            'name_chapter' => ['required'],
            'location' => ['required'],
        ]);

        if ($request->file('logo_chapter')) :
            $file = $request->file('logo_chapter');
            $filename = 'logo_chapter_' . $file->getClientOriginalName();
            $path = 'logo_chapter/' . $filename;
            Storage::disk('public')->put($path, file_get_contents($file));
            $data['logo_chapter'] = $filename;
        endif;

        MasterChapter::where('id', $id)->update($data);
        return redirect()->route('master_chapter.index')->with('success', 'Data berhasil dirubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        MasterChapter::where('id', $id)->delete();
        Session::flash('success', 'Data Berhasil Dihapus!');
        return response()->json([
            'success' => true,
            'data'    => $id
        ]);
    }
}
