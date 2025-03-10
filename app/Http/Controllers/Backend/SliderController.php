<?php

namespace App\Http\Controllers\Backend;

use App\Models\Slider;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $allSliders = Slider::latest()->get();
        return view('admin.slider.list', compact('allSliders'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.slider.add');
    }

    /**
     * Store a newly created resource in storage.
     */

    public function store(Request $request)
        {
            // dd($request);

            $validated = $request->validate([
                'title' => 'required',
                'sort_desc' => 'required',
                'url' => 'required',
                'photo' => 'required'
            ]);

            $path = null; // Define $path to avoid undefined variable error

            if ($request->hasFile('photo')) {
                $SlideryImage = $request->file('photo');
                $customName = rand() . '.' . $SlideryImage->getClientOriginalExtension();
                $path = "Uploads/Slider/" . $customName;
                Image::make($SlideryImage)->resize(850, 450)->save($path);
            }

            $slider = new Slider();
            $slider->title = $request->title;
            $slider->sort_desc = $request->sort_desc;
            $slider->url = $request->url;
            $slider->slider_status = $request->slider_status;
            $slider->photo = $path; // Assign $path (which might be null if no file is uploaded)
            $slider->save();

            return redirect()->route('admin.slider.list')->with('message', 'Slider Added Successfully.');
        }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */

     public function active(string $id)
     {
          // active to inactive
          $slider_active = Slider::find($id);
          if ($slider_active) {
              $slider_active->slider_status = '0';
              $slider_active->update();
          }
          return redirect()->route('admin.slider.list')->with('message', 'Slider Update Successfully.');
  
     }
  
     /**
      * Display the specified resource.
      */
      public function inActive(string $id)
      {
           // inactive to active
           $slider_Inactive = Slider::find($id);
           if ($slider_Inactive) {
               $slider_Inactive->slider_status = '1';
               $slider_Inactive->update();
           }
           return redirect()->route('admin.slider.list')->with('message', 'Slider Update Successfully.');
      }
    public function edit(string $id)
    {
        $slider = Slider::find($id);
        return view('admin.slider.edit', compact('slider'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $slider = Slider::find($id);
        
        if($request->photo){
            if(File::exists(public_path($slider->photo))){
                File::delete(public_path($slider->photo));
             }
             $sliderImage = $request->file('photo');
             $customName = rand().'.'.$sliderImage->getClientOriginalExtension();
             $path = "Uploads/Slider/".$customName;
             Image::make($sliderImage)->resize(850,450)->save($path);
             
             $slider->title = $request->title;
             $slider->sort_desc = $request->sort_desc;
             $slider->url = $request->url;
             $slider->slider_status = $request->slider_status;
             $slider->photo = $path;
             $slider->save();
             return redirect()->route('admin.slider.list')->with('message', 'Slider Update Successfully.');
        }else{
             $slider->title = $request->title;
             $slider->sort_desc = $request->sort_desc;
             $slider->url = $request->url;
             $slider->slider_status = $request->slider_status;
             $slider->save();
             return redirect()->route('admin.slider.list')->with('message', 'Slider Update Successfully.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $slider = Slider::find($id);
        if(File::exists(public_path($slider->photo))){
            File::delete(public_path($slider->photo));
        }
        $slider->delete();
        return redirect()->route('admin.slider.list')->with('message', 'Slider Deleted Successfully.');
    }
}
