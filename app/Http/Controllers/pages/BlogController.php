<?php

namespace App\Http\Controllers\pages;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\pages\Category;
use App\Models\pages\BlogModel;

class BlogController extends Controller
{
    public function load_vlog(){
        $catgdata = Category::orderBy('id', 'desc')->get();
        $blogdata = BlogModel::orderBy('id', 'desc')->paginate(10);
        return view('admin.pages.blogs',compact('catgdata','blogdata'));
    }
    public function addBlog(){
        $catgdata = Category::orderBy('id', 'desc')->get();
        return view('admin.pages.addBlog',compact('catgdata'));
    }
    public function add_blog(Request $request){
        // return $request->input();
        // exit;
        $validation = $request->validate([
            'title' => 'required|string|max:255|unique:blog,title',
            'metatitle' => 'required|string|max:255',
            'metakeyword' => 'required|string|max:255',
            'canonicalurl' => 'required|string|max:255',
            'metadesc' => 'required|string|max:160',
            'subject' => 'required|string|max:255',
            'description' => 'required|string',
            'productimg'=>'required|mimes:jpg,jpeg,png,svg|max:300'
        ],[
            'required' => 'Please fill this feild.',
            'string' => 'Your input must be in string.',
            'max' => 'Maximum input is 255',
            'mimes' => 'Your image must be JPG, PNG, SVG',
            'productimg.max' => 'Image size must be under 300KB'
        ]);

        try{
            if($validation == true){
                $file = $request->file('productimg');
                // $extension = $file->getClientOriginalName();
                $extension = $file->getClientOriginalExtension();
                $title = $request->input('title');
                $datetime = date('d_m_Y_H_i_s');
                $removeSpace = str_replace(' ','_',$title);
                $finalname = $removeSpace.$datetime.'.'.$extension;

                $path = $file->storeAs('blog',$finalname,'public');

                $data = new BlogModel;
                $data->title = $title;
                $data->metatitle = $request->input('metatitle');
                $data->blog_img = $path;
                $data->metakeyword = $request->input('metakeyword');
                $data->canonical = $request->input('canonicalurl');
                $data->metadesc = $request->input('metadesc');
                $data->topic = $request->input('subject');
                $data->description = $request->input('description');

                if($data->save()){
                    return redirect()->route('blog')->with('message','Success!! Blog added successfully.');
                }else{
                    return redirect()->route('blog')->with('error','Error!, Something went wrong please wait for sometime.');
                }
                
            }else{
                return 'something went wrong please check the code';
            }
        }
        catch (\Exception $e) {
                \Log::error('Error retrieving input: ' . $e->getMessage());

                return response()->json([
                    'message' => 'An error occurred while processing the request.',
                    'error' => $e->getMessage()
                ], 500);
            }
    }
}
