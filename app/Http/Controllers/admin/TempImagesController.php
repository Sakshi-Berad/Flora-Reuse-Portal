<?php

namespace App\Http\Controllers\admin;

// use Image;
use App\Http\Controllers\Controller;
use App\Models\TempImage;
use Illuminate\Http\Request;

class TempImagesController extends Controller
{
    //
        public function create(Request $request)
        {
            
            $image = $request->image;

            // dd($image);
            if(!empty($image))
            {
                $ext = $image->getClientOriginalExtension();
                $newName = time().'.'.$ext;

                $tempImage = new TempImage();
                $tempImage->name = $newName;
                $tempImage->save();
                // dd(public_path().'/temp',$newName);
                // $image->move(public_path().'/temp',$newName);
                $image->move(public_path().'/temp',$newName);

                //generate thumbnail
                // $sourcePath = public_path().'/temp'.$newName;
                // $destPath = public_path().'/temp/thum/'.$newName;
                // $img = Image::make($sourcePath);
                // $image = Image::make($sourcePath);
                // $image->fit(300,275);
                // $image->save($destPath);

                return response()->json([
                    'status' => true,
                    'image_id' => $tempImage->id,
                    'ImagePath' => asset('/temp/'.$newName),
                    'message' => 'Image uploaded successfully'
                ]);
            }
    }
}
