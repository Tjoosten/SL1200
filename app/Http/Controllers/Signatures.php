<?php

namespace App\Http\Controllers;

use App\Http\Requests\SignatureValidation;
use App\User;
use Illuminate\Http\Request;

/**
 * Class Signatures
 *
 * @package App\Http\Controllers
 */
class Signatures extends Controller
{
    /**
     * Signatures constructor.
     *
     * @return void.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Sign a petition.
     *
     * @param  int $petitionId  The petition ind in the database.
     * @param  SignatureValidation $input
     * @return \Illuminate\Http\RedirectResponse
     */
    public function sign(SignatureValidation $input, $petitionId)
    {
        return back();
    }

    /**
     * Export the siçgnatures for a petition to a external file.
     *
     * @param  int $petitionId The petition id in the database.
     * @return \Illuminate\Http\RedirectResponse
     */
    public function export($petitionId)
    {
        return back();
    }
}
