<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Http\Requests\CommentValidation;
use Illuminate\Http\Request;

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

    }

    /**
     * Create a new comment in the database.
     *
     * @param  CommentValidation $input
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(CommentValidation $input)
    {
        if (Comment::create($input->except('_token'))) { // Comment created
            session()->flash('class', 'alert-success');
            session()->flash('message', trans('comment.create'));
        }

        return back();
    }

    /**
     * Report a comment.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function report()
    {
        return back();
    }

    /**
     * Delete a comment in the system.
     *
     * @param  int $id The comment id in the database.
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete($id)
    {
        if (Comment::find($id)->delete()) { // Comment >>> deleted
            session()->flash('class', 'alert-success');
            session()->flash('message', trans('comment.delete'));
        }

        return back();
    }
}
