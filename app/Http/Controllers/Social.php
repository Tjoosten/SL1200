<?php

namespace App\Http\Controllers;

use App\Notifications\NewFollower;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;

/**
 * Class Social
 *
 * @package App\Http\Controllers
 */
class Social extends Controller
{
    /**
     * Social constructor.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('lang');
        $this->middleware('auth');
    }

    /**
     * Follow the given user.
     *
     * @param  int $userId The user id in the database.
     * @return \Illuminate\Http\RedirectResponse
     */
    public function follow($userId)
    {
        // TODO: check is authencated user is not the same them param user.

        $user   = auth()->user();
        $dbUser = User::find($userId);

        if ($dbUser->followers()->attach($user->id)) { // Authencated user >>> followed given user.
            session()->flash('class', 'alert-success');
            session()->flash('message', trans('social.user-follow'));
        }

        $dbUser->notify(new NewFollower($user));
        return back();
    }

    /**
     * Unfollow the given user.
     *
     * @param  int $userId The user id in the database.
     * @return \Illuminate\Http\RedirectResponse
     */
    public function unfollow($userId)
    {
        $user   = auth()->user();
        $dbUser = User::find($userId);

        if ($dbUser->followers()->detach($user->id)) {
            session()->flash('class', 'alert-success');
            session()->flash('message', trans('social.user-unfollow'));
        }

        return back();
    }

    /**
     * Block u user on the account.
     *
     * @param  int $userId The user id in the database.
     * @return \Illuminate\Http\RedirectResponse
     */
    public function blockUser($userId)
    {
        return back();
    }

    /**
     * Unblock a user on the account.
     *
     * @param  int $userId The user id in the database.
     * @return \Illuminate\Http\RedirectResponse
     */
    public function unblockUser($userId)
    {
        return back();
    }
}
