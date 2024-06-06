<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\MasterChapter;
use App\Models\MasterProgram;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

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
        $current = date('Y-m-d H:i:00');

        if ($status != 1) :
            Auth::logout();
            return redirect()->route('login')->with('success', 'Akun anda belum terverfikasi, silahkan tunggu email verifikasi dari admin.');
        endif;

        $data['jumlah_member'] = User::where('status', 1)->count();
        $data['jumlah_chapter'] = MasterChapter::count();
        $data['jumlah_program'] = MasterProgram::count();
        $data['jumlah_activity'] = Activity::where('status', 1)->orderBy('start_date', 'ASC')->limit(5)->get();
        $data['news_activity'] = Activity::where('status', 1)->where('start_date', '>=', $current)->orderBy('start_date', 'ASC')->first();
        $data['status_checkin'] = 0;

        $start_activity = date("Y-m-d H:i", strtotime($data['news_activity']->start_date));
        $end_activity = date("Y-m-d H:i", strtotime($data['news_activity']->end_date));

        if (($current >= $start_activity) && ($current <= $end_activity)) :
            $data['status_checkin'] = 1;
        endif;
        return view('home', compact('data'));
    }

    public function checkin()
    {
        return view('form_checkin');
    }

    public function checkin_submit(Request $request)
    {

        $base64str = $request->image;
        $image = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $base64str));
        $filename = uniqid() . '.jpeg';

        $path = 'attendance/' . $filename;
        Storage::disk('public')->put($path, $image);

        dd('masuk');
    }
}
