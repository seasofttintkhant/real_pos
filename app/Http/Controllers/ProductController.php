<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use App\Product;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $rules = [
        "name" => ["required"],
        "deposite" => ["required","numeric"],
        "price" => ["required","numeric"],
        "category_id" => ["required"],
        "quantity" => ["required","numeric"]
    ];

    protected $categories;
    
    public function __construct() {
        $this->categories = Category::all();
    }

    public function index()
    {
        //
        $products = Product::with("user","category")->paginate(10);
        return view("products.index",[
            "products" => $products
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
        return view("products.create",[
            "categories" => $this->categories
        ]);
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
        $validator = Validator::make($request->all(),$rules);
        if($validator->fails()){
            return redirect()->back();
        }

        $porduct = Product::create([
            "name" => $request->name,
            "deposite" => $request->deposite,
            "price" => $request->price,
            "code" => $request->code,
            "quantity" => $request->quantity,
            "description" => $request->description,
            "added_by" => auth()->user()->id,
            "category_id" => $request->category_id
        ]);

        return redirect()->route("products.index")->with("success",$porduct->name." has been created.");
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
        $porduct = Product::findOrFail($id);
        return view("products.edit",[
            "product" => $porduct,
            "categories" => $this->categories
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
        $porduct = Product::findOrFail($id);
        $rules = $this->rules;
        $validator = Validator::make($request->all(),$rules);
        if($validator->fails()){
            return redirect()->back();
        }

        $porduct->update([
            "name" => $request->name,
            "deposite" => $request->deposite,
            "price" => $request->price,
            "code" => $request->code,
            "quantity" => $request->quantity,
            "description" => $request->description,
            "added_by" => auth()->user()->id,
            "category_id" => $request->category_id
        ]);

        return redirect()->route("products.index")->with("success",$porduct->name." has been updated.");
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
        $porduct = Product::findOrFail($id);
        Product::destroy($id);
        return redirect()->route("products.index")->with("success",$porduct->name." has been deleted.");
    }
}
