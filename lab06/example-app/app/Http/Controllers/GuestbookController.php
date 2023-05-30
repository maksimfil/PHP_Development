<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class GuestbookController extends Controller
{
    public function execute(Request $request): View
    {
        $infoMessage = null;
        if (!empty($request['name']) && !empty($request['email']) && !empty($request['text'])) {

            $exist_user = DB::table('users')->where('email', $request['email'])->exists();
            if ($exist_user){
                DB::table('comments')->insert(
                    array(
                        'email' => $request['email'],
                        'name' => $request['name'],
                        'text' => $request['text']
                    )
                );
            } else {
                $infoMessage = 'User doesn`t exist, write another email!';
            }

        } elseif (!empty($request)) {
            $infoMessage = 'Заполните поля формы!';
        }
        $elements = DB::table('comments')->get();
        if ($infoMessage !== null){
            return view('guestbook', ['data' => $elements, 'infoMessage' => $infoMessage]);
        } else {
            return view('guestbook', ['data' => $elements]);
        }

    }
}
