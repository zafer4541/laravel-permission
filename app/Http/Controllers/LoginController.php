<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class LoginController extends Controller
{
    public function show(){
        return view('login');
    }
    public function login(Request $request){
        
        if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){
            return redirect()->route('role.show');
        }
        else{
            return redirect()->back()->withErrors('Invalid email or password');
        }
    }
}
