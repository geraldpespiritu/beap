<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Auth;

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
    protected $redirectTo = '/dashboard';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

        $this->middleware('guest')->except('logout');
    }

    public function userName()
    {
        return 'userName';
    }

    public function showLoginForm()
    {
        return view('auth.login');
    }

    //UNCOMMENT BELOW FOR THE USAGE OF API OF ITD
    public function login(Request $request)
    {
        //email

        $post = array(
            'key' => '7njer8asdbhjq782JASDF89AFDdfw3fd3q7',
            'user' => $request->input('userName'),
            'pass' => $request->input('password'),
        );

        //var $username2 = $username1;

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "http://www.benilde.edu.ph/testapi/service.asmx/Authenticate");
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($post));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);

        $server_output = curl_exec($ch);

        curl_close($ch);


        if (substr($post['user'], 1, 1) != "1" && $server_output == "Y") {
            session(['username' => $request->get('userName')]);
                return redirect()->to("calamities");
        } else {
            return redirect()->to("errorLogin");
        }



      // echo ($post['user']);

//        $this->validate($request, [
//            'username' => 'required',
//            'password' => 'required'
//        ]);
//        if (Auth::guard('director')->attempt(['username' => $request->username,
//            'password' => $request->password], $request->remember)) {
//            return redirect()->intended(route('director.dashboard'));
//        }
//        session()->flash('alert', 'Incorrect username/password!');
//        return redirect()->back()->withInput($request->only('username', 'remember'));
    }
}