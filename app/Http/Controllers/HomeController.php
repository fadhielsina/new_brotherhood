<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\Attendance;
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
        $id_user = Auth::user()->id;
        $status = Auth::user()->status;
        $current = date('Y-m-d H:i:s');

        if ($status != 1) :
            Auth::logout();
            return redirect()->route('login')->with('success', 'Akun anda belum terverfikasi, silahkan tunggu email verifikasi dari admin.');
        endif;

        $data['jumlah_member'] = User::where('status', 1)->count();
        $data['jumlah_chapter'] = MasterChapter::count();
        $data['jumlah_program'] = MasterProgram::count();
        $data['jumlah_activity'] = Activity::where('status', 1)->orderBy('start_date', 'ASC')->limit(5)->get();
        $data['news_activity'] = Activity::where('status', 1)->where('end_date', '>=', $current)->orderBy('start_date', 'ASC')->limit(1)->get();
        $data['status_checkin'] = 0;
        // $data['attendance'] = Attendance::where('user_id', $id_user)->orderBy('checkin', 'DESC')->limit(1)->get();

        if ($data['news_activity']->isEmpty() === false) :
            $act_id = $data['news_activity'][0]->id;
            $attendance = Attendance::where('user_id', $id_user)->where('activity_id', $act_id)->get();
            if ($attendance->isEmpty() === true) :
                $start_activity = date("Y-m-d H:i:s", strtotime($data['news_activity'][0]->start_date));
                $end_activity = date("Y-m-d H:i:s", strtotime($data['news_activity'][0]->end_date));
                if (($start_activity <= $current) && ($end_activity >= $current)) :
                    $data['status_checkin'] = 1;
                endif;
            endif;

        endif;




        return view('home', compact('data'));
    }

    public function checkin($id)
    {
        $data = Activity::where('id', $id)->first();
        return view('form_checkin', compact('data'));
    }

    public function checkin_submit(Request $request)
    {
        $base64str = $request->image;
        $image = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $base64str));
        $filename = uniqid() . '.jpeg';

        $path = 'attendance/' . $filename;
        Storage::disk('public')->put($path, $image);

        $data = [
            'checkin' => date('Y-m-d H:i:s'),
            'picture' => $filename,
            'user_id' => $request->user_id,
            'activity_id' => $request->activity_id
        ];
        Attendance::create($data);
        return redirect()->route('home')->with('success', 'Checkin Berhasil');
    }

    public function profile()
    {
        $user = Auth::user();
        return view('profile', compact('user'));
    }

    public function profile_update(Request $request, string $id)
    {
        $request->validate([
            'repassword' => 'required|same:password'
        ]);

        $data = [
            'password' => bcrypt($request->password)
        ];

        User::where('id', $id)->update($data);
        return redirect()->route('home')->with('success', 'Data Berhasil Dirubah');
    }
}
