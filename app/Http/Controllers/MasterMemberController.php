<?php

namespace App\Http\Controllers;

use App\Models\MasterChapter;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Storage;

class MasterMemberController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = User::where('status', 1)->get();
        return view('admin/master_member', compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $form = "add";
        $role = Role::all();
        $chapter = MasterChapter::all();
        return view('admin/form_master_member', compact('form', 'role', 'chapter'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nik' => 'required|unique:users',
            'name' => 'required',
            'email' => 'required|unique:users|email',
            'address' => 'required',
            'phone' => 'required|unique:users|digits_between:10,13',
            'birth_place' => 'required',
            'birth_day' => 'required',
            'domisili' => 'required',
            'role' => 'required',
            'chapter_id' => 'required',
            'avatar' => 'required',
        ]);

        $file = $request->file('avatar');
        $filename = 'avatar_' . date('YMdHis') . '.' . $file->getClientOriginalExtension();
        $path = 'avatar/' . $filename;
        Storage::disk('public')->put($path, file_get_contents($file));

        $role = $request->role;

        $data = [
            'nik' => $request->nik,
            'name' => $request->name,
            'email' => $request->email,
            'address' => $request->address,
            'phone' => $request->phone,
            'birth_place' => $request->birth_place,
            'birth_day' => $request->birth_day,
            'domisili' => $request->domisili,
            'chapter_id' => $request->chapter_id,
            'password' => bcrypt('123'),
            'avatar' => $filename,
        ];
        $user = User::create($data);
        $user->assignRole($role);

        return redirect()->route('master_member.index')->with('success', 'Data berhasil ditambah');
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
        $user = User::find($id);
        $role = Role::all();
        $chapter = MasterChapter::all();
        return view('admin/form_master_member', compact('user', 'form', 'role', 'chapter'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nik' => 'required|unique:users,nik,' . $id,
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $id,
            'address' => 'required',
            'phone' => 'required|digits_between:10,13|unique:users,phone,' . $id,
            'birth_place' => 'required',
            'birth_day' => 'required',
            'domisili' => 'required',
            'chapter_id' => 'required',
        ]);
        $input = $request->all();
        $input = $request->except(['_token', '_method']);
        User::where('id', $id)->update($input);
        return redirect()->route('master_member.index')->with('success', 'Data berhasil dirubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        User::where('id', $id)->delete();
        Session::flash('success', 'Data Berhasil Dihapus!');
        return response()->json([
            'success' => true,
            'data'    => $id
        ]);
    }
}
