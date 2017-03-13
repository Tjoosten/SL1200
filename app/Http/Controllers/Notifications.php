<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Notifications\DatabaseNotification;

/**
 * Class Notifications
 *
 * @package App\Http\Controllers
 */
class Notifications extends Controller
{
    /**
     * Notifications constructor.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Get the notifications index for the user.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $data['title'] = trans('account.title-notifications');
        return view('notifications.index');
    }

    /**
     * Set one notification as read.
     *
     * @param  string $notificationId The ID for the notification in the database.
     * @return \Illuminate\Http\RedirectResponse
     */
    public function markOne($notificationId)
    {
        $notification = DatabaseNotification::find($notificationId);
        $status       = $notification->update(['read_at' => Carbon::now()]) ? true : false;

        switch($status) {
            case true:
                session()->flash('class', 'alert-success');
                session()->flash('message', trans('notifications.mark-one-success'));
                break;
            case false:
                session()->flash('class', 'alert-danger');
                session()->flash('message', trans('notifications.mark-one-fails'));
                break;
        }

        return back();
    }

    /**
     * Set all the unread notifications as read.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function markAll()
    {
        $user = auth()->user();
        $user->unreadNotifications->markAsRead();

        return back();
    }
}
