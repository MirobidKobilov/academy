<?php

namespace App\Http\Controllers;

use App\Http\Requests\InviteRequest;
use App\Mail\InviteStudent;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Str;
use Illuminate\View\View;

class InvitesController extends Controller
{
    /**
     * Processes the login form
     *
     * @return View
     **/
    public function invite(): View
    {
        return view('mail.success');
    }

    /**
     * Processes to check if user exists
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return redirect
     **/
    public function checkSignIn(Request $request)
    {
        // Check if the URL is valid
        if (!$request->hasValidSignature()) {
            abort(401);
        }
        // Authenticate the user
        $user = User::findOrFail($request->user);
        Auth::login($user);
        // If Auth success redirect
        return redirect('/student-test');
    }

    /**
     * Processes the logout
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return redirect
     **/
    public function logout(Request $request)
    {
        Auth::logout();
        return redirect('/');
    }
}
