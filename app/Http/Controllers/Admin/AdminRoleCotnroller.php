<?php

namespace App\Http\Controllers\Admin;

use App\BMLibby\Helper;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Role;

class AdminRoleCotnroller extends Controller
{
    public function index()
    {
        $roles = Role::all();
        return view("admin.roles.all", compact('roles'));
    }

    public function create()
    {
        $roles = Role::all();
        return view("admin.roles.create", compact('roles'));
    }


    public function store(Request $request)
    {
        Role::create(["name" => $request->get("name")]);
        return redirect("/admin/role/all")->with("success", "Category Successfully Updated!");
    }

    public function show($id)
    {
    }

    public function edit($id)
    {
        $roles = Role::all();
        $nowrow = Role::whereId($id)->first();
        return view("admin.roles.edit",compact('nowrow','roles'));
    }

    public function update(Request $request, $id)
    {
        $role = Role::whereId($id)->first();
        $role->name = $request->get("name");
        if($role->update()){
            return redirect("/admin/role/all")->with("success","Role Update Success");
        }else{
            return redirect()->back()->with("error","Role Update Fail!");
        }
    }

    public function destroy($id)
    {
    }
}
