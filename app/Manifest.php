<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Manifest extends Model
{
	/**
	 * Mass-assign fields for the database. 
	 *
	 * @return array
	 */
    protected $fillable = ['title', 'description'];

    /**
	 * Get the user information for the petition creator.
	 *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
	public function author()
	{
		return $this->belongsTo(User::class, 'user_id');
	}

    /**
     * Display the categories for a petition.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
	public function categories()
	{
	    return $this->belongsToMany(Category::class)
            ->withTimestamps();
	}

    /**
	 * Comments relation for the petition.
	 *
     * @return mixed
     */
	public function comments()
	{
		return $this->belongsToMany(Comment::class)
			->withTimestamps();
	}
}
