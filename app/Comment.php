<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Comment
 *
 * @package App
 */
class Comment extends Model
{
    /**
	 * Mass-assign fields for the database. 
	 *
	 * @return array
	 */
	protected $fillable = ['user_id', 'comment'];

    /**
     * Creator information relation.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
	public function author()
    {
        return $this->belongsTo(User::class);
    }
}
