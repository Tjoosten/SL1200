<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Organization
 *
 * @package App
 */
class Organization extends Model
{
    /**
     * Mass-assign fields for the database;
     *
     * @var array
     */
    protected $fillable = ['name', 'description'];

    /**
     * Get the organization members.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function members()
    {
        return $this->belongsToMany(User::class)
            ->withTimestamps();
    }
}
