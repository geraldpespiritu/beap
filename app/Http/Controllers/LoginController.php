<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    public function index()
    {
        return view("/login");
    }

    public function getLogin()
    {
        echo "xyz";
        //ITD GIVEN CODE for API...
        $post = array(
            'key'=>'7njer8asdbhjq782JASDF89AFDdfw3fd3q7',
            'user'=> 'xdirector',
            'pass'=> 'testing1'
        );

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL,"https://www.benilde.edu.ph/testapi/service.asmx/Authenticate");
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($post));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST,  2);

        $server_output = curl_exec($ch);

        curl_close ($ch);
        if($server_output != "Y"){
            $user = auth::user();
            $token = $user->createToken($request->token, ['place-orders'])->accessToken;
            return redirect()->to("/about");
        }
        else{
            return redirect()->to("/BeapDashboard");
        }

    }
}
