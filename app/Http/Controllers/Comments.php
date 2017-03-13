<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Http\Requests\CommentValidation;
use App\Http\Requests\ReportValidation;
use App\Manifest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

/**
 * Class Comments
 *
 * @package App\Http\Controllers
 */
class Comments extends Controller
{
    /**
     * Comments constructor.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Create a new comment in the database.
     *
     * @param  CommentValidation $input
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(CommentValidation $input)
    {
        $db['comment']  = Comment::create($input->except('_token'));
        $db['relation'] = Manifest::find($input->get('petition'))->comments()->attach($db['comment']);

        if ($db['comment'] && $db['relation']) { // Comment created
            session()->flash('class', 'alert-success');
            session()->flash('message', trans('comment.create'));
        }

        return back();
    }

    /**
     * Report a comment.
     *
     * @param  ReportValidation $input
     * @return \Illuminate\Http\RedirectResponse
     */
    public function report(ReportValidation $input)
    {
        return back();
    }

    /**
     * Delete a comment in the system.
     *
     * @param  int $id The comment id in the database.
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete($id, $petitionId)
    {
		$db['comment'] = Comment::find($id);
		$db['sync']    = $db['comment']->petition()->sync([]);

        if ((int) auth()->user()->id === (int) $db['comment']->user_id) {
			if ($db['comment']->delete() && $db['sync']) { // Comment >>> deleted
				session()->flash('class', 'alert-success');
				session()->flash('message', trans('comment.delete'));
			}
		}

        return Redirect::route('petition.show', ['id' => $petitionId]);
    }
}
