<?php

namespace App\Http\Controllers\pages;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\pages\Category;
use App\Models\pages\BlogModel;
use Illuminate\Support\Facades\Storage;
use session;

// require_once app_path('Helper/firseHelper.php');
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
    public function edit_blog($id){
        $catgdata = Category::orderBy('id', 'desc')->get();
        $BlogModel = BlogModel::find($id);
        return view('admin.pages.editBlog',compact('catgdata','BlogModel'));
    }
    public function update_blog(Request $request){
        $title =  $request->input('title');
        $metatitle =  $request->input('metatitle');
        $metakeyword =  $request->input('metakeyword');
        $canonicalurl =  $request->input('canonicalurl');
        $metadesc =  $request->input('metadesc');
        $subject =  $request->input('subject');
        $description =  $request->input('description');
        $id = $request->input('blog_id');
        // get data by blog table
        $blogdata = BlogModel::find($id);
        $oldimage = $blogdata->blog_img;
        if($blogdata){
            $validation = $request->validate([
                'title' => 'required|string|max:255',
                'metatitle' => 'required|string|max:255',
                'metakeyword' => 'required|string|max:255',
                'canonicalurl' => 'required|string|max:255',
                'metadesc' => 'required|string|max:160',
                'subject' => 'required|string|max:255',
                'description' => 'required|string',
                'productimg'=> 'nullable|mimes:jpg,jpeg,png,svg|max:300',
            ],[
                'required' => 'Please fill this feild.',
                'string' => 'Your input must be in string.',
                'max' => 'Maximum input is 255',
                'mimes' => 'Your image must be JPG, PNG, SVG',
                'productimg.max' => 'Image size must be under 300KB'
            ]);

            if($validation){
                if($request->hasFile('productimg')){
                    $file = $request->file('productimg');
                    $date = date('d_m_y_H_i_s');
                    $extension = $file->getClientOriginalExtension();
                    $removeSpace = str_replace(" ","_", $title);
                    $customeName = $removeSpace.''.$date.'.'.$extension;
                    $path = $file->storeAs('blog',$customeName,'public');
                }else{
                    $path = $blogdata->blog_img;
                }

                $blogdata->title = $title ?? $blogdata->title;
                $blogdata->blog_img = $path ?? $blogdata->blog_img;
                $blogdata->metatitle = $metatitle ?? $blogdata->metatitle;
                $blogdata->metakeyword = $metakeyword ?? $blogdata->metakeyword;
                $blogdata->canonical = $canonicalurl ?? $blogdata->canonical;
                $blogdata->metadesc = $metadesc ?? $blogdata->metadesc;
                $blogdata->topic = $subject ?? $blogdata->topic;
                $blogdata->description = $description ?? $blogdata->description;

                if($blogdata->save()){
                    if($request->hasFile('productimg')){
                        if(Storage::disk('public')->exists($oldimage)){
                            Storage::disk('public')->delete($oldimage);
                        }
                    }
                    return redirect()->route('blog')->with('message','Success!! Blog Updated successfully.');
                }else{
                    return redirect()->route('blog')->with('error','Error!, Something went wrong please wait for sometime.');

                }
                
            }else{
                return redirect()->route('blog')->with('error','Error!, Something went wront with validation');
            }
        }else{
            return redirect()->route('blog')->with('error','Error!, No data Found');

        }
        

    }
    public function deleteBlog(Request $request){
        $id = $request->input('id');
        $data = BlogModel::find($id);
        $image = $data->blog_img;

        if($data->delete()){
            if($image){
                if(Storage::disk('public')->exists($image)){
                    Storage::disk('public')->delete($image);
                }
            }
            return response()->json([
                'success' => true,
                'message' => 'Delete successfully! you deleted '.$data->title . '.',
            ]);
        }
    }
    public function status_chnage(Request $request){
        $sta = '';
        $id = $request->input('id');
        $data = BlogModel::find($id);

        $sta = ($data->blogstatus === 0) ? 1 : 0;
        $data->blogstatus = $sta;
        $data->save();
        
    }

    // for rksk  only 
    public function dummy(){
        return view('dummy');
    }
    public function dummypg(Request $request){
        $user_id = session('id') ?? '';
        $user_name = session('name') ?? '';
        $ip = $_SERVER['REMOTE_ADDR'?? ''];
        $search_string = $request->input('searchString') ?? '';
        $download_type = $request->input('pathAfter') ?? '';
        $start_time = $start_time ?? '';
        $start_time = $start_time ?? '';

	
// user_id===
// name====
// search_string ====
// user_ip====
// download_type ====
// start_time
// end_time
// diffrence_in_ms
// pdf_url
// excel_url
// date


    }
    // end rksk here


    public function helper_data(){
        $title = "this data send by helper for testing";
        $blog_img = "this data send by helper for testing";
        $metatitle = "this data send by helper for testing";
        $metakeyword = "this data send by helper for testing";
        $canonical = "this data send by helper for testing";
        $metadesc = "this data send by helper for testing";
        $topic = "this data send by helper for testing";
        $description = "this data send by helper for testing";

        $insvar = inserBlogji($title,$blog_img,$metatitle,$metakeyword,$canonical,$metadesc,$topic,$description);
        if($insvar){
            return "added data";
        }else{
            return "something went wrong";
        }
    }
}
