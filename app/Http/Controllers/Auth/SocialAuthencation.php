<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Socialite;

/**
 * Class SocialAuthencation
 *
 * @package App\Http\Controllers
 */
class SocialAuthencation extends Controller
{
    /**
     * @var Socialite $auth
     */
    private $auth;

    /**
     * SocialAuthencation constructor.
     *
     * @return void
     */
    public function __construct(Socialite $auth)
    {
        $this->auth = $auth;
    }

    /**
     * Redirect the user to the authentication page.
     *
     * @param  String  $provider  The social authencation provider.
     * @return Response
     */
    public function redirectToProvider($provider)
    {
        return $this->auth->driver($provider)->redirect();
    }

    /**
     * Obtain the user information from Social authencation provider.
     *
     * @param  String  $provider  The social authencation provider.
     * @return Response
     */
    public function handleProviderCallback()
    {
        $user = $this->auth->driver($provider)->user();

        dd($user);
    }
}
