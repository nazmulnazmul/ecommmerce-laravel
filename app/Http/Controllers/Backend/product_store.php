public function store(Request $request)
    {
        // dd($request);
            $validated = $request->validate([
                'cat_id' => 'required',
                'sub_cat_id' => 'required',
                'sub_cat_id' => 'required',
                'brand_id' => 'required',
                'product_name' => 'required',
                'product_quantity' => 'required',
                'product_price' => 'required',
                'product_image' => 'required',
            ],
            [
                'product_name.required' => 'Product Name Field is Requrad.',
                'cat_id.required' => 'Category Name Field is Requrad.',
                'sub_cat_id.required' => 'SubCategory Name Field is Requrad.',
                'brand_id.required' => 'Brand Name Field is Requrad.',
                'product_name' => 'This Name is Allready Exist.'
            ]

        );

        if ($request->product_image) {
            $single_image = $request->file('product_image');
            $customName = rand().".".$single_image->getClientOriginalExtension();
            $path = public_path("Uploads/Products".$customName);
            Image::make($single_image)->resize(450,450)->save($path);

            $pro_id = Product::insertGetId([
                'cat_id' => $request->cat_id,
                'sub_cat_id'  => $request->sub_cat_id,
                'brand_id' => $request->brand_id,
                'product_name' => $request->product_name,
                'product_slug' => Str::slug($request->product_name),
                'product_slug' => $request->product_slug,
                'product_quantity' => $request->product_quatity,
                'product_des' => $request->product_des,
                'product_price' => $request->product_price,
                'product_image' => $customName,
                'image_url' => $request->image_url,
                'product_status' => $request->product_status,
            ]);
        }

        if ($request->image_url) {
                $images = $request->file('image_url');
                foreach ($images as $image) {
                   $gcustomName = rand().".".$images->getClientOriginalExtension();
                   $path = public_path("Uploads/Products/Gallary".$gcustomName);
                   Image::make($images)->resize(300,300)->sace($path);

                    Product::insert([
                        'product_id' => $pro_id,
                        'image_url' => $gcustomName,
                    ]);
                }
            }
        return back()->with('message', 'Product Added Successful.');
    }