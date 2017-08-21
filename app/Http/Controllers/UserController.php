<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreUser;
use App\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Http\Requests\StoreUser  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUser $request)
    {
        $user = User::where('email', $request->email)->first();

        if($user) {
            return response('That email address is already taken', 422);
        }

        $user = new User;
        $user->firstname = $request->firstname;
        $user->lastname = $request->lastname;
        $user->artist = $request->artist;
        $user->location = $request->location;
        $user->email = $request->email;
        $user->phone = $request->location;
        
        $code = str_random(10);
        $user->code = $code;

        $user->save();

        return response()->json([
            'code' => $code
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    /**
     * Match the token with the user.
     *
     * @param  string  $email
     * @param  string  $code
     * @return \Illuminate\Http\Response
     */
    public function code(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'code' => 'required',
        ]);

        $user = User::where('email', $request->email)->first();

        if (!$user) {
            return response('A user has not been registed with that email address', 422);
        }

        if ($request->code !== $user->code) {
            return response('The code doesn\'t match the code with have.', 422);   
        }

        return response()->json([
            'id' => $user->id
        ]);
    }
}
