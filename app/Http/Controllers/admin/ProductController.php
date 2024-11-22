<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\SubCategory;
use App\Models\TempImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;


class ProductController extends Controller
{

    public function index(Request $request)
    {
         $products = Product::latest('id')->with('product_images');

         if($request->get('keyword') != "")
         {
            $products = $products->where('title','like','%'.$request->get('keyword').'%');
         }
         $products = $products->paginate(10);
        //  dd($products);
        return view('admin.products.list',compact('products'));
    }
    

    public function create()
    {
        $categories = Category::orderBy('name', 'ASC')->get();
        $brands = Brand::orderBy('name', 'ASC')->get();
        
        return view('admin.products.create',compact('categories'),compact('brands'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'slug' => 'required|unique:products',
            'price' => 'required|numeric',
            'sku' => 'required|unique:products',
            'track_qty' => 'required|in:Yes,No',
            'category' => 'required|numeric',
            'is_featured' => 'required|in:Yes,No',
        ]);

        if(!empty($request->track_qty)&&($request->track_qty== 'Yes'))
        {
            $request->validate([
                'qty' => 'required|numeric',
            ]);
        }

        $product = new Product();
        $product->title = $request->title;
        $product->slug = $request->slug;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->compare_price = $request->compare_price;
        $product->sku = $request->sku;
        $product->barcode = $request->barcode;
        $product->track_qty = $request->track_qty;
        $product->title = $request->title;
        $product->title = $request->title;
        $product->qty = $request->qty;
        $product->status = $request->status;
        $product->category_id = $request->category;
        $product->sub_category_id = $request->sub_category;
        $product->brand_id = $request->brand;
        $product->is_featured = $request->is_featured;
        $product->short_description = $request->short_description;
        $product->shipping_returns = $request->shipping_returns;
        $product->related_products = (!empty($request->related_products) ? implode(',',$request->related_products) : '');
        $product->save();

        
        if($request->product_images)
        {
            $files = $request->file('product_images');

            foreach ($files as $file) {
                $uniqueFileName = Str::uuid()->toString() . '.' . $file->getClientOriginalExtension();

                $file->move(env("PUBLIC_PATH_HTML").'/uploads/products', $uniqueFileName);

                $sPath = env("PUBLIC_PATH_HTML").'/uploads/products/'.$uniqueFileName;


                $productImage = new ProductImage();
                $productImage->product_id = $product->id;
                $productImage->image = 'NULL';
                $productImage->save();

                $imageName = $uniqueFileName;
                $productImage->image = $imageName;
                $productImage->save();

                // Generate product thumbnails

                // large image 

                $sourcPath = env("PUBLIC_PATH_HTML").'/uploads/products/'.$uniqueFileName;
                $destPath = env("PUBLIC_PATH_HTML").'/uploads/products/large/'.$imageName;

                // \uploads\products\large
                $image = Image::make($sourcPath);
                    
                $image->resize(1400, null, function ($constraint) {
                    $constraint->aspectRatio();
                });
                 
                $image->save($destPath);
                    
                    
                // Small image  *******************************
                $destPath = env("PUBLIC_PATH_HTML").'/uploads/products/small/'.$imageName;
                // \uploads\products\small
                $image = Image::make($sourcPath);
                $image->fit(300,300);
                $image->save($destPath);

                File::delete(env("PUBLIC_PATH_HTML").'/uploads/products/'.$imageName);
            }

        }
        
        $request->session()->flash('success', 'Product added successfully');
        return redirect()->route('products.index');
       
    }

    public function edit($id , Request $request)
    {
        $product = Product::find($id);

        if(empty($product))
        {
            $request->session()->flash('error', 'Product not found');
            return redirect()->route('products.index')->with('error', 'Product not found');
        }

        // Fetch products Images *******

        $productImages = ProductImage::where('product_id',$product->id)->get();

        // Fetch related products 

        $relatedProducts=[];
        if($product->related_products != '')
        {
            $productArray = explode(',',$product->related_products);

            $relatedProducts = Product::whereIn('id',$productArray)->with('product_images')->get();
        }

        //End 

        $subCategories = SubCategory::where('category_id', $product->category_id)->get();
        // dd($product);
        $categories = Category::orderBy('name', 'ASC')->get();
        $brands = Brand::orderBy('name', 'ASC')->get();

        return view('admin.products.edit',compact('categories'),compact('brands'))
                                                        ->with('product',$product)
                                                        ->with('subCategories',$subCategories)
                                                        ->with('relatedProducts',$relatedProducts)
                                                        ->with('productImages',$productImages);
    }

    public function update($id, Request $request)
    {
        $product = Product::find($id);

        $request->validate([
            'title' => 'required',
            'slug' => 'required|unique:products,slug,'.$product->id.',id',
            'price' => 'required|numeric',
            'sku' => 'required|unique:products,sku,'.$product->id.',id',
            'track_qty' => 'required|in:Yes,No',
            'category' => 'required|numeric',
            'is_featured' => 'required|in:Yes,No',
        ]);

        if(!empty($request->track_qty)&&($request->track_qty== 'Yes'))
        {
            $request->validate([
                'qty' => 'required|numeric',
            ]);
        }

        // $validatore = validator::make($request->all(),$rules);
        
        
            $product->title = $request->title;
            $product->slug = $request->slug;
            $product->description = $request->description;
            $product->price = $request->price;
            $product->compare_price = $request->compare_price;
            $product->sku = $request->sku;
            $product->barcode = $request->barcode;
            $product->track_qty = $request->track_qty;
            $product->title = $request->title;
            $product->title = $request->title;
            $product->qty = $request->qty;
            $product->status = $request->status;
            $product->category_id = $request->category;
            $product->sub_category_id = $request->sub_category;
            $product->brand_id = $request->brand;
            $product->is_featured = $request->is_featured;
            $product->short_description = $request->short_description;
            $product->shipping_returns = $request->shipping_returns;
            $product->related_products = (!empty($request->related_products) ? implode(',',$request->related_products) : '');
            $product->save();

            // Save gallery 

            if($request->product_images)
            {
                $files = $request->file('product_images');
    
                foreach ($files as $file) {
                    $uniqueFileName = Str::uuid()->toString() . '.' . $file->getClientOriginalExtension();
    
                    $file->move(env("PUBLIC_PATH_HTML").'/uploads/products', $uniqueFileName);
    
                    $sPath = env("PUBLIC_PATH_HTML").'/uploads/products/'.$uniqueFileName;
    
    
                    $productImage = new ProductImage();
                    $productImage->product_id = $product->id;
                    $productImage->image = 'NULL';
                    $productImage->save();
    
                    $imageName = $uniqueFileName;
                    $productImage->image = $imageName;
                    $productImage->save();
    
                    // Generate product thumbnails
    
                    // large image 
    
                    $sourcPath = env("PUBLIC_PATH_HTML").'/uploads/products/'.$uniqueFileName;
                    $destPath = env("PUBLIC_PATH_HTML").'/uploads/products/large/'.$imageName;
    
                    // \uploads\products\large
                    $image = Image::make($sourcPath);
                        
                    $image->resize(1400, null, function ($constraint) {
                        $constraint->aspectRatio();
                    });
                     
                    $image->save($destPath);
                        
                        
                    // Small image  *******************************
                    $destPath = env("PUBLIC_PATH_HTML").'/uploads/products/small/'.$imageName;
                    // \uploads\products\small
                    $image = Image::make($sourcPath);
                    $image->fit(300,300);
                    $image->save($destPath);
    
                    File::delete(env("PUBLIC_PATH_HTML").'/uploads/products/'.$imageName);
                }
    
            }

            $request->session()->flash('success', 'Product Updated successfully');
            return redirect()->route('products.index');

    }

    public function destroy($id, Request $request)
    {   
        $product = Product::find($id);

        if(empty($product))
        {
        $request->session()->flash('error','Product Not Found');

            return response()->json([
                'status' => false,
                'notFound' => true,
            ]);
        }

        $productImages = ProductImage::where('product_id', $id)->get();

        if(!empty($productImages))
        {
            foreach ($productImages as $productImage) 
            {
                File::delete(env("PUBLIC_PATH_HTML").'/uploads/products/large/'.$productImage->image);
                File::delete(env("PUBLIC_PATH_HTML").'/uploads/products/small/'.$productImage->image);
            }

            ProductImage::where('product_id', $id)->delete();
        }
 
        $product->delete();

        $request->session()->flash('success','Product deleted successfully');
        return response()->json([
            'status' => true,
            'message' => 'Product deleted successfully',
        ]);
    }

    public function getProducts(Request $request) 
    {
        $tempProduct=[];
        if($request->term != "")
        {
            $products = Product::where('title','like','%'.$request->term.'%')->get();

            if($products != null)
            {
                foreach ($products as $product) 
                {
                    $tempProduct[] = array('id' => $product->id, 'text' => $product->title);
                }
            }
        }
        return response()->json([
            'tags' => $tempProduct,
            'status' => true,
        ]);
    }
}
