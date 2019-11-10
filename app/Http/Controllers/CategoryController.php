<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use App\Category;

class CategoryController extends Controller
{
    protected $rules = [
        "name" => ["required"]
    ];

    public function __construct() {
        // $this->authorizeResource(Category::class);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        //
        $this->authorize("view-any", Category::class);
        $categories = Category::with("user")->paginate(10);
        return view("categories.index",[
            "categories" => $categories
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
        $this->authorize("create", Category::class);
        return view("categories.create");
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
        $this->authorize("create", Category::class);
        $rules = $this->rules;
        $validator = Validator::make($request->all(),$rules);
        if($validator->fails()){
            return redirect()->back();
        }

        $category = Category::create([
            "name" => $request->name,
            "added_by" => auth()->user()->id
        ]);

        return redirect()->route("categories.index")->with("success",$category->name." has been created.");
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
        $category = Category::findOrFail($id);

        $this->authorize("update",$category);

        return view("categories.edit",[
            "category" => $category
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
        $category = Category::findOrFail($id);

        $this->authorize('update', $category);

        $rules = $this->rules;
        $validator = Validator::make($request->all(),$rules);
        if($validator->fails()){
            return redirect()->back();
        }

        $category->update([
            "name" => $request->name,
            "added_by" => auth()->user()->id
        ]);

        return redirect()->route("categories.index")->with("success",$category->name." has been updated.");
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
        $category = Category::findOrFail($id);
        Category::destroy($id);
        return redirect()->route("categories.index")->with("success",$category->name." has been deleted.");
    }
}
