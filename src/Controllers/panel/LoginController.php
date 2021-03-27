<?php

namespace Ukadev\Blogfolio\Controllers\panel;

use App\Http\Controllers\Auth\LoginController as Controller;
use Creativeorange\Gravatar\Facades\Gravatar;

class LoginController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function showLoginForm()
    {
        return view('blogfolio::login/login');
    }
}