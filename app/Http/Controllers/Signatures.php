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
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * @param SignatureValidation $input
     */
    public function sign(SignatureValidation $input)
    {

    }
}
