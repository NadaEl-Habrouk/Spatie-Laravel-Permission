<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
   public function index(){
    $users = User::all();
    return view('admin.users.index',compact('users'));
   }
   

   public function show(User $user){
      $roles = Role::all();
      $permissions = Permission::all();
      return view('admin.users.role',compact('user','roles','permissions'));
   }

   public function assignRole(Request $request, User $user){
      if($user->hasRole($request->role)){
          return back()->with('message','Role Exists');
      }
      $user->assignRole($request->role);
      return back()->with('message','Role Assigned'); 
  }
  public function removeRole(User $user, Role $role){
      if($user->hasRole($role)){
          $user->removeRole($role);
          return back()->with('message','Role removed'); 

  }
  return back()->with('message','Role Not Exists');

}


public function givePermission(Request $request, User $user){
   if($user->hasPermissionTo($request->permission)){
       return back()->with('message',' Permission Exists ');
   }
   $user->givePermissionTo($request->permission);
   return back()->with('message',' Permission Added ');
}

public function revokePermission(User $user, Permission $permission) {
   if ($user->hasPermissionTo($permission)) {
       $user->revokePermissionTo($permission);
       return back()->with('message', 'Permission Revoked');
   }


   return back()->with('message', 'Permission Not Exists');
}
public function destroy(User $user){
   if($user->hasRole('admin')){
      return back()->with('message', 'You Are Admin');
   }
   $user->delete();
   return back()->with('message', 'User Deleted');


}
}
