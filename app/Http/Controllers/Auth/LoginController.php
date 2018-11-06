<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

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

    //UNCOMMENT BELOW FOR THE USAGE OF API OF ITD
    public function login(Request $request)
    {
        $post = array(
            'key' => '7njer8asdbhjq782JASDF89AFDdfw3fd3q7',
            'user' => $request->input('userName'),
            'pass' => $request->input('password'),
        );

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "http://www.benilde.edu.ph/testapi/service.asmx/Authenticate");
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($post));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);

        $server_output = curl_exec($ch);

        curl_close($ch);

        if ($server_output == "Y") {
            return redirect()->to("/about");
        } else {
            return redirect()->to("/dashboard");
        }

        $this->validate($request, [
            'username' => 'required',
            'password' => 'required'
        ]);
        if (Auth::guard('director')->attempt(['username' => $request->username,
            'password' => $request->password], $request->remember)) {
            return redirect()->intended(route('director.dashboard'));
        }
        session()->flash('alert', 'Incorrect username/password!');
        return redirect()->back()->withInput($request->only('username', 'remember'));
    }


public function directorLogout()
{
    Auth::guard('director')->logout();
    //return redirect('/');
    return redirect(\URL::previous());
}

}