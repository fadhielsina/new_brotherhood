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
        $id_user = Auth::user()->id;
        $role = Auth::user()->roles->pluck('id');
        if ($role[0] == 1) :
            $data = CmsHome::get();
        else :
            $data = CmsHome::where('user_id', $id_user);
        endif;
        return view('cms/home', compact('data'));
    }

    public function home_form()
    {
        $form = 'add';
        return view('cms/form_home', compact('form'));
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
        $form = 'edit';
        $data = CmsHome::find($id)->first();
        return view('cms/form_home', compact('form', 'data'));
    }

    public function home_update(Request $request, string $id)
    {

        $request->validate([
            'section_title' => 'required',
            'section_body' => 'required',
            'section_title_dua' => 'required',
            'section_body_dua' => 'required',
            'section_title_tiga' => 'required',
            'section_body_tiga' => 'required',
        ]);

        $data = [
            'user_id' => Auth::user()->id,
            'section_title' => $request->section_title,
            'section_body' => $request->section_body,
            'section_title_dua' => $request->section_title_dua,
            'section_body_dua' => $request->section_body_dua,
            'section_title_tiga' => $request->section_title_tiga,
            'section_body_tiga' => $request->section_body_tiga,
        ];

        if ($request->file('section_img')) :
            $file = $request->file('section_img');
            $filename1 = 'section_img_' . date('YMdHis') . '.' . $file->getClientOriginalExtension();
            $path = 'front/home/' . $filename1;
            Storage::disk('public')->put($path, file_get_contents($file));
            $data['section_img'] = $filename1;
        endif;

        if ($request->file('section_img_dua')) :
            $file = $request->file('section_img_dua');
            $filename2 = 'section_img_dua' . date('YMdHis') . '.' . $file->getClientOriginalExtension();
            $path = 'front/home/' . $filename2;
            Storage::disk('public')->put($path, file_get_contents($file));
            $data['section_img_dua'] = $filename2;
        endif;

        if ($request->file('section_img_tiga')) :
            $file = $request->file('section_img_tiga');
            $filename3 = 'section_img_tiga' . date('YMdHis') . '.' . $file->getClientOriginalExtension();
            $path = 'front/home/' . $filename3;
            Storage::disk('public')->put($path, file_get_contents($file));
            $data['section_img_tiga'] = $filename3;
        endif;

        if ($request->file('section_img_tiga_satu')) :
            $file = $request->file('section_img_tiga_satu');
            $filename31 = 'section_img_tiga_satu' . date('YMdHis') . '.' . $file->getClientOriginalExtension();
            $path = 'front/home/' . $filename31;
            Storage::disk('public')->put($path, file_get_contents($file));
            $data['section_img_tiga_satu'] = $filename31;
        endif;

        if ($request->file('section_img_tiga_dua')) :
            $file = $request->file('section_img_tiga_dua');
            $filename32 = 'section_img_tiga_dua' . date('YMdHis') . '.' . $file->getClientOriginalExtension();
            $path = 'front/home/' . $filename32;
            Storage::disk('public')->put($path, file_get_contents($file));
            $data['section_img_tiga_dua'] = $filename32;
        endif;

        CmsHome::where('id', $id)->update($data);
        return redirect()->route('landing_page.home')->with('success', 'Data berhasil ditambah');
    }

    public function home_posting(string $id)
    {
        CmsHome::where('status', 1)->update(["status" => 0]);
        CmsHome::where('id', $id)->update(["status" => 1]);
        return redirect()->route('landing_page.home')->with('success', 'Data berhasil di publish');
    }

    public function home_destroy(string $id)
    {
        $cek_status = CmsHome::find($id)->first();
        if ($cek_status->status == 1) :
            return redirect()->route('landing_page.home')->with('error', 'Data yang sedang aktif tidak bisa dihapus');
        else :
            return redirect()->route('landing_page.home')->with('success', 'Data berhasil dihapus');
        endif;
    }

    // ===================================================== ABOUT US =====================================================
    public function about_us()
    {
        $id_user = Auth::user()->id;
        $role = Auth::user()->roles->pluck('id');
        if ($role[0] == 1) :
            $data = CmsAbout::get();
        else :
            $data = CmsAbout::where('user_id', $id_user);
        endif;
        return view('cms/about', compact('data'));
    }

    public function about_form()
    {
        $form = 'edit';
        return view('cms/form_about', compact('form'));
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

    public function about_edit(string $id)
    {
        $form = 'edit';
        $data = CmsAbout::find($id)->first();
        return view('cms/form_about', compact('form', 'data'));
    }

    public function about_update(Request $request, string $id)
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
        ]);

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
        ];

        if ($request->file('section_img')) :
            $file = $request->file('section_img');
            $filename1 = 'section_img_' . date('YMdHis') . '.' . $file->getClientOriginalExtension();
            $path = 'front/about_us/' . $filename1;
            Storage::disk('public')->put($path, file_get_contents($file));
            $data['section_img'] = $filename1;
        endif;

        CmsAbout::where('id', $id)->update($data);
        return redirect()->route('landing_page.about_us')->with('success', 'Data berhasil ditambah');
    }

    public function about_destroy(string $id)
    {
        $cek_status = CmsAbout::find($id)->first();
        if ($cek_status->status == 1) :
            return redirect()->route('landing_page.about_us')->with('error', 'Data yang sedang aktif tidak bisa dihapus');
        else :
            return redirect()->route('landing_page.about_us')->with('success', 'Data berhasil dihapus');
        endif;
    }

    public function about_posting(string $id)
    {
        CmsAbout::where('status', 1)->update(["status" => 0]);
        CmsAbout::where('id', $id)->update(["status" => 1]);
        return redirect()->route('landing_page.about_us')->with('success', 'Data berhasil di publish');
    }

    // ===================================================== El Presidente =====================================================
    public function presidente()
    {
        $id_user = Auth::user()->id;
        $role = Auth::user()->roles->pluck('id');
        if ($role[0] == 1) :
            $data = CmsElPresidente::get();
        else :
            $data = CmsElPresidente::where('user_id', $id_user);
        endif;
        return view('cms/presidente', compact('data'));
    }

    public function presidente_form()
    {
        $form = 'add';
        return view('cms/form_presidente', compact('form'));
    }

    public function presidente_submit(Request $request)
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

    public function presidente_edit(string $id)
    {
        $form = 'edit';
        $data = CmsElPresidente::find($id)->first();
        return view('cms/form_presidente', compact('form', 'data'));
    }

    public function presidente_update(Request $request, string $id)
    {
        $request->validate([
            'section_body' => 'required',
        ]);

        $data = [
            'user_id' => Auth::user()->id,
            'section_body' => $request->section_body,
        ];

        if ($request->file('section_img')) :
            $file = $request->file('section_img');
            $filename = 'section_img_' . date('YMdHis') . '.' . $file->getClientOriginalExtension();
            $path = 'front/el_presidente/' . $filename;
            Storage::disk('public')->put($path, file_get_contents($file));
            $data['section_img'] = $filename;
        endif;

        CmsElPresidente::where('id', $id)->update($data);
        return redirect()->route('landing_page.presidente')->with('success', 'Data berhasil ditambah');
    }

    public function presidente_destroy(string $id)
    {
        $cek_status = CmsElPresidente::find($id)->first();
        if ($cek_status->status == 1) :
            return redirect()->route('landing_page.presidente')->with('error', 'Data yang sedang aktif tidak bisa dihapus');
        else :
            return redirect()->route('landing_page.presidente')->with('success', 'Data berhasil dihapus');
        endif;
    }

    public function presidente_posting(string $id)
    {
        CmsElPresidente::where('status', 1)->update(["status" => 0]);
        CmsElPresidente::where('id', $id)->update(["status" => 1]);
        return redirect()->route('landing_page.about_us')->with('success', 'Data berhasil di publish');
    }

    // ===================================================== One Program =====================================================

    public function one_program()
    {
        return view('front/1-program');
    }

    // ===================================================== For Faith =====================================================
    public function for_faith()
    {
        return view('front/for-faith');
    }

    // ===================================================== For Nature =====================================================
    public function for_nature()
    {
        return view('front/for-nature');
    }

    // ===================================================== For Indonesia Culture =====================================================
    public function for_indonesia_culture()
    {
        return view('front/for-indonesia-culture');
    }

    // ===================================================== For Children Care =====================================================
    public function for_children_care()
    {
        return view('front/for-children-care');
    }

    // ===================================================== For Rescue =====================================================
    public function for_rescue_and_disaster()
    {
        return view('front/for-rescue-and-disaster');
    }

    // ===================================================== Support22 =====================================================
    public function support22()
    {
        return view('front/support22');
    }

    // ===================================================== Our Chapter =====================================================
    public function our_chapter()
    {
        return view('front/our-chapter');
    }

    // ===================================================== Blog =====================================================
    public function blog()
    {
        return view('front/blog');
    }
}
