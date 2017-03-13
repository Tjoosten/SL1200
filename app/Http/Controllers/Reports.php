<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Reports extends Controller
{
    /**
     * Reports constructor.
     *
     * @return void.
     */
    public function __construct()
    {
        $this->middleware('lang');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $data['title']    = trans();
        $data['users']    = ''; // TODO: Build up the query
        $data['comments'] = ''; // TODO: Build up the query.

        return view();
    }
}
