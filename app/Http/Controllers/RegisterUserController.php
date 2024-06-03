<?php

namespace App\Http\Controllers;

use App\Models\MasterChapter;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Storage;

class RegisterUserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $role = Role::where('id', '!=', 1)->get();
        $chapter = MasterChapter::where('id', '!=', 1)->get();
        return view('register', compact('role', 'chapter'));
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
            'repassword' => 'required|same:password'
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
            'password' => bcrypt($request->password),
            'avatar' => $filename,
            'status' => 0
        ];
        $user = User::create($data);
        $user->assignRole($role);

        return redirect()->route('login')->with('success', 'Data berhasil ditambah, silahkan tunggu email verifikasi dari admin.');
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
        //
    }
}
