<?php

namespace App\Http\Controllers;

use App\Registration;
use Illuminate\Http\Request;
use App\Http\Requests\StoreRegistration;
use App\Http\Requests\CheckRegistration;

class RegistrationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $registrations = Registration::with('song', 'video')->get();

        $orderedRegistrations = [];
        foreach ($registrations as $registration) {
            $orderedRegistrations[] = [
                'name' => $registration->firstname.' '.$registration->lastname,
                'email' => $registration->email,
                'phone' => $registration->phone,
                'artist' => $registration->artist,
                'location' => $registration->location,
                'code' => $registration->code,
                'paid' => $registration->paid,
                'song' => isset($registration->song) ? $registration->song->path : '',
                'video' => isset($registration->video) ? $registration->video->path : '',
            ];
        }

        return view('admin.index')->with([
            'registrations' => $orderedRegistrations
        ]);
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRegistration $request)
    {
        $registration = Registration::where('email', $request->email)->first();

        if($registration) {
            return response('That email address is already taken', 422);
        }

        $registration = new Registration;
        $registration->firstname = $request->firstname;
        $registration->lastname = $request->lastname;
        $registration->artist = $request->artist;
        $registration->location = $request->location;
        $registration->email = $request->email;
        $registration->phone = $request->phone;
        
        $code = str_random(10);
        $registration->code = $code;

        $registration->save();

        return response()->json([
            'code' => $code
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Registration  $registration
     * @return \Illuminate\Http\Response
     */
    public function show(Registration $registration)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Registration  $registration
     * @return \Illuminate\Http\Response
     */
    public function edit(Registration $registration)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Registration  $registration
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Registration $registration)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Registration  $registration
     * @return \Illuminate\Http\Response
     */
    public function destroy(Registration $registration)
    {
        //
    }

    /**
     * Check if the user exists and has paid
     *
     * @param  string  $email
     * @param  string  $code
     * @return \Illuminate\Http\Response
     */
    public function check(CheckRegistration $request)
    {
        $registration = Registration::where('email', $request->email)->first();

        return response()->json([
            'id' => $registration->id,
            'paid' => $registration->paid,
            'email' => $registration->email,
            'code' => $registration->code,
        ]);
    }

    /**
     * Check the code matches the user.
     *
     * @param  string  $email
     * @param  string  $code
     * @return \Illuminate\Http\Response
     */
    public function code(Request $request)
    {
        $registration = Registration::where('email', $request->email)->first();

        if ($registration->code !== $request->code) {
            return response('The PayPal response code does not match our records.', 500);
        }

        $registration->paid = true;
        $registration->save();

        return response()->json([
            'id' => $registration->id,
            'paid' => $registration->paid,
            'email' => $registration->email,
            'code' => $registration->code,
        ]);
    }
}
