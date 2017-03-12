<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Categories extends Controller
{
    /**
     * Categories constructor.
     *
     * @return voind|null
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the petitions for a specific category
     *
     * @param
     * @return
     */
    public function show($selector)
    {
        $data['title'] = trans('', ['category' => $selector])

        return view('', $data);
    }

    /**
     * Delete a category in the database.
     *
     * @param   int $categoryId
     * @return
     */
    public function destroy($categoryId)
    {
        $db['category'] = Category::find($categoryId);

        if ($db['category']->delete()) {
            session()->flash('class', 'alert alert-success');
            session()->flash('message', trans('category.delete'));
        }

        return back();
    }
}
