<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Backend\Category;
use App\Models\Backend\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class SubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $allSubCat = SubCategory::latest()->get();
        return view('admin.subcategory.list', compact('allSubCat'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $cat_info = Category::where('cat_status', '1')->latest()->get();
        return view('admin.subcategory.add', compact('cat_info'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'cat_id' => 'required',
            'subCat_name' => 'required',
        ],
        [
            'subCat_name' => 'Sub Category Name Field Requred.'
        ]);

        $subCategory = new SubCategory();
        $subCategory->cat_id = $request->cat_id;
        $subCategory->subCat_name = $request->subCat_name;
        $subCategory->subCat_slug = Str::slug($request->subCat_name);
        $subCategory->subCat_status = $request->subCat_status;
        $subCategory->save();
        return redirect()->route('admin.subcategory.list')->with('message', 'Sub Category Added Successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function active(string $id)
   {
        // active to inactive
        $category_active = SubCategory::find($id);
        if ($category_active) {
            $category_active->subCat_status = '0';
            $category_active->update();
        }
        return redirect()->route('admin.subcategory.list')->with('message', 'Sub Category Update Successfully.');

   }

   /**
    * Display the specified resource.
    */
    public function inActive(string $id)
    {
         // inactive to active
         $category_Inactive = SubCategory::find($id);
         if ($category_Inactive) {
             $category_Inactive->subCat_status = '1';
             $category_Inactive->update();
         }
         return redirect()->route('admin.subcategory.list')->with('message', 'Sub Category Update Successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $sub_cat_info = SubCategory::find($id);
        $allCats = Category::where('cat_status', '1')->latest()->get();
        return view('admin.subcategory.edit', compact('sub_cat_info', 'allCats'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $subCategory = SubCategory::find($id);
        $subCategory->cat_id = $request->cat_id;
        $subCategory->subCat_name = $request->subCat_name;
        $subCategory->subCat_slug = Str::slug($request->subCat_name);
        $subCategory->subCat_status = $request->subCat_status;
        $subCategory->save();
        return redirect()->route('admin.subcategory.list')->with('message', 'Sub Category Updated Successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $subCategory = SubCategory::find($id);
        if ($subCategory) {
            $subCategory->delete();
        }
        return redirect()->route('admin.subcategory.list')->with('message', 'Sub Category Deleted Successfully.');
    }
}
