<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{


   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = Role::orderBy('id','DESC')->paginate(15);;
        return view('roles.index',['roles' => $roles]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('roles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());

        $request->validate([
            'name' => 'required|unique:roles'
        ]);


        $role = new Role();

        $role->name = $request->name;
        $role->save();

        $permissions = Permission::find($request->permissions);

        $role->syncPermissions($permissions ?? []);

        return to_route('roles.index')->with('message','Role Created Successfully !');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $role = Role::find($id);

        return view('roles.edit',['role' => $role]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Role $role)
    {        
        $request->validate([
            'name' => 'required|unique:items,code,'.$role->id
        ]);

        $old_role_name = $role->name;

        $role->name = $request->name;

        $role->save();

        $permissions = Permission::find($request->permissions);

        // dd($permissions);

        $role->syncPermissions($permissions ?? []);

        $users = User::with('roles')->get();
                
        foreach($users as $user){
            if(count($user->roles) > 0){
                if($user->roles[0]->name == $old_role_name){
                    $user->assignRole($role->name);
                    $user->syncPermissions($permissions);
                    // dd($user->permissions);
                }
            } 
        }



        return to_route('roles.index')->with('message','Role Updated Successfully !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        $role = Role::find($id);

        $users = User::with('roles')->get();
                
        foreach($users as $user){
            if(count($user->roles) > 0){
                if($user->roles[0]->name == $role->name){
                    $user->assignRole('User');
                    $user->syncPermissions([]);
                    // dd($user->permissions);
                }
            } 
        }

        $role->delete();

        return to_route('roles.index')->with('message','Role Deleted Successfully !');
    }

    public function permissionsByRole($id){
        $role = Role::find($id);

        $permissions = array_map(function ($permission) {
            return $permission['name'];
        },$role->permissions->toArray());

        return response()->json([
            'permissions' => $permissions
        ]);
    }
}
