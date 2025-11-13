<?php

namespace App\Http\Controllers\services;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Http\Request;
use App\Models\pages\Category;
use App\Models\pages\Service;
use Illuminate\Support\Facades\Storage;

class ServicesController extends Controller
{
    public function loadservices()
    {
        $data = Service::all();
        return view('admin.services.service', compact('data'));
    }
    public function loadaddservice()
    {
        $catgdata = Category::orderBy('id', 'desc')->get();
        return view('admin.services.addservice', compact('catgdata'));
    }
    public function serviceEdit($id)
    {
        $decryptid = Crypt::decrypt($id);
        $catgdata = Category::orderBy('id', 'desc')->get();
        $data = Service::find($decryptid);
        return view('admin.services.editService', compact('data', 'catgdata'));
    }
    public function addservices(Request $request)
    {
        $validation = $request->validate([
            'title' => 'required|string|min:8|unique:services,title',
            'metatitle' => 'required|string|min:8',
            'metakeyword' => 'required|min:10',
            'canonicalurl' => 'required|string',
            'metadesc' => 'required|min:120|max:160',
            'subject' => 'required',
            'description' => 'required',
            'image' => 'required|mimes:jpg,jpeg,png,webp,svg|max:512'
        ], [
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
            $removeSpace = str_replace(' ', '_', $title);
            $finalname = $removeSpace . $datetime . '.' . $extension;

            $path = $file->storeAs('services', $finalname, 'public');
            // image name end

            $data = new Service();
            $data->title = $title;
            $data->user_id = $user_id;
            $data->metatitle = $metatitle;
            $data->metakeyword = $metakeyword;
            $data->service_img = $path;
            $data->canonical = $canonicalurl;
            $data->metadesc    = $metadesc;
            $data->topic = $subject;
            $data->description = $description;

            if ($data->save()) {
                return redirect()->Route('loadservice')->with('message', 'Service added successfully.');
            } else {
                return redirect()->Route('loadservice')->with('error', 'Something Went Wrong.');
            }
        }
    }
    public function updateService(Request $request)
    {
        $id = $request->input('update_id');
        $serdata = Service::find($id);
        $serimage = $serdata->service_img;
        $validation = $request->validate([
            'title' => 'required|string|min:8',
            'metatitle' => 'required|string|min:8',
            'metakeyword' => 'required|min:10',
            'canonicalurl' => 'required|string',
            'metadesc' => 'required|min:120|max:160',
            'subject' => 'required',
            'description' => 'required',
            'image' => 'nullable|mimes:jpg,jpeg,png,webp,svg|max:512'
        ], [
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
            if ($file = $request->file('image')) {
                $file = $request->file('image');
                $date = date('_d_m_y_H_i_s');
                $extension = $file->getClientOriginalExtension();
                $removeSpace = str_replace(" ", "_", $title);
                $customeName = $removeSpace . '' . $date . '.' . $extension;
                $path = $file->storeAs('services', $customeName, 'public');
            } else {
                $path = $serdata->service_img;
            }

            $serdata->title = $request->input('title') ?? $serdata->title;
            $serdata->service_img = $path ?? $serdata->service_img;
            $serdata->metatitle = $request->input('metatitle') ?? $serdata->metatitle;
            $serdata->metakeyword = $request->input('metakeyword') ?? $serdata->metakeyword;
            $serdata->canonical = $request->input('canonicalurl') ?? $serdata->canonical;
            $serdata->metadesc = $request->input('metadesc') ?? $serdata->metadesc;
            $serdata->topic = $request->input('subject') ?? $serdata->topic;
            $serdata->description = $request->input('description') ?? $serdata->description;
            if ($serdata->save()) {
                if ($file = $request->file('image')) {
                    if (Storage::disk('public')->exists($serimage)) {
                        Storage::disk('public')->delete($serimage);
                    }
                }
                return redirect()->Route('loadservice')->with('message', 'Service Updated successfully.');
            } else {
                return redirect()->Route('loadservice')->with('error', 'Something Went Wrong.');
            }
        }
    }
}
