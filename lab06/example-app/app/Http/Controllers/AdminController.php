<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class AdminController extends Controller
{
    public function execute(): View
    {
        $users = DB::table('users')->get();
        $emailsArray = DB::table('users')->pluck('email')->toArray();

        $array_email_comments = [];
        foreach ($emailsArray as $email){
            $array_email_comments[$email] = DB::table('comments')->where('email', $email)->get();
        }
//        foreach ($array_email_comments as $arr){
//            echo '<pre>';
//            if (count($arr) > 0){
//                foreach ($arr as $a) {
//                    print_r($a->text);
//                }
//            }
//            echo '</pre>';
//        }
//        dd($array_email_comments['artemsemenov15@gmail.com'][0]->id);
        return view('admin', ['users' => $users, 'comments' => $array_email_comments]);
    }


}
