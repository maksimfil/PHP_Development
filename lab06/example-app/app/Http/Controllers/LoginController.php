<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class LoginController extends Controller
{
    public function sign(Request $request)
    {
        $infoMessage = null;
        if (!empty($request['email']) && !empty($request['password'])) {

            // 3.raw. Check that user has already existed
            $user = DB::table('users')->where('email', $request['email'])->where('password', $request['password']);

            if ($user->exists()) {
                return redirect('/admin');
            }
            else{
                $infoMessage = "You are don't registered!";
            }
        }
        return view('login', ['infoMessage' => $infoMessage]);
    }
}
