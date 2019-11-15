<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Permission;

class AdminPermissionController extends Controller
{

    public function index()
    {
        $permissions = Permission::all();
        return view("admin.permissions.all",compact('permissions'));
    }


    public function create()
    {
        $permissions = Permission::all();
        return view("admin.permissions.create",compact('permissions'));
    }

    public function store(Request $request)
    {
        Permission::create(["name"=>$request->get("name")]);
        return redirect("admin/permission/all")->with("success","Permission Successfully Created");
    }

    public function show($id)
    {

    }


    public function edit($id)
    {
        $permissions = Permission::all();
        $permit = Permission::whereId($id)->first();
        return view("admin.permissions.edit",compact('permissions','permit'));
    }


    public function update(Request $request, $id)
    {
        $permit = Permission::whereId($id)->first();
        $permit->name = $request->get("name");

        if($permit->save()){
            return redirect("admin/permission/all")->with("success","Permission Successfully Updated");

        }else{
            return redirect()->back()->with("error","Permission Update Fail!");
        }
    }


    public function destroy($id)
    {
        $permit = Permission::whereId($id)->first();

        $permit->delete();

        return redirect("admin/permission/all")->with("success","Permission Successfully Deleted");
    }
}
