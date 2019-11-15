<?php

namespace App\Http\Controllers\Api;

use App\Category;
use App\Http\Requests\TutorialRequest;
use App\Tutorial;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ApiCategoryController extends Controller
{
    public function allCat()
    {
        $cats = Category::all();
        return $cats;
    }

    public function allTutorial(Request $request){
        $tuts = Tutorial::all();
        $tutorials = [];
        $permits = $request->user()->permissions;

        foreach($tuts as $tut){
            foreach($permits as $permit){
                if($tut->permit == $permit->id){
                    array_push($tutorials,$tut);
                }
            }
        }


        return $tutorials;
    }
}
