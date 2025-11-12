<?php

namespace App\Http\Controllers\services;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\pages\Category;
use App\Models\pages\Service;

class ServicesController extends Controller
{
    public function loadservices(){
        $data = Service::all();
        return view('admin.services.service',compact('data'));
    }
    public function loadaddservice(){
        $catgdata = Category::orderBy('id', 'desc')->get();
        return view('admin.services.addservice',compact('catgdata'));
    }
    public function addservices(Request $request){
        $validation = $request->validate([
            'title' => 'required|string|min:8|unique:services,title',
            'metatitle' => 'required|string|min:8',
            'metakeyword' => 'required|min:10',
            'canonicalurl' => 'required|string',
            'metadesc' => 'required|min:120|max:160',
            'subject' => 'required',
            'description' => 'required',
            'image' => 'required|mimes:jpg,jpeg,png,webp,svg|max:512'
        ],[
            'required' => 'This :attribute is required.',
            'title.unique' => 'This title is already taken.',
            'title.min' => 'The title must be at least 8 characters long.',
            'metatitle.min' => 'The meta title must be at least 8 characters long.',
            'metakeyword.min' => 'The meta keywords must be at least 10 characters long.',
            'metadesc.min' => 'The meta description must be at least 120 characters long.',
            'metadesc.max' => 'The meta description cannot exceed 160 characters.',
            'image.mimes' => 'The image must be a file of type: jpg, jpeg, png, webp, or svg.',
            'image.max' => 'The image size must not exceed 512 KB.',
        ]);
        if ($validation) {
            $title = $request->input('title');
            $metatitle = $request->input('metatitle');
            $metakeyword = $request->input('metakeyword');
            $canonicalurl = $request->input('canonicalurl');
            $metadesc = $request->input('metadesc');
            $subject = $request->input('subject');
            $description = $request->input('description');
            $user_id = session()->get('id');
            // image name
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $title = $request->input('title');
            $datetime = date('_d_m_Y_H_i_s');
            $removeSpace = str_replace(' ','_',$title);
            $finalname = $removeSpace.$datetime.'.'.$extension;

            $path = $file->storeAs('services',$finalname,'public');
            // image name end

            $data = new Service();
            $data->title = $title;
            $data->user_id = $user_id;
            $data->metatitle = $metatitle;
            $data->metakeyword = $metakeyword;
            $data->service_img = $path;
            $data->canonical = $canonicalurl;
            $data->metadesc	= $metadesc;
            $data->topic = $subject;
            $data->description = $description;

            if($data->save()) {
                return redirect()->Route('loadservice')->with('message', 'Service added successfully.');
            } else {
                return redirect()->Route('loadservice')->with('error', 'Something Went Wrong.');
            }
        }

    }
}
