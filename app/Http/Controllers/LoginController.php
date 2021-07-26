<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{

    public function getSignin(){
        return view('login.signin');
    }

    public function getSignup(){
        return view('login.signup');
    }

    public function postSignup(Request $request){
        
        $rules = [
            'email' => 'required|email',
            'password' => 'required|min:8',
            'conf_password' => 'required|min:8|same:password',
        ];

        $messages = [
            'email.required' => 'Campo necesario',
            'password.required' => 'Campo necesario',
            'password.min' => 'El formato es invalido min 8 caracteres',
            'email.email' => 'El formato es invalido',
            'conf_password.required' => 'Campo necesario',
            'conf_password.min' => 'El formato es invalido min 8 caracteres',
            'conf_password.same' => 'Las contraseña no coinciden',
        ];
        
        $validator = Validator::make($request->all(), $rules, $messages);
        
        if($validator->fails()) :
            return back()->with('message', 'Verifique los campos')->with('typealert', 'danger')->withInput();
        else:

            $user = new User();

            $user->name = $request->input('name');
            $user->last_name = $request->input('last_name');
            $user->email = $request->input('email');
            $user->password = Hash::make($request->input('password'));
            $user->role = 0;

            if ($user->save()) {
                return redirect('/signin')->with('message', 'Usuario creado con exito')->with('typealert', 'success');
            }

        endif;
        

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
            return back()->with('message', 'Verifique los campos')->with('typealert', 'danger')->withInput($request->input());
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
