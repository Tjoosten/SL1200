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
		$this->middleware('auth');
        $this->middleware('forbid-banned-user')->except(['store']);
    }

    /**
     * Get the account information index.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $data['title'] = trans('account.title-index');

        return view('', $data);
    }

    /**
     * Confirm the account close.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function close()
    {
        $data['title'] = trans('account.title-delete');

        return view('', $data);
    }

    /**
     * Confirm the account closing.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function confirmClose()
    {
        if (User::find(auth()->user()->id)->delete()) { // Account >>> Deleted.
            auth()->logout();

            session()->flash('class', 'alert-success');
            session()->flash('message', trans('account.delete'));
        }

        return back();
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
