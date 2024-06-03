<?php

namespace App\Http\Controllers;

use App\Models\MasterChapter;
use App\Models\MasterProgram;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $status = Auth::user()->status;
        if ($status != 1) :
            Auth::logout();
            return redirect()->route('login')->with('success', 'Akun anda belum terverfikasi, silahkan tunggu email verifikasi dari admin.');
        endif;
        $data['jumlah_member'] = User::where('status', 1)->count();
        $data['jumlah_chapter'] = MasterChapter::count();
        $data['jumlah_program'] = MasterProgram::count();
        return view('home', compact('data'));
    }
}
