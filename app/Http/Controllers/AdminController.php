<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::with('song', 'video')->get();

        // '<a href="''" download><span class="glyphicon glyphicon-search" aria-hidden="true"></span></a>'

        $orderedUsers = [];
        foreach ($users as $user) {
            $orderedUsers[] = [
                'name' => $user->firstname.' '.$user->lastname,
                'artist' => $user->artist,
                'location' => $user->location,
                'code' => $user->code,
                'song' => isset($user->song) ? $user->song->path : '',
                'video' => isset($user->video) ? $user->video->path : '',
            ];
        }

        return view('admin.index')->with([
            'users' => $orderedUsers
        ]);
    }
}
