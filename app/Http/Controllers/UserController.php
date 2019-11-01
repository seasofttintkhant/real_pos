<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $rules = [
        "name" => ["required"],
        "role" => ["required"]
    ];

    public function index()
    {
        //
        $users = User::paginate(10);
        return view("users.index",[
            "users" => $users
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view("users.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $rules = $this->rules;
        $rules["email"] = ["required","email","unique:users"];
        $rules["password"] = ["required"];
        $rules["c_password"] = ["required","same:password"];
        $validator = Validator::make($request->all(),$rules);
        if($validator->fails()){
            return redirect()->back();
        }

        $user = User::create([
            "name" => $request->name,
            "email" => $request->email,
            "password" => bcrypt($request->password),
            "role" => $request->role,
        ]);
        return redirect()->route("users.index")->with("success",$user->name." has been added.");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        $user = User::findOrFail($id);
        return view("users.edit",[
            "user" => $user
        ]);
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
        $user = User::findOrFail($id);
        $rules = $this->rules;
        $rules["email"] = ["required","email","unique:users,email,$user->id"];
        if(!empty($request->password)){
            $rules["password"] = ["required"];
            $rules["c_password"] = ["required","same:password"];
            $pssword = bcrypt($request->password);
        }
        $validator = Validator::make($request->all(),$rules);
        if($validator->fails()){
            return redirect()->back();
        }

        $user->update([
            "name" => $request->name,
            "email" => $request->email,
            "role" => $request->role,
        ]);
        if(!empty($request->pssword)){
            $user->password = $pssword;
            $user->save();
        }
        return redirect()->route("users.index")->with("success",$user->name." has been updated.");
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
        $user =User::findOrFail($id);
        User::destroy($id);
        return redirect()->route("users.index")->with("success",$user->name." has been deleted."); 
    }
}
