<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Slider;
use Illuminate\Http\Request;
use App\Models\Backend\Brand;
use App\Models\Backend\Gallery;
use App\Models\Backend\Product;
use App\Models\Backend\Category;
use App\Models\Backend\SubCategory;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    
    public function index(){

        $sliders = Slider::latest()
                        ->where('slider_status', 1)
                        ->get();
        // dd($slider);

        $ncategories = Category::with('subCategories')
                            ->orderBy('id', 'desc')
                            ->where('cat_status', 1)
                            ->get();

        // dd($categories->toArray());
        
        $brands = Brand::where('brand_status', 1)
                        ->orderBy('id', 'desc')->get();

        $featuredProducts = Product::where('product_status', 1)
                                    ->where('is_featured', 1)->orderBy('id', 'desc')
                                    ->take(6)->get();

        $pupolarProducts = Product::where('product_status', 1)->where('is_popular', 1)
                                    ->orderBy('id', 'desc')->take(6)->get();

        $newArrivals = Product::where('product_status', 1)->where('is_new', 1)
                                ->orderBy('id', 'desc')->take(6)->get();
        
        return view('frontend.home.index', 
        compact('sliders','ncategories','brands', 'pupolarProducts', 'featuredProducts', 'newArrivals'));
    }

    // search product
    public function searchProduct(Request $request){

        if($request->search){
            $searchProduct = Product::where('name', 'LIKE', '%'.$request->search.'%')->latest()->get();
 
            return view('frontend.search.search', compact('searchProduct'));
        }else{
            return redirect()->back()->with('message', 'Product not Found !!');
        }
    }

    public function category($id){
        $ncategories = Category::orderBy('id', 'desc')
                                ->where('cat_status', 1)->get();
        // return $categories;             
        $brands = Brand::where('brand_status', 1)
                        ->orderBy('id', 'desc')->get();

        $cat_id = Category::where('cat_slug', $id)->pluck('id');
      
        $products = Product::where('cat_id', $cat_id)->orderBy('id', 'desc')
                            ->where('product_status', 1)->get();
        //   dd($products );
        return view('frontend.category.category', compact('products', 'ncategories', 'brands'));
    }

    public function subCategory($id){
        
        $subCat_id = SubCategory::where('subCat_slug', $id)->pluck('id');

        $ncategories = Category::orderBy('id', 'desc')
                                ->where('cat_status', 1)->get();
        // return $categories;
        $brands = Brand::where('brand_status', 1)
                        ->orderBy('id', 'desc')->get();
        
        $products = Product::where('sub_cat_id', $subCat_id)->orderBy('id', 'desc')
                            ->where('product_status', 1)->get();
        
        return view('frontend.subCategory.subcategory', compact('ncategories', 'brands','products'));
    }

    public function brand($id){
        $brand_id = Brand::where('brand_slug', $id)->pluck('id');

        $ncategories = Category::orderBy('id', 'desc')
                                ->where('cat_status', 1)->get();
        // return $categories;
        $brands = Brand::where('brand_status', 1)
                        ->orderBy('id', 'desc')->get();

        $products = Product::where('brand_id', $brand_id)->orderBy('id', 'desc')
                            ->where('product_status', 1)->get();

        return view('frontend.brand.brand', compact('ncategories', 'brands', 'products'));
    }

    public function shop(){
        $ncategories = Category::orderBy('id', 'desc')
                                ->where('cat_status', 1)->get();
        // return $categories;             
        $brands = Brand::where('brand_status', 1)
                        ->orderBy('id', 'desc')->get();


        $allProducts = Product::where('product_status', 1)
                                ->orderBy('id', 'desc')->get();
        // dd($allProducts);
        return view('frontend.shop.shop', compact('ncategories', 'brands', 'allProducts'));
    }

    public function details($id){

        $product = Product::find($id);
        $galleryes = Gallery::where('product_id', $id)->get();
        // return $galleryes;
        return view('frontend.details.details', compact('product', 'galleryes'));
    }

    
    public function contact(){
        return view('frontend.contact.contact');
    }


    public function ajaxSearchProductPrice(Request $request){
        $price = (float) $request->input;
        $allProducts = Product::where('selling_price','<',  $price)
            ->with('cat')
            ->get()
            ->map(function ($product) {
                $product->image = asset( $product->image); // Prepend base URL
                return $product;
            });
        // return view('frontend.category.category', compact('allProducts'))->render();
        return response()->json([
            'success' => true,
            'products' => $allProducts
        ]);
    }


    public function ajaxSortPrice(Request $request){
        // return 'ok';

        // dd($request->sort_by);
        $allProducts = null;
        if($request->sort_by == 'lowest_price'){
            $allProducts = Product::orderBy('selling_price',  'ASC')
            ->with('cat')
            ->get()
            ->map(function ($product) {
                $product->image = asset( $product->image); // Prepend base URL
                return $product;
            });
            // dd($allProdicts);
        }


        if($request->sort_by == 'height_price'){
            $allProducts = Product::orderBy('selling_price', 'DESC')
            ->with('cat')
            ->get()
            ->map(function ($product) {
                $product->image = asset( $product->image); // Prepend base URL
                return $product;
            });
        }

        return response()->json([
            'success' => true,
            'products' => $allProducts
        ]);


    }

    public function ajaxPoductSearch(){

        $text = $_GET['text'];
        $products = Product::where('name', 'LIKE', "%{$text}%")
        ->with('cat')
        ->get()
        ->map(function ($product) {
            $product->image = asset( $product->image); // Prepend base URL
            return $product;
        });

        return response()->json($products); // Ensure JSON response
        

    }

    public function ajaxCheckBrand(Request $request){

        $brandId = $request->input('id');
        $isChecked = $request->input('checkbox');
        // dd($isChecked);
        if($isChecked){
            $products = Product::where('brand_id', $brandId)
            ->with('cat')
            ->get()
            ->map(function ($product) {
                $product->image = asset( $product->image); // Prepend base URL
                return $product;
            });

            return response()->json([
                'success' => true,
                'products' => $products
            ]); 
        }else{
            return response()->json([
                'success' => false,
                'products' => []
            ]); 
        }

    }


}
