<?php

namespace App\Http\Controllers\Admin;

use App\BMLibby\Helper;
use App\Category;
use App\Http\Requests\TutorialRequest;
use App\Tutorial;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Tymon\JWTAuth\Middleware\BaseMiddleware;

class AdminTutorialController extends Controller
{
    public function index()
    {
        $tuts = Tutorial::withTrashed()->get();
        return view("admin.tutorial.all", compact('tuts'));
    }

    public function create()
    {
        $cats = Category::where("is_parent", 7)->get();
        return view("admin.tutorial.create", compact('cats'));
    }

    public function save(TutorialRequest $request)
    {
        Tutorial::create([
            "title" => $request->get("title"),
            "cat_id" => $request->get("category"),
            "video_link" => $request->get("video_link"),
            "content" => $request->get("content")
        ]);

        return redirect("/admin/tut/all")->with("success", "New Tutorial Created!");


    }

    public function edit($id)
    {
        $cats = Category::where("is_parent", 7)->get();
        $tut = Tutorial::whereId($id)->first();
        return view("admin.tutorial.edit",compact('tut','cats'));
    }

    public function update(TutorialRequest $request, $id)
    {
        $tut = Tutorial::whereId($id)->first();

        $tut->title = $request->get("title");
        $tut->cat_id = $request->get("category");
        $tut->video_link = $request->get("video_link");
        $tut->content = $request->get("content");

        if($tut->update()){
            return redirect("/admin/tut/all")->with("success","Category Successfully Updated!");
        }else{
            return redirect()->back()->with("error","Something is not right!");
        }
    }

    public function destroy($id)
    {
        $tut = Tutorial::withTrashed()->whereId($id)->first();
        if($tut->deleted_at == null){
            $tut->deleted_at = Carbon::now();
        }else{
            $tut->deleted_at = null;
        }
        if($tut->update()){
            return redirect("/admin/tut/all")->with("success","Category Successfully Updated!");
        }else{
            return redirect()->back()->with("error","Something is not right!");
        }
    }
}
