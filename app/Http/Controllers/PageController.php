<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PageController extends Controller
{
    function index()
    {
        if (Auth::check()) {
            if (Auth::user()->hasAnyRoles(["admin"])) {
                return redirect("/admin/home");
            }
        } else {
            return view("home");
        }
    }
}
