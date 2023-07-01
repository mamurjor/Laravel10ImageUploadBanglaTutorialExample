<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ImageUploadController extends Controller
{
    //

    public function imageUpload()
    {
        return view('imageUpload');
    }

    public function imageUploadPost(Request $request)
    {
        $request->validate([
            'image' => ['required',
            'image',
            'mimes:jpg,png,jpeg,gif,svg',
            'dimensions:min_width=100,min_height=100,max_width=1000,max_height=1000',
            'max:2048'],
        ]);


    
        $imageName = time().'.'.$request->image->extension();  
     
         $request->image->move(public_path('images'), $imageName);

        // $request->image->storeAs('images', $imageName);
  
        /* Store $imageName name in DATABASE from HERE */
    
        return back()
            ->with('success','You have successfully upload image.')
            ->with('image',$imageName); 
    }


}
