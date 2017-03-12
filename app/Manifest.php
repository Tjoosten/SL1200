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
    protected $fillable = [];

    /**
	 * Get the user information for the petition creator. 
	 *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
	public function author() 
	{
		return $this->belongsTo();
	}

	public function categories() 
	{
	}

    /**
	 * Comments relation for the petition. 
	 *
     * @return mixed
     */
	public function comments() 
	{
		return $this->belongsToMany()
			->withTimstamps(); 
	}
}
