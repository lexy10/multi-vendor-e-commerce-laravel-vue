<?php

namespace App\Http\Controllers\Auth;

use App\Address;
use App\Category;
use App\Product;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Model;
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
        if(Auth::check()){
            return redirect()->route("store.cart");
        }

        $res = Product::all();
        $cat = Category::all();

        return view('store.signup')
            ->with('products', $res)
            ->with("cat", $cat);
    }

    public function register(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'address' => 'required',
            'city' => 'required',
            'zip' => 'required|numeric',
            'tel' => 'required|numeric',
            'pass' => 'required|min:5',
            'confirm_password' => 'required|min:5|same:pass'
        ]);

        //dd($validatedData);
        $user = new User();
        $address = new Address();
        $address->area = $request->address;
        $address->city = $request->city;
        $address->zip = $request->zip;

        $address->save();
        $add_id = $address->id;

        $user->full_name = $request->name;
        $user->email = $request->email;
        $user->password = $request->pass;
        $user->address_id = $add_id;
        $user->phone = $request->tel;

        //dd($u);

        $user ->save();

        Auth::login($user);

        return redirect()->route('store.home');
    }
}
