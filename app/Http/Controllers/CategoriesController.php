<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Ad;

class CategoriesController extends Controller
{

    public function __construct(){

        $this->middleware('isAdmin',['except' => ['show']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::orderBy('name')->paginate(10);
        return view('categories.index')->with('categories',$categories);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name'=>'required|unique:categories',
            'description'=>'required'
        ]);

        $name = filter_var($request->name,FILTER_SANITIZE_SPECIAL_CHARS);
        $description = filter_var($request->description,FILTER_SANITIZE_SPECIAL_CHARS);

        Category::create([
            'name'=>$name,
            'description'=>$description
        ]);

        session()->flash('success', 'Category created successfully.');

        return redirect(route('categories.index'));

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ads = Ad::where('category_id',$id)->get();
        $category = Category::findOrFail($id);
        return view('categories.show')->with(['ads'=> $ads,'category'=>$category]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::find($id);
        return view('categories.edit')->with('category',$category);
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
        $this->validate($request,[
            'name' => 'required',
            'description' => 'required',
        ]);

        $name = filter_var($request->name,FILTER_SANITIZE_SPECIAL_CHARS);
        $description = filter_var($request->description,FILTER_SANITIZE_SPECIAL_CHARS);

        Category::where('id', $id)->update([
            'name' => $name,
            'description' => $description,
        ]);

        session()->flash('success','Category updated successfully.');

        return redirect(route('categories.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        
            $category->delete();

            session()->flash('flashMessage','Category deleted successfully.');

            return redirect(route('categories.index'));
      
    }
}
