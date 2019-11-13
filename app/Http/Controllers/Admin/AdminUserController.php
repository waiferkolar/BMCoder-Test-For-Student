<?php

namespace App\Http\Controllers\Admin;

use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class AdminUserController extends Controller
{
    public function index()
    {
        $users = User::withTrashed()->get();
//        $users = User::all();
        return view("admin.user.all", compact('users'));
    }

    public function addRole($id)
    {
        $user = User::whereId($id)->first();
        $roles = Role::all();
        return view("admin.permission.add", compact('user', 'roles'));
    }

    public function insertRole($uid, $rolename)
    {
        $user = User::whereId($uid)->first();
        $user->assignRole($rolename);
        return redirect()->back()->with('success', "Role Successfully Added");
    }

    public function removeRole($uid, $rolename)
    {
        $user = User::whereId($uid)->first();
        $user->removeRole($rolename);
        return redirect()->back()->with('success', "Role Successfully Added");
    }

    public function ban($id)
    {
        $user = User::whereId($id)->withTrashed()->first();

        if ($user->deleted_at == null) {
            $user->deleted_at = Carbon::now();
        } else {
            $user->deleted_at = null;
        }
        $user->update();
        return redirect()->back()->with('success', "Role Successfully Added");
    }

    public function edit($id){
        $user = User::whereId($id)->first();
        return view("admin.user.edit",compact('user'));
    }
    public function update(Request $request,$id){
        $user = User::whereId($id)->first();

        $name = $request->get("name");
        $email = $request->get("email");
        $pass = $request->get("password");

        $user->name = $name;
        $user->email = $email;

        if($pass != ""){
//            $user->password = bcrypt($pass)
            $user->password = Hash::make($pass);
        }

        if($user->update()){
            return redirect("admin/user/all")->with('success', "User Edit Success");
        }else{
            return redirect()->back()->with('error', "User Edit Fail");
        }
    }
}
