<?php

namespace App\Http\Controllers\Vendor\Auth;

use App\Admin;
use App\Http\Controllers\Controller;
use App\Http\Requests\AdminLoginVerifyRequest;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function showLoginForm()
    {
        return view('vendor.login');
    }

    public function login(AdminLoginVerifyRequest $request)
    {
        $vendor = Auth::guard('vendor')->attempt($request->except(['_token']));

        if (!$vendor) {
            return back()->with('error', 'Invalid Login details');
        }

        return redirect()->route('vendor.dashboard');
    }

    public function logout(Request $request)
    {
        Auth::guard('vendor')->logout();
        return redirect()->route('vendor.index');
    }
}
