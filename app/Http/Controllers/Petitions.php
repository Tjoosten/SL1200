<?php

namespace App\Http\Controllers;

use App\Manifest;
use Illuminate\Http\Request;

class Petitions extends Controller
{
    /**
     * Petitions constructor.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->only();
    }

    /**
     * Create view for a new petition.
     *
     * @return
     */
    public function create()
    {
		$data['title'] = trans('petition.title-create');
		return view();
    }

    /**
     * Index method for the petition. Here can user browse through petitions.
     *
     * @return
     */
	public function browse(Request $request)
	{
        $data['title'] = trans();

        return view('', $data);
	}

    /**
     *
     *
     */
    public function searchView()
    {
        $data['title'] = trans();

        return view('', $data);
    }

    /**
     * Store a new petition in the system.
     *
     * @param
     * @param
     * @return
     */
    public function store(PetitionValidation $input, $petitionId)
    {
        return back();
    }

    /**
     * Edit a petition in the system.
     *
     * @param
     * @return
     */
    public function edit($petitionId)
    {
		$data['title'] = trans();
        return view();
    }

    /**
     * Update a petition in the system.
	 *
     * @param  int					$petitionId  The petition database id.
     * @param  PetitionValidation   $input       The user input.
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(PetitionValidation $input, $petitionId)
    {
		$db['petition'] = Manifest::find($petitionId);

		if ((int) auth()->user()->id === $db['petition']->creator_id) { // Authencated user >>> creator.
			if ($db['petition']->update($input->except('_token'))) {
				session()->flash('class', 'alert-success');
				session()->flash('message', trans('petition.update'));
			}
		}

		return back();
    }

    /**
     * Show a specific petition in the system.
     *
     * @param
     * @return
     */
    public function show($id)
    {
        $data['petition'] = Manifest::find($id);
        $data['title']    = trans('petition.title-show', ['petition-name' => $data['petition']->title]);

        return view();
    }

    /**
     * Set the status for the petition.
     *
     * @param  int $petitionId  The Petition ID in the database.
     * @param  int $status      The status id for the petition.
     * @return \Illuminate\Http\RedirectResponse
     */
    public function closeOpen($petitionId, $status)
    {
        $db['petition'] = Manifest::find($id);

        if ((int) auth()->user()->id === $db['petition']->creator_id) { // Authencated user >>> creator.
            if ((int) $status === 0) { // Close petition
                $db['petition']->update(['is_open' => $status]);

                $class   = 'alert-success';
                $message = trans('petition.status-close');
            } elseif ((int) $status === 1) { // Reopen the petition
                $db['petition']->update(['is_open' => $status]);

                $class   = 'alert-success';
                $message = trans('petition.status-open');
            } else {
                $class   = 'alert alert-info';
                $message = trans('petition.status-unknown');
            }
        }

        $class   = 'alert-danger';
        $message = trans('petition.wrong-author');

        session()->flash('class', $class);
        session()->flash('message', $message);

        return back();
    }

    /**
     * Delete a petition in the system.
     *
     * @param  int $petitionId The petition id in the database.
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete($petitionId)
    {
        if (Manifest::find($id)->delete()) {
            session()->flash('class', 'alert-success');
            session()->flash('message', trans('petition.delete'));
        }

        return back();
    }
}
