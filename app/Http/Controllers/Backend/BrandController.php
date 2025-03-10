<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Backend\Brand;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $brands = Brand::latest()->get();
        return view('admin.brand.list', compact('brands'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.brand.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //  dd($request->all());
        $validated = $request->validate([
            'brand_name' => 'required|string|unique:brands',
            'brand_image' => 'required',
            'top_brand' => 'required',
        ],
        [
            'brand_name.required' => 'Brand Name Field is Requrad.',
            'brand_name' => 'This Name is Allready Exist.'
        ]);

        if($request->brand_image){
            $brand_image = $request->file('brand_image');
            $customName = rand().'.'.$brand_image->getClientOriginalExtension();
            $path = "Uploads/Brand/".$customName;
            Image::make($brand_image)->resize(450,450)->save($path);
        }

        $brand = new Brand;
        $brand->brand_name = $request->brand_name;
        $brand->brand_slug = Str::slug($request->brand_name);
        $brand->brand_status = $request->brand_status;
        $brand->brand_image = $path;
        $brand->save();
        return redirect()->route('admin.brand.list')->with('message', 'Brand Added Successful.');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    public function active(string $id)
   {
        // active to inactive
        $brand_active = Brand::find($id);
        if ($brand_active) {
            $brand_active->brand_status = '0';
            $brand_active->update();
        }
        return redirect()->route('admin.brand.list')->with('message', 'Brand Update Successfully.');

   }

   /**
    * Display the specified resource.
    */
    public function inActive(string $id)
    {
         // inactive to active
         $brand_Inactive = Brand::find($id);
         if ($brand_Inactive) {
             $brand_Inactive->brand_status = '1';
             $brand_Inactive->update();
         }
         return redirect()->route('admin.brand.list')->with('message', 'Brand Update Successfully.');
    }
 

    public function changeStatus($id){
        $brand = Brand::find($id);
        // dd($id);
        if($brand->top_brand == 1){
            $brand->update(['top_brand' => 0]);
        }else{
            $brand->update(['top_brand' => 1]);
        }
        return redirect()->route('admin.brand.list')->with('message', 'Top Brand Update Successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $brand = Brand::find($id);
        return view('admin.brand.edit', compact('brand'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
      
        $brand = Brand::find($id);

        if($request->brand_image){

            if(File::exists(public_path($brand->brand_image))){
                File::delete(public_path($brand->brand_image));
            }

            $brand_image = $request->file('brand_image');
            $customName = rand().'.'.$brand_image->getClientOriginalExtension();
            $path = "Uploads/Brand/".$customName;
            Image::make($brand_image)->resize(450,450)->save($path);

            $brand->brand_name = $request->brand_name;
            $brand->brand_slug = Str::slug($request->brand_name);
            $brand->brand_status = $request->brand_status;
            $brand->top_brand = $request->top_brand;
            $brand->brand_image = $path;
            $brand->save();
            return redirect()->route('admin.brand.list')->with('message', 'Brand Update Successful.');
        }else{
            $brand->brand_name = $request->brand_name;
            $brand->brand_slug = Str::slug($request->brand_name);
            $brand->brand_status = $request->brand_status;
            $brand->save();
            return redirect()->route('admin.brand.list')->with('message', 'Brand Update Successful.');
        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $brand = Brand::find($id);
        // dd($brand);
        if(File::exists(public_path($brand->brand_image))){
            file::delete(public_path($brand->brand_image));
        }
        
        $brand->delete();
        
        return redirect()->route('admin.brand.list')->with('message', 'Brand Deleted Successful.');
    }
}
