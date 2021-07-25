<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{

    public function getSignin(){
        return view('login.signin');
    }

    public function getSignup(){
        return view('login.signup');
    }

    public function postSignin(Request $request){
        
       

        $rules = [
            'email' => 'required|email',
            'password' => 'required|min:8',
        ];

        $messages = [
            'email.required' => 'Campo necesario',
            'password.required' => 'Campo necesario',
            'password.min' => 'El formato es invalido',
            'email.email' => 'El formato es invalido',
        ];
        $validator = Validator::make($request->all(), $rules, $messages);
        
        if($validator->fails()) :
            return back()->withInput($request->input());
        else:

            $credentials =  $request->only('email', 'password');
           
            $remember = $request->filled('remember');
        
            
            if( Auth::attempt( $credentials, $remember ) ):
                
                if (Auth::user()->role == 1) {
                    return redirect('/')->with('message', 'Bienvenido '.Auth::user()->name)->with('typealert', 'success');
                }else{
                    return back()->withErrors($validator)->with('message', 'Su usuario no cuenta con los permisos de administrador')->with('typealert', 'danger');
                }
                        
            else:
                return back()->withErrors($validator)->with('message', 'Correo o contraseña incorrecto')->with('typealert', 'danger');
            endif;
      
        endif;
        

    }

    public function logout(){
        Auth::logout();
        return redirect('/signin');
    }

}
