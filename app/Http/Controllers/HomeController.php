<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth')->only('index');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $data['title'] = trans('home.title-index');
        return view('home');
    }

    /**
     * Show the project disclaimer;
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function disclaimer()
    {
        $data['title'] = trans('disclaimer.title-disclaimer');
        return view('disclaimer', $data);
    }
}
