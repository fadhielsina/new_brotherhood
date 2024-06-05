<?php

namespace App\Http\Controllers;

use App\Models\CmsAbout;
use App\Models\CmsElPresidente;
use App\Models\CmsHome;
use Dotenv\Util\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class CmsController extends Controller
{
    public function index()
    {
        $data = CmsHome::get();
        return view('admin/cms/home', compact('data'));
    }

    public function home_form()
    {
        return view('admin/cms/form_home');
    }

    public function home_submit(Request $request)
    {
        $request->validate([
            'section_title' => 'required',
            'section_body' => 'required',
            'section_title_dua' => 'required',
            'section_body_dua' => 'required',
            'section_title_tiga' => 'required',
            'section_body_tiga' => 'required',
            'section_img' => 'required',
            'section_img_dua' => 'required',
            'section_img_tiga' => 'required',
            'section_img_tiga_satu' => 'required',
        ]);

        $file = $request->file('section_img');
        $filename1 = 'section_img_' . date('YMdHis') . '.' . $file->getClientOriginalExtension();
        $path = 'front/home/' . $filename1;
        Storage::disk('public')->put($path, file_get_contents($file));

        $file = $request->file('section_img_dua');
        $filename2 = 'section_img_dua' . date('YMdHis') . '.' . $file->getClientOriginalExtension();
        $path = 'front/home/' . $filename2;
        Storage::disk('public')->put($path, file_get_contents($file));

        $file = $request->file('section_img_tiga');
        $filename3 = 'section_img_tiga' . date('YMdHis') . '.' . $file->getClientOriginalExtension();
        $path = 'front/home/' . $filename3;
        Storage::disk('public')->put($path, file_get_contents($file));

        $file = $request->file('section_img_tiga_satu');
        $filename31 = 'section_img_tiga_satu' . date('YMdHis') . '.' . $file->getClientOriginalExtension();
        $path = 'front/home/' . $filename31;
        Storage::disk('public')->put($path, file_get_contents($file));

        $file = $request->file('section_img_tiga_dua');
        $filename32 = 'section_img_tiga_dua' . date('YMdHis') . '.' . $file->getClientOriginalExtension();
        $path = 'front/home/' . $filename32;
        Storage::disk('public')->put($path, file_get_contents($file));

        $data = [
            'user_id' => Auth::user()->id,
            'section_title' => $request->section_title,
            'section_body' => $request->section_body,
            'section_title_dua' => $request->section_title_dua,
            'section_body_dua' => $request->section_body_dua,
            'section_title_tiga' => $request->section_title_tiga,
            'section_body_tiga' => $request->section_body_tiga,
            'section_img' => $filename1,
            'section_img_dua' => $filename2,
            'section_img_tiga' => $filename3,
            'section_img_tiga_satu' => $filename31,
            'section_img_tiga_dua' => $filename32,
        ];
        CmsHome::create($data);
        return redirect()->route('landing_page.home')->with('success', 'Data berhasil ditambah');
    }

    public function home_edit(string $id)
    {
        dd($id);
    }

    public function home_store(string $id)
    {
        dd($id);
    }
    // ===================================================== ABOUT US =====================================================
    public function about_us()
    {
        $data = CmsAbout::get();
        return view('admin/cms/about', compact('data'));
    }

    public function about_form()
    {
        return view('admin/cms/form_about');
    }

    public function about_submit(Request $request)
    {
        $request->validate([
            'section_title' => 'required',
            'section_body' => 'required',
            'section_title_dua' => 'required',
            'section_subtitle' => 'required',
            'section_subbody' => 'required',
            'section_subtitle_dua' => 'required',
            'section_subbody_dua' => 'required',
            'section_subtitle_tiga' => 'required',
            'section_subbody_tiga' => 'required',
            'section_subtitle_empat' => 'required',
            'section_subbody_empat' => 'required',
            'section_subtitle_lima' => 'required',
            'section_subbody_lima' => 'required',
            'section_img' => 'required',
        ]);

        $file = $request->file('section_img');
        $filename = 'section_img_' . date('YMdHis') . '.' . $file->getClientOriginalExtension();
        $path = 'front/about_us/' . $filename;
        Storage::disk('public')->put($path, file_get_contents($file));

        $data = [
            'user_id' => Auth::user()->id,
            'section_title' => $request->section_title,
            'section_body' => $request->section_body,
            'section_title_dua' => $request->section_title_dua,
            'section_subtitle' => $request->section_subtitle,
            'section_subbody' => $request->section_subbody,
            'section_subtitle_dua' => $request->section_subtitle_dua,
            'section_subbody_dua' => $request->section_subbody_dua,
            'section_subtitle_tiga' => $request->section_subtitle_tiga,
            'section_subbody_tiga' => $request->section_subbody_tiga,
            'section_subtitle_empat' => $request->section_subtitle_empat,
            'section_subbody_empat' => $request->section_subbody_empat,
            'section_subtitle_lima' => $request->section_subtitle_lima,
            'section_subbody_lima' => $request->section_subbody_lima,
            'section_img' => $filename,
        ];

        CmsAbout::create($data);
        return redirect()->route('landing_page.about_us')->with('success', 'Data berhasil ditambah');
    }
    // ===================================================== El Presidente =====================================================
    public function el_presidente()
    {
        $data = CmsElPresidente::get();
        return view('admin/cms/presidente', compact('data'));
    }

    public function el_presidente_form()
    {
        return view('admin/cms/form_presidente');
    }

    public function el_presidente_submit(Request $request)
    {
        $request->validate([
            'section_body' => 'required',
            'section_img' => 'required',
        ]);

        $file = $request->file('section_img');
        $filename = 'section_img_' . date('YMdHis') . '.' . $file->getClientOriginalExtension();
        $path = 'front/el_presidente/' . $filename;
        Storage::disk('public')->put($path, file_get_contents($file));

        $data = [
            'user_id' => Auth::user()->id,
            'section_body' => $request->section_body,
            'section_img' => $filename,
        ];

        CmsElPresidente::create($data);
        return redirect()->route('landing_page.presidente')->with('success', 'Data berhasil ditambah');
    }

    // ===================================================== One Program =====================================================

    public function one_program()
    {
        return view('front/1-program');
    }
    public function for_faith()
    {
        return view('front/for-faith');
    }
    public function for_nature()
    {
        return view('front/for-nature');
    }
    public function for_indonesia_culture()
    {
        return view('front/for-indonesia-culture');
    }
    public function for_children_care()
    {
        return view('front/for-children-care');
    }
    public function for_rescue_and_disaster()
    {
        return view('front/for-rescue-and-disaster');
    }
    public function support22()
    {
        return view('front/support22');
    }
    public function our_chapter()
    {
        return view('front/our-chapter');
    }
    public function blog()
    {
        return view('front/blog');
    }
}
