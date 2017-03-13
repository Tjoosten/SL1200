<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrganizationValidation;
use App\Organization;
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
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function invite()
    {
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
