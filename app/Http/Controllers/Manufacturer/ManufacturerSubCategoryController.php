<?php

namespace App\Http\Controllers\Manufacturer;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Validator;

class ManufacturerSubCategoryController extends Controller
{
    public function index(Request $request)
    {
        $subCategories = SubCategory::select('sub_categories.*','categories.name as categoryName')        
                                ->latest('sub_categories.id')
                                ->leftJoin('categories','categories.id','sub_categories.category_id')
                                ->where('categories.seller_id',auth()->user()->id);

        if(!empty($request->get('keyword')))
        {
            $subCategories = $subCategories->where('sub_categories.name','like','%'.$request->get('keyword').'%');
            $subCategories = $subCategories->orWhere('categories.name','like','%'.$request->get('keyword').'%');
        }

        $subCategories = $subCategories-> paginate(10);
        // dd($categories);
        return view('manufacturer.sub_category.list',compact('subCategories'));
    }
    public function create()
    {
        $categories = Category::where("seller_id",auth()->user()->id)->orderBy('name','ASC')->get();
        return view('manufacturer.sub_category.create',compact('categories'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'name' => 'required',
            'status' => 'required',
            'category' => 'required',
            'slug' => 'required|unique:sub_categories',
        ]);

        if($validator->passes())
        {
            $subCategory = new SubCategory();
            $subCategory->name = $request->name;
            $subCategory->slug = $request->slug;    
            $subCategory->status = $request->status;
            $subCategory->showHome = $request->showHome;
            $subCategory->category_id = $request->category;
            $subCategory->save();

            $request->session()->flash('success', 'Sub Category created successfully');

            return response([
                'status' => true,
                'message' => 'Sub Category created successfully',
                ]);
        }
        else
        {
            return response([
            'status' => false,
            'errors' => $validator->errors()
            ]);
        }
    }

    public function edit($id, Request $request)
    {
        $subcategory = SubCategory::find($id);
        if(empty($subcategory))
        {
            $request->session()->flash('error', 'Record not found');
            return redirect()->route('manufacturer.sub-categories.index');
        }



        $categories = Category::orderBy('name','ASC')->get();
        return view('manufacturer.sub_category.edit',compact('categories'),compact('subcategory'));
    }

    public function update($id ,Request $request)
    {
        $subcategory = SubCategory::find($id);
        if(empty($subcategory))
        {
            $request->session()->flash('error', 'Record not found');
            return response([
                'status' => false,
                'notFound' => true,
            ]);
            // return redirect()->route('sub-categories.index');
        } 
        
        $validator = Validator::make($request->all(),[
            'name' => 'required',
            'status' => 'required',
            'category' => 'required',
            // 'slug' => 'required|unique:sub_categories',
            'slug' => 'required|unique:sub_categories,slug,'.$subcategory->id.',id',

        ]);

        if($validator->passes())
        {
            $subcategory->name = $request->name;
            $subcategory->slug = $request->slug;    
            $subcategory->status = $request->status;
            $subcategory->showHome = $request->showHome;
            $subcategory->category_id = $request->category;
            $subcategory->save();

            $request->session()->flash('success', 'Sub Category Updated successfully');

            return response([
                'status' => true,
                'message' => 'Sub Category Updated successfully',
                ]);
        }
        else
        {
            return response([
            'status' => false,
            'errors' => $validator->errors()
            ]);
        }
    }


    public function destroy($id, Request $request)
    {
        $subcategory = SubCategory::find($id);
        if(empty($subcategory))
        {
            $request->session()->flash('error', 'Record not found');
            return response([
                'status' => false,
                'notFound' => true,
            ]);
            // return redirect()->route('sub-categories.index');
        } 

        $subcategory->delete();

        $request->session()->flash('success', 'Sub Categorry deleted successfully');
        return response([
            'status' => true,
            'message' => 'Sub Categorry deleted successfully',
        ]);

    }
}
