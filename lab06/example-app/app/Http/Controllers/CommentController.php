<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class CommentController extends Controller
{
    public function execute(Request $request): View
    {
        DB::table('comments')->where('id', $request['id'])->delete();
        $users = DB::table('users')->get();
        $emailsArray = DB::table('users')->pluck('email')->toArray();

        $array_email_comments = [];
        foreach ($emailsArray as $email){
            $array_email_comments[$email] = DB::table('comments')->where('email', $email)->get();
        }

        return view('admin', ['users' => $users, 'comments' => $array_email_comments]);
    }
}
