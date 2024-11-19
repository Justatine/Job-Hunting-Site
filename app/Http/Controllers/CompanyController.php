<?php

namespace App\Http\Controllers;

use App\Models\Joblist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CompanyController extends Controller
{
    public function __invoke(){
        $id = Auth::user()->id;

        $jobs = Joblist::orderByDesc('created_at')->where('user_id',$id)->get();

        return view('pages.company.index', [
            'jobs'=>$jobs
        ]);
    }
}
