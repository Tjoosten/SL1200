<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrganizationValidation;
use App\Organization;
use App\User;
use Illuminate\Http\Request;

/**
 * Class Organizations
 *
 * @package App\Http\Controllers
 */
class Organizations extends Controller
{
    /**
     * Organizations constructor.
     */
    public function __construct()
    {
        $this->middleware('lang');
    }

    /**
     * Create view for a new organization in the system.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $data['title'] = '';
        return view('organisation.create', $data);
    }

    /**
     * Invite method for the user.
     *
     * @param  int $userId The user id in the database.
     * @return \Illuminate\Http\RedirectResponse
     */
    public function sendInvite($userId)
    {
        $db['user'] = User::find($userId);

        if ((int) count($db['user']) === 1) {

            // Complete with flash session.
            session()->flash('class', 'alert-success');
            session()->flash('message', trans());
        }

        return back();
    }

    /**
     * Display the envite page for a user invite in a organization.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function invite()
    {
        $data['title'] = '';
        return view();
    }

    /**
     * Create the organization in the system.
     *
     * @param  OrganizationValidation $input
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(OrganizationValidation $input)
    {
        $userId = auth()->user()->id;

        $db['create'] = Organization::create($input->except(['_token']));
        $db['assign'] = Organization::find($db['create']->id)->members()->attach($userId);

        if ($db['create'] && $db['assign']) { // Organization >>> created.
            session()->flash('class', 'alert-success');
            session()->flash('message', trans('organization.create'));
        }

        return back();
    }
}
