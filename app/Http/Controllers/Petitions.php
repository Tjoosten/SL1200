<?php

namespace App\Http\Controllers;

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
        $this->middleware('auth')->only()
    }

    /**
     * Create view for a new petition.
     *
     * @return 
     */
    public function create()
    {

    }

    public function store(PetitionValidation $input, $id)
    {

    }

    /**
     * Edit a petition in the system.
     *
     * @param
     * @return
     */
    public function edit($id)
    {
        return view();
    }

    /**
     *
     * @param
     * @param
     * @return
     */
    public function update(PetitionValidation $input, $id)
    {

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
