<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LogoutController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function logout(Request $request)
    {
        Auth::guard()->logout();

        $redirectUrl = $request->input('redirect', route('posts.index'));

        return redirect($redirectUrl);
    }
}
