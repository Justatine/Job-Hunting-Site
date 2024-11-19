<?php

namespace App\Http\Controllers;

use App\Models\Joblist;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class JobController extends Controller
{
    public function __invoke(Request $request)
    {
        $search = $request->get('search');
    
        $jobs = Joblist::where('status', 'Active')
                    ->when($search, function ($query, $search) {
                        return $query->where(function ($query) use ($search) {
                            $query->where('title', 'like', "%{$search}%")
                                  ->orWhere('company_Name', 'like', "%{$search}%")
                                  ->orWhere('description', 'like', "%{$search}%");
                        });
                    })
                    ->orderByDesc('created_at')
                    ->paginate(10); // 10 jobs per page
    
        return view('pages.index', [
            'jobs' => $jobs
        ]);
    }    
    

    public function store(){
        $data = request()->validate([
            'title' => ['required', 'string'],
            'description' => ['required', 'string'],
            'email' => ['required', 'email'],
            'company_Name' => ['required', 'string'],
            'status' => ['required', 'in:Active,Inactive'],
            'number_impressions' => ['nullable', 'integer'],
            'number_applies' => ['nullable', 'integer'],
            'number_views' => ['nullable', 'integer'],
        ]);        

        $data['user_id'] = Auth::user()->id;

        Joblist::create($data);

        return redirect()->back()->with('status', 'success')->with('message','Job Added');
    }

    public function delete(Joblist $job){
        if ($job) {
            $job->delete();          
            return redirect()->back()->with('status', 'success')->with('message','Job deleted');
        }   
    }

    public function edit($job){
        $jobs = Joblist::find($job);

        return view('pages.admin.update-jobs', [
            'job' => $jobs
        ]);
    }

    public function view(Joblist $job)
    {
        $job->increment('number_views');
        $job->increment('number_impressions');
    
        return view('pages.job.job-details', [
            'job' => $job
        ]);
    }

    public function viewPage($job){
        $jobs = Joblist::find($job);

        return view('pages.admin.view-jobs', [
            'job' => $jobs
        ]);
    }
    

    public function update(Joblist $job){
        $data = request()->validate([
            'title' => ['required', 'string'],
            'description' => ['required', 'string'],
            'email' => ['required', 'email'],
            'company_Name' => ['required', 'string'],
            'status' => ['required', 'in:Active,Inactive']
        ]);  
        
        $job->update($data);

        return redirect()->back()->with('status', 'success')->with('message','Job updated');
    }

    public function apply(Joblist $job)
    {
        $job->increment('number_applies');
        return redirect()->back()->with('status', 'success')->with('message', 'Application sent');
    }
}
