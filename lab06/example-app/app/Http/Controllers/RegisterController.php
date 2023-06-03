<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class RegisterController extends Controller
{
    public function save(Request $request): View
    {
        if (!empty($_SESSION['auth'])) {
            header('Location: /admin');
            die;
        }

        // 1. Create empty $infoMessage
        $infoMessage = '';

        // 2. handle form data
        if (!empty($request['email']) && !empty($request['password'])) {


            // 3.raw. Check that user has already existed


            $user = DB::table('users')->where('email', $request['email']);


            if (!$user->exists()) {

                // 4. Create new user

                DB::table('users')->insert(
                    [
                        'email' => $request['email'],
                        'password' => $request['password']
                    ]
                );
                mail($request['email'], "Successful registration ", "Ви успішно зареєструвались",
                    "From: filmaksim02@gmail.com");

                return view('login');

            } else {
                $infoMessage = "Такой пользователь уже существует! Перейдите на страницу входа. ";
                $infoMessage .= "<a href='/login'>Страница входа</a>";
                return view('register');
            }

        } elseif (!empty($request)) {
            $infoMessage = 'Заполните форму регистрации!';
        }

        return view('register');
    }
}
