<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Auth;
use App\University;
use App\sql;
use App\Files;


class UniversityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $universities = University::all();
        return view("University.index")->with("universities", $universities);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
    }

    public function showMyUni($University_id)
    {
        $var = University::all();
        foreach ($var as $v) {
            if ($v->University_id == $University_id) {
                $uni = $v;
            }
        }
        $files = Files::all()->where('univeristy', $uni->University_name);
        $user = Auth::User();

        return view('University.showall')->with('uni', $uni)->with('user', $user)->with('files', $files);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'subject' => 'required',
            'description' => 'required'
        ]);

        $fileobj = new Files();

        $fileobj->description = $request->description;
        $fileobj->univeristy = Auth::user()->univeristy;


        if ($request->has('file')) {
            $fileobj->file_name = $request->file('file')->store('fileuploaded', 'public');
        }
        $fileobj->save();

        $user = Auth::User();
        if ($user->admin == 1) {
            return view("university.admin");
        }

        $files = Files::all();

        return view('university.show')->with("user", $user)->with('files', $files);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $user = Auth::User();
        if ($user->admin == 1) {
            return view("university.admin");
        }
        $files = Files::all()->where('univeristy', $user->univeristy);

        return view('university.show')->with("user", $user)->with('files', $files);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
