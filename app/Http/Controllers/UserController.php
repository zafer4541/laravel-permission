<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use DataTables;
use Illuminate\Support\Facades\Hash;
use App\Traits\DataTableFetch;
class UserController extends Controller
{   use DataTableFetch;
    public function show(){
        return view('user.list');
    }

    public function userFetch()
    {
        $user=User::query();
        return $this->fetch($user,'user.edit','remove');
    }
    
    public function create(){
        return view('User.create');
    }
    
    public function store(Request $request){
        $validate=$request->validate(
            ['name'=>'required']
        );
        $user=User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>Hash::make($request->password) ,
        ]);
        return redirect()->route('user.show')->with('success','User Create Completed Successfully');
    }
    
    public function edit(Request $request){
        $user=User::find($request->id);
        return view('User.update',compact('user'));
    }
    
    public function update(Request $request){
        
        $user=User::find($request->id);
        $validate=$request->validate([
            'name'=>'required',
            'email'=>'required|unique:users,email,'.$user->id
        ]);
        if(asset($request->password)){
            $request->merge([
                'password' => $user->password,
            ]);
        }
        $user->update($request->all());
        return redirect()->route('user.show')->with('success','User Update Complated Successfully');
    }
    public function delete(Request $request){
        $request->validate(['id'=>'required|numeric']);
        User::find($request->id)->delete();
    }
}
