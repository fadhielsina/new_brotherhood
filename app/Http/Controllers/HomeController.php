<?php

namespace App\Http\Controllers;

use App\Models\Activity;
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
        $data['jumlah_activity'] = Activity::where('status', 1)->orderBy('start_date', 'ASC')->limit(5)->get();
        $data['news_activity'] = Activity::where('status', 1)->orderBy('start_date', 'ASC')->first();
        $data['status_checkin'] = 0;

        $current = date('Y-m-d H:i');
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

    public function checkin_submit()
    {
        $img = $_POST['image'];
        $folderPath = "upload/";

        $image_parts = explode(";base64,", $img);
        $image_type_aux = explode("image/", $image_parts[0]);
        $image_type = $image_type_aux[1];

        $image_base64 = base64_decode($image_parts[1]);
        $fileName = uniqid() . '.png';

        $file = $folderPath . $fileName;
        file_put_contents($file, $image_base64);

        print_r($fileName);
    }
}
