<?php

namespace App\Http\Controllers;

use App\Http\Requests\AccountValidation;
use Illuminate\Http\Request;

/**
 * Class Account
 *
 * @package App\Http\Controllers
 */
class Account extends Controller
{
    /**
     * Account constructor.
     *
     * @return void
     */
    public function __construct()
    {

    }

    public function index()
    {

    }

    /**
     * Confirm the account close.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function close()
    {
        return view();
    }

    /**
     * Confirm the account closing.
     */
    public function confirmClose()
    {

    }

    /**
     * Show the account information.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function accountSettings()
    {
        $data['title'] = trans('account.title-settings');

        return view();
    }

    /**
     * Store the new account information.
     *
     * @param  AccountValidation $input
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(AccountValidation $input)
    {
        return back();
    }
}
