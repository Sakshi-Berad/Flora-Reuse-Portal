<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\TempImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Facades\Image;


class CategoryController extends Controller
{
    public function index(Request $request)
    {
        $categories = Category::latest();
        if(!empty($request->get('keyword')))
        {
            $categories = $categories->where('name','like','%'.$request->get('keyword').'%');
        }
        $categories = $categories-> paginate(10);
        // dd($categories);
        return view('admin.category.list',compact('categories'));
    }//end index()
    
    public function create()
    {
        return view('admin.category.create');

    } // end create()

    public function store(Request $request)
    {

        // Validate the request
        $request->validate([
            'name' => 'required',
            'slug' => 'required|unique:categories',
            'category_image' => 'required|file|mimes:jpeg,png,pdf,jpg|max:2048', // Adjust validation rules as needed
        ]);

        $category = new Category();
            $category->name = $request->name;
            $category->slug = $request->slug;
            $category->status = $request->status;
            $category->showHome = $request->showHome;
            $category->seller_id = auth()->user()->id;
            $category->save();

        $request->session()->flash('success','Category added successfully');


        // Handle file upload
        if ($request->file('category_image')->isValid()) {
            $file = $request->file('category_image');
            $filename = time() . '_' . $file->getClientOriginalName();

            // env("PUBLIC_PATH_HTML")

            $file->move(env("PUBLIC_PATH_HTML").'/uploads/category', $filename);
            
            $sPath = env("PUBLIC_PATH_HTML").'/uploads/category/'.$filename;


            // Generate image thumbnail

             $dPath = env("PUBLIC_PATH_HTML").'/uploads/category/thumb/'.$filename;
             $img = Image::make($sPath);
             $img->resize(450, 600);
             $img->save($dPath);



            $category->image = $filename;
            $category->save();
        }

        return redirect()->route('categories.index');

    } // end store()

    public function edit($id, Request $request)
    {

        $category = Category::find($id);

        if(empty($category))
        {
            return redirect()->route('categories.index');
        }

        return view('admin.category.edit',compact('category'));

        
    } // end edit()

    public function update($id, Request $request)
    {

        // dd($request->all());
        
        $category = Category::find($id);


        if(empty($category))
        {
            return redirect()->route('categories.index');
        }

        $request->validate([
            'name' => 'required',
            'slug' => 'required|unique:categories,slug,'.$category->id.',id',
            'category_image' => 'file|mimes:jpeg,png,pdf|max:2048', // Adjust validation rules as needed
        ]);

                $category->name = $request->name;
                $category->slug = $request->slug;
                $category->status = $request->status;
                $category->showHome = $request->showHome;
                $category->save();
                
                $request->session()->flash('success','Category added successfully');

            if($request->category_image)
            {
                $oldImage = $category->image;

                if ($request->file('category_image')->isValid()) {
                    $file = $request->file('category_image');
                    $filename = time() . '_' . $file->getClientOriginalName();
        
                    // $file->move(env("PUBLIC_PATH_HTML").'/uploads/category/',$filename);
                    $file->move(env("PUBLIC_PATH_HTML").'/uploads/category', $filename);
                    
                    $sPath = env("PUBLIC_PATH_HTML").'/uploads/category/'.$filename;
        
        
                    // Generate image thumbnail
        
                     $dPath = env("PUBLIC_PATH_HTML").'/uploads/category/thumb/'.$filename;
                     $img = Image::make($sPath);
                     $img->resize(450, 600);
                     $img->save($dPath);
    
        
                    $category->image = $filename;
                    $category->save();


                    File::delete(env("PUBLIC_PATH_HTML").'/uploads/category/'.$oldImage);
                    File::delete(env("PUBLIC_PATH_HTML").'/uploads/category/thumb/'.$oldImage);
                }
                
            }
            return redirect()->route('categories.index');

    } // end update()

    public function destroy($id ,Request $request)
    {

        $category = Category::find($id);

        if(empty($category))
        {
            $request->session()->flash('error','Category Not Found');

            return response()->json([
                'status' => true,
                'message' => 'Category Not Found',
            ]);
            // return redirect()->route('category.index');
        }

        File::delete(env("PUBLIC_PATH_HTML").'/uploads/category/'.$category->image);
        File::delete(env("PUBLIC_PATH_HTML").'/uploads/category/thumb/'.$category->image);

        $category->delete();

        $request->session()->flash('success', 'Category Deleted successfully');
        return response()->json([
            'status' => true,
            'message' => 'Category Deleted successfully'
        ]); 

    } // end destroy()
}
