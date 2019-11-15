<?php

namespace App\Http\Controllers\Admin;

use App\BMLibby\Helper;
use App\Category;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminCategoryController extends Controller
{
    public function index()
    {
        $cats = Category::all();

//        foreach($cats as $cat){
//            if($cat->is_parent != 0){
//                $cat->parent_name = Category::where("is_parent",$cat->is_parent)->first()->name;
//            }
//        }
        return view("admin.cat.all", compact('cats'));
    }

    public function create($parent = 0)
    {
        $cats = Category::all();
        return view("admin.cat.create", compact('cats', 'parent'));
    }

    public function save(Request $request, $parent = 0)
    {
        $cat = new Category();

        $cat->name = $request->get("name");
        $cat->is_parent = $request->get("parent");


        if ($cat->save()) {
            return redirect("admin/cat/all")->with("success", "Category Successfully Created");
        } else {
            return redirect()->back()->with("error", "Category Creation Fail");
        }
    }

    public function edit($id)
    {
        $cat = Category::find($id);
        $cat_parents = Category::where("is_parent", 0)->get();
        return view("admin.cat.edit", compact('cat', 'cat_parents'));
    }

    public function update(Request $request, $id)
    {

        $name = $request->get("name");
        $parent = $request->get("parent");

        $cat = Category::find($id);

        $cat->name = $name;


        if ($cat->is_parent != 0)
            $cat->is_parent = $parent;


        if ($cat->update()) {
            return redirect("admin/cat/all")->with("success", "Category Successfully Updated");
        } else {
            return redirect()->back()->with("error", "Category Update Fail");
        }
    }

    function destory($id){
        $cat = Category::whereId($id)->first();
        $msg = "Category Successfully Delete";
        if($cat->deleted_at == null){
            $cat->deleted_at = Carbon::now();
        }else{
            $msg = "Category Reactive Now";
            $cat->deleted_at = null;
        }

        if ($cat->update()) {
            return redirect("admin/cat/all")->with("success",$msg);
        } else {
            return redirect()->back()->with("error",$msg);
        }
    }
}
