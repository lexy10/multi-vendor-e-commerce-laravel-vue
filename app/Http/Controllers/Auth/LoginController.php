<?php

namespace App\Http\Controllers\Auth;

use App\Admin;
use App\Category;
use App\Http\Controllers\Controller;
use App\Http\Requests\AdminLoginVerifyRequest;
use App\Product;
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
    //protected $redirectTo = '/home';

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
        $res = Product::all();
        $cat = Category::all();
        return view('store.login')
            ->with('products', $res)
            ->with("cat", $cat);
    }

    public function login(Request $request)
    {
        $user = Auth::guard()->attempt($request->except(['_token']));

        if (!$user) {
            return back()->with('error', 'Invalid Login details');
        }

        return redirect()->route('store.home');
    }

    public function logout(Request $request)
    {
        Auth::guard()->logout();
        return redirect()->route('user.login.form');
    }
}
