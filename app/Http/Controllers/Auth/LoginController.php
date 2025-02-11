<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\LoginNotificationMail;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = RouteServiceProvider::HOME;

    // protected function authenticated(Request $request, $user)
    // {
    //     Mail::to($user->email)->send(new LoginNotificationMail($user));
    // }

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
