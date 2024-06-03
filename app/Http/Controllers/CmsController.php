<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CmsController extends Controller
{
    public function index()
    {
        return view('front/index');
    }
    public function about_us()
    {
        return view('front/about-us');
    }
    public function el_presidente()
    {
        return view('front/el-presidente');
    }
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
