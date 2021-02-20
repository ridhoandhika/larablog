<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Profile;

class UserController extends Controller
{
    public function index()
    {
       $users = User::all();

       return view ('admin.user.index',compact('users'));
    }

    public function create()
    {
      
        return view('admin.user.create');
    }
    private function _validation(Request $request){
        $validation = $request->validate([
            'name' => 'required',
            'email' => 'Required|email',
            'password' => 'required|min:8'
        ],[   
            'name.required' => 'Nama Harus diisi!!!',
            'email.required' => 'Email harus diisi!!',
            'email.email' =>'harus sesuia email',
            'password.min'  => 'minimal 8 karakter',
            'password.required' => 'harus diisi!!'
        ]);
        
      

    }
    public function store(Request $request)
    {
        $this->_validation($request);
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password)
        ]);

        $profile = Profile::create([
            'user_id' => $user->id
        ]);

        toastr()->success('Data has been created successfully!');

        return redirect()->route('users');

    }

    public function edit($id)
    {
       
    }

    public function update(Request $request, $id)
    {
        
    }

    public function delete($id)
    {
     
    }
}

