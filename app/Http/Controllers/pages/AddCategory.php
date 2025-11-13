<?php

namespace App\Http\Controllers\pages;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\pages\Category;
use Illuminate\Support\Facades\Log;

class AddCategory extends Controller
{
    // LOAD CATEGORY PAGE
    public function addCatg(){
        $catgdata = Category::orderBy('id', 'desc')->paginate(10);
        return view('admin.pages.addCategory',compact('catgdata'));
    }
    // INSERT CATEGORY TO DB
    public function storeCatg(Request $request){
        // return $catg =  $request->input('catgName');
        $data = $request->validate([
            'catgName' => 'required|string|unique:category,category_name',
        ],[
            'required' => "This feild can't be empty",
            'unique' =>"This name is already taken!",
        ]);
        try {
            if($data){
                $catgdata = new Category();
                $catgdata->category_name = $request->input('catgName');
                $catgdata->category_status = 1;
                if($catgdata->save()){
                    return redirect()->route('category')->with('success','Category added successfully!!');
                }else{
                    return redirect()->route('category')->with('error','Something went wrong!!');
                }
            }else{
                return redirect()->route('category')->with('error','Something went wrong with validations!!');

            }
        }
        catch (\Exception $e) {
                Log::error('Error retrieving input: ' . $e->getMessage());

                return response()->json([
                    'message' => 'An error occurred while processing the request.',
                    'error' => $e->getMessage()
                ], 500);
            }
    }
    // LOAD EDIT PAGE
    public function loadeditpage($id){
        $editdata = Category::find($id);
        if($editdata){
            return view('admin.pages.editCatg',compact('editdata'));
        }else{
            return redirect()->route('category')->with('error','We are really sorry!!. No records found this time');
        }
    }
    // UPDATE CATEGORY HERE
    public function updateCatg(Request $request){
        $catgname = $request->input('editcatg');
        $id = $request->input('catgid');
        $validation = $request->validate([
            'editcatg' => 'required|string|unique:category,category_name',
        ],[
            'required' => "This feild can't be empty.",
            'unique' =>"This name is already taken.",
        ]);
        if($validation){
            $catdata = Category::find($id);
            $catdata->category_name = $catgname;
            if($catdata->save()){
                return redirect()->route('category')->with('success','Category Updated successfully!!');

            }else{
                return redirect()->route('category')->with('error','Something went wrong!!');
            }
        }else{
            return redirect()->route('category')->with('error','Something went wrong with validations!!');
        }

    }
    // CHANGE STATUS OF CATEGORY
    public function statusupdate(Request $request){
        $id = $request->input('id');
        $data = Category::find($id);
        if(!$data){
        return response()->json(['success' => false,'message' => 'Category not found'], 404);
        }
        $data->category_status = $data->category_status === 1 ? 0:1;
        $data->	updated_at = now()->format('Y-m-d H:i:s');
        if($data->save()){
            return response()->json([
                'success' => true,
                'new_status' => 'status changed'
            ]);
        }

    }
    // DELETE CATEGORY FROM DATABASE
    public function deletecatg(Request $request){
        $id = $request->input('id');
        if(Category::destroy($id)){
            return response()->json([
                'success' => true,
                'new_status' => 'status changed'
            ]);
        }else{
        return response()->json(['success' => false,'message' => 'Category not found'], 404);
        }
    }
}
