<?php

namespace App\Http\Controllers;

use App\Models\Category;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::latest()->get();
        return view('category.index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        
        return view('category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name'=>'required'
        ]);

        Category::create([
            'name'=>$request->get('name')
        ]);
        return redirect()->back()->with('message','Category Created'); 
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $category=Category::find($id);
        return view('category.edit',compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'name'=>'required'
        ]);

        $this->validate($request,['name'=>'required']);

        $category = Category::find($id);

        $category->name =$request->get('name');
        $category->save();
        return redirect()->route('category.index')->with('message','Category Update');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
       
        $category = Category::find($id);
        $category->delete();
        return redirect()->route('category.index')->with('message','category deleted');
    }
}
