<?php

namespace App\Http\Controllers\Vendor\Auth;

use App\User;
use App\Http\Controllers\Controller;
use App\Vendor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
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
        $this->middleware('guest');
    }

    public function showRegistrationForm()
    {
        return view('vendor.register');
    }

    public function register(Request $request)
    {
        $vendor = new Vendor();
        $vendor->vendor_name = $request->vendor_name;
        $vendor->store_name = $request->store_name;
        $vendor->store_location = $request->store_location;
        $vendor->email = $request->email;
        $vendor->password = Hash::make($request->password);
        $vendor->address = $request->address;
        $vendor->save();

        Auth::guard('vendor')->login($vendor);

        return redirect()->route('vendor.dashboard');
    }
}
