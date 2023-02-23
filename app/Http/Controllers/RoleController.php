<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DataTables;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Permissions\Permissions as Perm;
use App\Traits\DataTableFetch;
class RoleController extends Controller
{
    use DataTableFetch;
    //
    public function show(){
        return view('Role.list');
    }
    public function roleFetch(){
        $model = Role::query();
        return $this->fetch($model,'role.edit','remove');
    }
    public function edit(Request $request){
        $perms=new perm; 
        $permissions=$perms->getPermissions();
        $role=Role::find($request->id);
        return view('Role.update',compact('role','permissions'));
    }
    public function update(Request $request){
        $validate=$request->validate([
            'name'=>'required',
        ]);
        $role=Role::find($request->id);
        $role->name=$request->name;
        $role->syncPermissions($request->permissions);
        $role->save();
        return redirect()->route('role.show')->with('success','Role Update Complated Successfully');
    }
    public function create(){
        $perms=new perm; 
        $permissions=$perms->getPermissions();
        return view('Role.create',compact('permissions'));
    }
    public function store(Request $request){
        $validate=$request->validate([
            'name'=>'required',
        ]);
        $role = Role::create(['name' => $request->name]);
        $role->syncPermissions($request->permissions);
        return redirect()->route('role.show')->with('success','Role Create Complated Successfully');
    }
}
