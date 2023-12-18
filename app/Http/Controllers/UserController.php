<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::orderBy('id','DESC')->paginate(15);

        return view('users.index',['users' => $users]);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $user = User::where('slug',$slug)->first();

        return view('users.edit',['user' => $user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'role_id' => 'required'
        ]);

        $user->name = $request->name;
        $user->slug =  Str::slug($request->name);
        $user->email = $request->email;
        
        $user->save();

        DB::table('model_has_roles')->where('model_id',$user->id)->delete();
        
        $rolename = Role::find($request->role_id)->name;

        $role = Role::find($request->role_id);
        $permissions = array_map(function ($permission) {
            return $permission['name'];
        },$role->permissions->toArray());
        $user->assignRole((string) $rolename);
        $user->givePermissionTo($permissions);
        return to_route('users.index')->with('message','User Updated Successfully !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug)
    {
        
        $category = User::where('slug',$slug)->first();

        $category->delete();

        return to_route('users.index')->with('message','User Deleted Successfully !');
    }
}
