<?php

namespace App\Http\Controllers;

use App\BMLibby\Helper;
use App\Tutorial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PageController extends Controller
{
    function index()
    {
        $tuts = Tutorial::all();
        if (Auth::check()) {
//            if (Auth::user()->hasAnyRoles(["admin"])) {
            if (Auth::user()->hasRole("admin")) {
                return redirect("/admin/home");
            }else{
                $permits = Auth::user()->permissions;
                return view("home",compact('tuts','permits'));
            }
        } else {
            return view("home",compact('tutus'));
        }
    }
}
