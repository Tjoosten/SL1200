<?php

namespace App\Http\Controllers;

use App\Manifest;
use App\Http\Requests\PetitionValidation;
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
        // $this->middleware('auth')->only();
    }

    /**
     * Create view for a new petition.
     *
     * @return
     */
    public function create()
    {
		$data['title'] = trans('petition.title-create');
		return view('petitions.create', $data);
    }

    /**
     * Index method for the petition. Here can user browse through petitions.
     *
     * @return
     */
	public function browse()
	{
        $data['title'] = trans();
		$data['petitions'] = Manifest::paginate(7);
		$data['recent']    = '';

        return view('petitions.index', $data);
	}

    /**
     * The search view for the petitions.
	 *
     * @return
     */
    public function searchView()
    {
        $data['title'] = trans();

        return view('', $data);
    }

    /**
	 * Store a new petition in the system.
	 *
	 * @param  PetitionValidation $input  The user input.
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(PetitionValidation $input)
    {
        $db['petition']   = Manifest::created($input->except(['_token', 'category']));
        $db['category']   = Category::findOrCreate($input->get('category'));
        $db['categories'] = Manifest::find($db['petition']->id)->categories()->sync($db['category']->id);

        if ($db['petition'] && $db['categories'] && $db['category']) {
            // Petition create         >>> OK
            // Create of find category >>> OK
            // Set petition categories >>> OK

            session()->flash('class', 'alert-success');
            session()->flash('message', trans('petition.create'));
        }

        return back();
    }

    /**
     * Edit a petition in the system.
     *
     * @param int $petitionId The petition id in the database.
     * @return
     */
    public function edit($petitionId)
    {
		$data['petition'] = Manifest::find($petitionId);
		$data['title']    = trans();

        return view('petition.edit', $data);
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
     * @param  int $petitionId The petition id in the database.
     * @return
     */
    public function show($petitionId)
    {
        $data['petition'] = Manifest::with(['author', 'categories', 'comments'])->find($petitionId);

        if (! $data['petition'] == null) {
            $data['title'] = trans('petition.title-show', ['petition-name' => $data['petition']->title]);

            return view('petitions.show', $data);
        }

        app()->abort(404);
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
