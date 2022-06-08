<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\User;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use Log;
use Redirect;

class LoginController extends Controller
{
    public function index() {
        return view('login');
    }

    public function login(Request $request) {
        $user = User::firstWhere('email', $request->email);
        if ($user) {
            if (password_verify($request->password, $user->password)) {
                $token = auth()->login($user);

                return Redirect::to('api/tasks')->with('token',$token);
            }
            return Redirect::to('api/iniciar-sesion')->with('useremail', $user->email)->with('message', 'Contraseña incorrecta');
        }
        return Redirect::to('api/iniciar-sesion')->with('message', 'Usuario y contraseña incorrectos');
    }
}
