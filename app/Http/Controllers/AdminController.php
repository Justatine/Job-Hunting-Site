<?php

namespace App\Http\Controllers;

use App\Models\Joblist;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function __invoke(){
        $jobs = Joblist::orderByDesc('created_at')->get();
        $users  = User::orderByDesc('created_at')->get();

        return view('pages.admin.index',[
            'jobs'=>$jobs,
            'users'=>$users,
            'user' => auth()->user()
        ]);
    }
}
