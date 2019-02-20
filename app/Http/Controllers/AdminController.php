<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\University;
// use Nexmo\Network\Number\Request;

class AdminController extends Controller
{
    public function adduniversity()
    {
        return view("University.add");
    }

    public function adduniversityinDb(Request $request)
    {
        $uni = new University();
        $uni->University_name = $request->uniNmae;
        $uni->intro = $request->intro;
        $uni->path = "temp";
        $uni->image = "temp";

        $uni->save();

        return view("university.admin");
    }
}
