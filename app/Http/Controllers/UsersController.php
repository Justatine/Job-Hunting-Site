<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    public function view($user){
        $users = User::find($user);

        return view('pages.admin.view-users', [
            'user' => $users
        ]);
    }
    public function store(){
        $data = request()->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255', 'unique:users,email'],
            'password' => ['required', 'string', 'min:8'],
            'role' => ['required', 'in:Company,Admin,Applicant'],
            'status' => ['required', 'in:Pending,Active'],
        ]);
              
        User::create($data);

        return redirect()->back()->with('status', 'success')->with('message','User Added');
    }

    public function delete(User $user){
        if ($user) {
            $user->delete();          
            return redirect('/admin')->with('status', 'success')->with('message','User deleted');
        }   
    }

    public function edit($user){
        $users = User::find($user);

        return view('pages.admin.update-users', [
            'user' => $users
        ]);
    }

    public function update(User $user)
    {
        $data = request()->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255', 'unique:users,email,' . $user->id],
            'password' => ['nullable', 'string', 'min:8'],
            'role' => ['required', 'in:Company,Admin,Applicant'],
            'status' => ['required', 'in:Pending,Active']
        ]);
    
        if (!empty($data['password'])) {
            $data['password'] = Hash::make($data['password']);
        } else {
            unset($data['password']);
        }
    
        $user->update($data);
    
        return redirect('/admin/')->with('status', 'success')->with('message', 'User updated');
    }    
}
