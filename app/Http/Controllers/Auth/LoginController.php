<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

use function Laravel\Prompts\password;

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
    // protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('guest')->except('login');
    // }

    public function login(Request $request)
    {
        $input = $request->all();

        // $this->validate($request, [
        //     'email' => 'required|email',
        //     'password' => 'required'

        // ]);

        // dd($input);
        $userdata =array('email'=> $input['email'],
        'password'=> $input['password']); // dd(auth('admin'), auth('admin')->attempt($userdata));
            // dd(bcrypt($input['password']));
        if($input['usertype'] == "admin"){
            if(auth('admin')->attempt($userdata)){
                $user= auth('admin')->user();
                // $customer = auth('customer')->user();
                // dd($user);
                if($user->status== 'Active'){
                        // dd(auth('admin')->user());
                    return redirect()->route('adminDashboard');
                }
                else{

                    Auth::logout();
                        // auth('admin')->logout();
                    return redirect()->route('adminLogin')->with('message','You don\'t have Admin Access!');
                        // redirect('/')->with('error','You don\'t have Admin Access!');
                }
            }
            else{

                Auth::logout();
                return redirect()->route('adminLogin')->with('message','Wrong Email and Password!');
            }

        }
        if($input['usertype'] == "customer"){
// dd('Reach');
// dd($userdata);
            if(auth('customer')->attempt($userdata)){
                $customer= auth('customer')->user();
                // dd($customer);
                if($customer->status== 'Active'){
                    // dd(auth('admin')->user());
                    if(session()->get('cart') == null){
                        return redirect()->route('homepage');
                    }else{
                        return redirect()->route('addtocartinfo');
                    }

                }
                else{

                    Auth::logout();
                    // auth('admin')->logout();
                    return redirect()->route('customeLogin')->with('message','You don\'t have Customer Access!');
                }
            }
            else{
                    Auth::logout();
                    return redirect()->route('customeLogin')->with('message','Wrong Email and Password!');
            }

        }
        else{

            return redirect('Login')->with('error','You don\'t have Admin Access!');
        }
    }

    public function Customerlogout(){
        Auth::logout();
        Session::flush();
        return redirect()->route('CustomerLogin');
    }
    public function Adminlogout(){
        Auth::logout();
        Session::flush();
        return redirect()->route('AdminLogin');
    }


}
