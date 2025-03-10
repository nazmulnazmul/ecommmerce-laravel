<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Backend\Category;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\File;
use Illuminate\Validation\Rules\Can;
use Intervention\Image\Facades\Image;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $allCategores = Category::latest()->get();
        return view('admin.category.list', compact('allCategores'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.category.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $validated = $request->validate([
            'cat_name' => 'required|unique:categories',
            'cat_image' => 'required',
        ],
        [
            'cat_name.required' => 'Category Name Field is Requrad.',
            'cat_name' => 'This Name is Allready Exist.'
        ]);

        if($request->cat_image){
            $categoryImage = $request->file('cat_image');
            $customName = rand().'.'.$categoryImage->getClientOriginalExtension();
            $path = "Uploads/Category/".$customName;
            Image::make($categoryImage)->resize(450,450)->save($path);
        }

        $category = new Category;
        $category->cat_name = $request->cat_name;
        $category->cat_slug = Str::slug($request->cat_name);
        $category->cat_status = $request->cat_status;
        $category->cat_image = $path;
        $category->save();
        return redirect()->route('admin.category.list')->with('message', 'Category Added Successfully.');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        
    }

    /**
    * Display the specified resource.
    */
   public function active(string $id)
   {
        // active to inactive
        $category_active = Category::find($id);
        if ($category_active) {
            $category_active->cat_status = '0';
            $category_active->update();
        }
        return redirect()->route('admin.category.list')->with('message', 'Category Update Successfully.');

   }

   /**
    * Display the specified resource.
    */
    public function inActive(string $id)
    {
         // inactive to active
         $category_Inactive = Category::find($id);
         if ($category_Inactive) {
             $category_Inactive->cat_status = '1';
             $category_Inactive->update();
         }
         return redirect()->route('admin.category.list')->with('message', 'Category Update Successfully.');
    }
 

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $category = Category::find($id);
        return view('admin.category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $category = Category::find($id);

        if($request->cat_image){
            if(File::exists(public_path($category->cat_image))){
                File::delete(public_path($category->cat_image));
             }
             $categoryImage = $request->file('cat_image');
             $customName = rand().'.'.$categoryImage->getClientOriginalExtension();
             $path = "Uploads/Category/".$customName;
             Image::make($categoryImage)->resize(450,450)->save($path);
             
             $category->cat_name = $request->cat_name;
             $category->cat_slug = Str::slug($request->cat_name);
             $category->cat_status = $request->cat_status;
             $category->cat_image = $path;
             $category->save();
             return redirect()->route('admin.category.list')->with('message', 'Category Update Successfully.');
        }else{
            $category->cat_name = $request->cat_name;
             $category->cat_slug = Str::slug($request->cat_name);
             $category->cat_status = $request->cat_status;
             $category->save();
             return redirect()->route('admin.category.list')->with('message', 'Category Update Successfully.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $category = Category::find($id);
        if (File::exists(public_path($category->cat_image))) {
            File::delete(public_path($category->cat_image));
        }
        $category->delete();
        return redirect()->route('admin.category.list')->with('message', 'Category Deleted Successfully.');
    }

    
}
