<?php

namespace App\Http\Controllers;

use App\Mail\TestMailer;
use App\Models\User;
use Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Mail;

class AdminDashController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();
        return view('admin.admindash', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function verifyUser(Request $request, User $user)
    {
        // dd($request->verifyed);
        if ($request->verify) {
            $createPassword = Str::password(15);
                $user->verify = true;
            $user->update([
                // "verified" => true,
                'password' => Hash::make($createPassword)
            ]);

            Mail::to($user->email)->send(new TestMailer($user->name, $user->email, $createPassword));
            
            return back();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
