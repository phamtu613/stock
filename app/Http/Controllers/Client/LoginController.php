<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
class LoginController extends Controller
{
    public function register()
    {
        return view('auth.client.register');
    }

    public function postregister(Request $request)
    {
        
        
        $newUser                  = new User;
        $newUser->name            = $request->name;
        $newUser->email           = $request->email;
        $newUser->password        = bcrypt($request->password);
        $newUser->save();

        

        
        return redirect()->route('client.login')->with('success', 'Register successfully!');
    }
}
