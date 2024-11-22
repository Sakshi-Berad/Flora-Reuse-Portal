<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BrandController extends Controller
{
    public function index(Request $request)
    {
        $brands = Brand::latest('id');

        if($request->get('keyword'))
        {
            $brands = $brands->where('name', 'like', '%'.$request->keyword.'%');
        }

        $brands = $brands->paginate(10);
        return view('admin.brand.list',compact('brands'));

    }

    public function create()
    {
        return view('admin.brand.create');
    }

    public function store(Request $request)
    {
        $vallidator = Validator::make($request->all(),[
            'name' => 'required',
            'slug' => 'required|unique:brands',
            'status' => 'required',
        ]);

        if($vallidator->passes())
        {
            $brand = new Brand;
            $brand->name = $request->name;
            $brand->slug = $request->slug;
            $brand->status = $request->status;
            $brand->seller_id = auth()->user()->id;
            $brand->save();

            $request->session()->flash('success','Brand Added Successfully');

            return response()->json([
                'status' => true,
                'message' => 'Brand Added Successfully',
            ]);
        }
        else
        {
            return response()->json([
                'status' => false,
                'errors' => $vallidator->errors(),
            ]);
        }
    }

    public function edit($id, Request $request)
    {
        $brand = Brand::find($id);

        if(empty($brand))
        {
            $request->session()->flash('error', 'Record not found');   
            return redirect()->route('brands.index');
        }

        return view('admin.brand.edit',compact('brand'));
    }

    public function update($id, Request $request)
    {
        $brand = Brand::find($id);

        if(empty($brand))
        {
            $request->session()->flash('error', 'Record not found');   

            return response()->json([
                'status' => false,
                'notFound' => true, 
            ]);
            // return redirect()->route('brands.index');
        }

        $vallidator = Validator::make($request->all(),[
            'name' => 'required',
            'slug' => 'required|unique:brands,slug,'.$brand->id.',id',
            'status' => 'required',
        ]);

        if($vallidator->passes())
        {
            $brand->name = $request->name;
            $brand->slug = $request->slug;
            $brand->status = $request->status;
            $brand->save();

            $request->session()->flash('success','Brand Updated Successfully');

            return response()->json([
                'status' => true,
                'message' => 'Brand Updated Successfully',
            ]);
        }
        else
        {
            return response()->json([
                'status' => false,
                'errors' => $vallidator->errors(),
            ]);
        }
        


    }

    public function destroy($id, Request $request)
    {
        $brands = Brand::find($id);
        if(empty($brands))
        {
            $request->session()->flash('error', 'Record not found');
            return response([
                'status' => false,
                'notFound' => true,
            ]);
            // return redirect()->route('sub-categories.index');
        } 

        $brands->delete();

        $request->session()->flash('success', 'Brand deleted successfully');
        return response([
            'status' => true,
            'message' => 'Brand deleted successfully',
        ]);

    }
    
}
