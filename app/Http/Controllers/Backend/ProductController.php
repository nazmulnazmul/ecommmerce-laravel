<?php

namespace App\Http\Controllers\Backend;



use Log;
use File;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Backend\Brand;
use App\Models\Backend\Gallery;
use App\Models\Backend\Product;
use App\Models\Backend\Category;
use Illuminate\Support\Facades\DB;
use App\Models\Backend\SubCategory;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;
// use Intervention\Image\ImageManagerStatic as Image;



class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $all_products = Product::latest()->get();
        return view('admin.product.list', compact('all_products'));
    }



    public function categoryBySubCategory(){

        // return response()->json(SubCategory::where('cat_id', $_GET['id'])->get());
        
        $subCategory = SubCategory::where('cat_id', $_GET['id'])->get();
        return response()->json([
            'success' => true,
            'data' => $subCategory
        ]);

    }



    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $allCats_info = Category::where('cat_status', '1')->latest()->get();
        $allSubCats_info = SubCategory::where('subcat_status', '1')->latest()->get();
        $allBrands = Brand::where('brand_status', '1')->latest()->get();
        return view('admin.product.add', compact('allCats_info','allSubCats_info','allBrands'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
            $validated = $request->validate([
                'cat_id' => 'required',
                'sub_cat_id' => 'required',
                'brand_id' => 'required',
                'name' => 'required',
                'product_code' => 'required',
                'qty' => 'required',
                'regular_price' => 'required',
                'selling_price' => 'required',
                'product_model' => 'required',
                'image' => 'required',
                'product_long_des' => 'required',
                'product_short_des' => 'required',
            ],
            [
                'name.required' => 'Product Name Field is Requrad.',
                'cat_id.required' => 'Category Name Field is Requrad.',
                'sub_cat_id.required' => 'SubCategory Name Field is Requrad.',
                'brand_id.required' => 'Brand Name Field is Requrad.',
                'product_name' => 'This Name is Allready Exist.'
            ]);
            
            if ($request->image) {
                $single_image = $request->file('image');
                $customName = rand().".".$single_image->getClientOriginalExtension();
                $path = "Uploads/Products/".$customName;
                Image::make($single_image)->resize(450,450)->save($path);
    
                $data = [
                    'cat_id' => $request->cat_id,
                    'sub_cat_id'  => $request->sub_cat_id,
                    'brand_id' => $request->brand_id,
                    'name' => $request->name,
                    'product_slug' => Str::slug($request->name),
                    'qty' => $request->qty,
                    'regular_price' => $request->regular_price,
                    'selling_price' => $request->selling_price,
                    'product_code' => $request->product_code,
                    'product_model' => $request->product_model,
                    'product_short_des' => $request->product_short_des,
                    'product_long_des' => $request->product_long_des,
                    'is_popular' => $request->is_popular,
                    'is_featured' => $request->is_featured,
                    'is_new' => $request->is_new,
                    'product_status' => $request->product_status,
                    'image' => $path,
                ];

                if($product =  Product::create($data)){
                    if ($request->image_url) {
                        $images = $request->file('image_url');
        
                        foreach ($images as $image) {
                            
                            $gcustomName = rand().".".$image->getClientOriginalExtension();
                            $Npath = "Uploads/Products/gallery/".$gcustomName;
                            Image::make($image)->resize(300,300)->save($Npath);
        
                            DB::table('galleries')->insert([
                                'product_id' => $product->id,
                                'image_url' => $Npath,
                            ]);
                        }
                    }
                }
            }
    
            return redirect()->route('admin.product.list')->with('message', 'Product Added Successful.');
           
    }

    /**
     * Display the specified resource.
     */
    public function details(string $id)
    {
        $gallery = Gallery::where('product_id', $id)->get();
        $product = Product::find($id);
        return view('admin.product.details', compact('gallery', 'product'));
    }

    public function galleryDelete(string $id)
    {
        $gallery = Gallery::find($id);
        $deleteGallery = $gallery->image_url;

        if (file_exists($deleteGallery)) {
            File::delete($deleteGallery);
        }
        $gallery->delete();
        return back()->with('message', 'Gallery Product Deleted Successful.');

    }

    public function galleryUpdate(Request $request, string $id){

            if ($request->image_url) {
                $images = $request->file('image_url');
                foreach($images as $image){
                    $gcustomName = rand().".".$image->getClientOriginalExtension();
                    $path = "Uploads/Products/gallery/".$gcustomName;
                    Image::make($image)->resize(300,300)->save($path);
                    
                    $gallery = new Gallery();
                    $gallery->product_id = $id;
                    $gallery->image_url = $path;
                    $gallery->save();

                }
            }   
        
        
        return back()->with('message', 'Gallery Product Updated Successful.');
    }


    /**
     * Display the specified resource.
     */
    public function active(string $id)
    {
        // active to inactive
        $product_inactive = Product::find($id);
        if ($product_inactive) {
            $product_inactive->product_status = '0';
            $product_inactive->update();
        }
        return redirect()->route('admin.product.list')->with('message', 'Product Updated Successful.');
        
    }

    public function inActive(string $id){{ 
        //  inactive to active 
        $product_active = Product::find($id);
        if ($product_active) {
            $product_active->product_status = '1';
            $product_active->update();
        }
        return redirect()->route('admin.product.list')->with('message', 'Product Update Successfully.');

     }}
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $all_categories = Category::where('cat_status', '1')->latest()->get();
        $all_sub_category = SubCategory::where('subCat_status', '1')->latest()->get();
        $all_brand = Brand::where('brand_status', '1')->latest()->get();
        
        $product = Product::find($id);
        return view('admin.product.edit', compact('product', 'all_categories','all_sub_category','all_brand'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $product = Product::find($id);
        
        $oldImage = $product->product_image;
        if ($request->product_image) {
            if (file_exists($oldImage)) {
                    File::delete($oldImage);
                }
                
                $single_image = $request->file('product_image');
                $customName = rand().".".$single_image->getClientOriginalExtension();
                $path = "Uploads/Products/".$customName;
                Image::make($single_image)->resize(450,450)->save($path);
            
                $product->cat_id = $request->cat_id;
                $product->sub_cat_id = $request->sub_cat_id;
                $product->brand_id = $request->brand_id;
                $product->name = $request->name;
                $product->product_slug = Str::slug($request->name);
                $product->qty = $request->qty;
                $product->regular_price = $request->regular_price;
                $product->selling_price = $request->selling_price;
                $product->product_code = $request->product_code;
                $product->product_model = $request->product_model;
                $product->product_short_des = $request->product_short_des;
                $product->product_long_des = $request->product_long_des;
                $product->is_popular = $request->is_popular;
                $product->is_featured = $request->is_featured;
                $product->is_new = $request->is_new;
                $product->product_status = $request->product_status;
                $product->image = $path;
                $product->save();
                return redirect()->route('admin.product.list')->with('message', 'Product Update Successfully.');
            }else{
               
                $product->cat_id = $request->cat_id;
                $product->sub_cat_id = $request->sub_cat_id;
                $product->brand_id = $request->brand_id;
                $product->name = $request->name;
                $product->product_slug = Str::slug($request->name);
                $product->qty = $request->qty;
                $product->regular_price = $request->regular_price;
                $product->selling_price = $request->selling_price;
                $product->product_code = $request->product_code;
                $product->product_model = $request->product_model;
                $product->product_short_des = $request->product_short_des;
                $product->product_long_des = $request->product_long_des;
                $product->is_popular = $request->is_popular;
                $product->is_featured = $request->is_featured;
                $product->is_new = $request->is_new;
                $product->product_status = $request->product_status;
                $product->save(); 
                return redirect()->route('admin.product.list')->with('message', 'Product Update Successfully..');
            }
            return redirect()->route('admin.product.edit',$product->id)->with('message', 'Product Not Updated.');
         
    }

    /**
     * Remove the specified resource from storage.
     */
    

    public function destroy(string $id)
    {
        $product = Product::find($id);
        $gallery = Gallery::where('product_id', $id)->get();
        $deleteProduct = $product->product_image;

        if ($product->delete()) {
            if (file_exists($deleteProduct)) {
                    File::delete($deleteProduct);
                }

                foreach($gallery as $item){
                    if (file_exists($item->image_url)) {
                        File::delete($item->image_url);
                    }
                    $item->delete();
                }
            }
        return redirect()->route('admin.product.list')->with('message', 'Product Deleted Successful.');
    }




    
}
