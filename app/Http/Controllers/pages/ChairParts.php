<?php

namespace App\Http\Controllers\pages;

use App\Http\Controllers\Controller;
use App\Models\pages\ChairPartsModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\pages\Category;

class ChairParts extends Controller
{
    public function chair_part(){
        $catgdata = Category::orderBy('id','desc')->get();
        $data = ChairPartsModel::orderBy('id','desc')->paginate(10);
        return view('admin.pages.addChairParts',compact('data','catgdata'));
    }
    public function addchairparts(Request $request){
        $validation = $request->validate([
            'title'=>'required|string|max:255|unique:chair_parts,title',
            'catg'=>'required|string|max:255',
            'brand'=>'required|string|max:255',
            'price'=>'required|integer',
            'descrition'=>'required|min:160|max:255',
            'productimg'=>'required|mimes:jpg,jpeg,png,svg|max:300'
        ],[
            'title.required' => 'Please provide a title for the product.',
            'catg.required' => 'Category is required.',
            'price.integer' => 'Price must be a valid number.',
            'descrition.min' => 'Description must be at least 160 characters long.',
            'productimg.mimes' => 'The product image must be a JPG, JPEG, PNG, or SVG file.',
        ]);

        if($validation){
            // FILE UPLOAD CODE HERE WITH RENAME
        $file = $request->file('productimg');
        $dateTime = date('d_m_Y_H_i_s');
        $title = $request->input('title');
        $extension = $file->getClientOriginalExtension();
        $cusnamespaceremove = str_replace(' ','_',$title);
        $customeName = $cusnamespaceremove.'_'.$dateTime.'.'.$extension;
        // THIS IS ACCUTUAL PATH WHERE TO STORE THIS ON CRM
        $path = $file->storeAs('chairparts',$customeName,'public');


        $dbdata = new ChairPartsModel();
        $dbdata->title = $request->input('title');
        $dbdata->catg = $request->input('catg');
        $dbdata->brand = $request->input('brand');
        $dbdata->price = $request->input('price');
        $dbdata->descrition = $request->input('descrition');
        $dbdata->product_image = $path;
        if($dbdata->save()){
            return response()->json([
                'status' => 'success',
                'message'=>'<div
                            class="rounded-xl border border-success-500 bg-success-50 p-4 dark:border-success-500/30 dark:bg-success-500/15">
                            <div class="flex items-start gap-3">
                                <div class="-mt-0.5 text-success-500">
                                    <svg class="fill-current" width="24" height="24" viewBox="0 0 24 24"
                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M3.70186 12.0001C3.70186 7.41711 7.41711 3.70186 12.0001 3.70186C16.5831 3.70186 20.2984 7.41711 20.2984 12.0001C20.2984 16.5831 16.5831 20.2984 12.0001 20.2984C7.41711 20.2984 3.70186 16.5831 3.70186 12.0001ZM12.0001 1.90186C6.423 1.90186 1.90186 6.423 1.90186 12.0001C1.90186 17.5772 6.423 22.0984 12.0001 22.0984C17.5772 22.0984 22.0984 17.5772 22.0984 12.0001C22.0984 6.423 17.5772 1.90186 12.0001 1.90186ZM15.6197 10.7395C15.9712 10.388 15.9712 9.81819 15.6197 9.46672C15.2683 9.11525 14.6984 9.11525 14.347 9.46672L11.1894 12.6243L9.6533 11.0883C9.30183 10.7368 8.73198 10.7368 8.38051 11.0883C8.02904 11.4397 8.02904 12.0096 8.38051 12.3611L10.553 14.5335C10.7217 14.7023 10.9507 14.7971 11.1894 14.7971C11.428 14.7971 11.657 14.7023 11.8257 14.5335L15.6197 10.7395Z"
                                            fill="" />
                                    </svg>
                                </div>

                                <div>
                                    <h4 class="mb-1 text-sm font-semibold text-gray-800 dark:text-white/90">
                                        Success Message
                                    </h4>

                                    <p class="text-sm text-gray-500 dark:text-gray-400">
                                        Success!! Data added successfully.
                                    </p>
                                </div>
                            </div>
                        </div>'
            ]);
        }else{
            return response()->json([
                'status' => 'error',
                'message'=>'<div
                            class="rounded-xl border border-error-500 bg-error-50 p-4 dark:border-error-500/30 dark:bg-error-500/15">
                            <div class="flex items-start gap-3">
                                <div class="-mt-0.5 text-error-500">
                                    <svg class="fill-current" width="24" height="24" viewBox="0 0 24 24"
                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M20.3499 12.0004C20.3499 16.612 16.6115 20.3504 11.9999 20.3504C7.38832 20.3504 3.6499 16.612 3.6499 12.0004C3.6499 7.38881 7.38833 3.65039 11.9999 3.65039C16.6115 3.65039 20.3499 7.38881 20.3499 12.0004ZM11.9999 22.1504C17.6056 22.1504 22.1499 17.6061 22.1499 12.0004C22.1499 6.3947 17.6056 1.85039 11.9999 1.85039C6.39421 1.85039 1.8499 6.3947 1.8499 12.0004C1.8499 17.6061 6.39421 22.1504 11.9999 22.1504ZM13.0008 16.4753C13.0008 15.923 12.5531 15.4753 12.0008 15.4753L11.9998 15.4753C11.4475 15.4753 10.9998 15.923 10.9998 16.4753C10.9998 17.0276 11.4475 17.4753 11.9998 17.4753L12.0008 17.4753C12.5531 17.4753 13.0008 17.0276 13.0008 16.4753ZM11.9998 6.62898C12.414 6.62898 12.7498 6.96476 12.7498 7.37898L12.7498 13.0555C12.7498 13.4697 12.414 13.8055 11.9998 13.8055C11.5856 13.8055 11.2498 13.4697 11.2498 13.0555L11.2498 7.37898C11.2498 6.96476 11.5856 6.62898 11.9998 6.62898Z"
                                            fill="#F04438"></path>
                                    </svg>
                                </div>

                                <div>
                                    <h4 class="mb-1 text-sm font-semibold text-gray-800 dark:text-white/90">
                                        Error Message
                                    </h4>

                                    <p class="text-sm text-gray-500 dark:text-gray-400">
                                        Error!! something went wrong please try again.
                                    </p>
                                </div>
                            </div>
                        </div>'
            ]);
        }
        }else{
            return response()->json(['status'=>'validationer', 'message' => '<div
                            class="rounded-xl border border-error-500 bg-error-50 p-4 dark:border-error-500/30 dark:bg-error-500/15">
                            <div class="flex items-start gap-3">
                                <div class="-mt-0.5 text-error-500">
                                    <svg class="fill-current" width="24" height="24" viewBox="0 0 24 24"
                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M20.3499 12.0004C20.3499 16.612 16.6115 20.3504 11.9999 20.3504C7.38832 20.3504 3.6499 16.612 3.6499 12.0004C3.6499 7.38881 7.38833 3.65039 11.9999 3.65039C16.6115 3.65039 20.3499 7.38881 20.3499 12.0004ZM11.9999 22.1504C17.6056 22.1504 22.1499 17.6061 22.1499 12.0004C22.1499 6.3947 17.6056 1.85039 11.9999 1.85039C6.39421 1.85039 1.8499 6.3947 1.8499 12.0004C1.8499 17.6061 6.39421 22.1504 11.9999 22.1504ZM13.0008 16.4753C13.0008 15.923 12.5531 15.4753 12.0008 15.4753L11.9998 15.4753C11.4475 15.4753 10.9998 15.923 10.9998 16.4753C10.9998 17.0276 11.4475 17.4753 11.9998 17.4753L12.0008 17.4753C12.5531 17.4753 13.0008 17.0276 13.0008 16.4753ZM11.9998 6.62898C12.414 6.62898 12.7498 6.96476 12.7498 7.37898L12.7498 13.0555C12.7498 13.4697 12.414 13.8055 11.9998 13.8055C11.5856 13.8055 11.2498 13.4697 11.2498 13.0555L11.2498 7.37898C11.2498 6.96476 11.5856 6.62898 11.9998 6.62898Z"
                                            fill="#F04438"></path>
                                    </svg>
                                </div>

                                <div>
                                    <h4 class="mb-1 text-sm font-semibold text-gray-800 dark:text-white/90">
                                        Error Message
                                    </h4>

                                    <p class="text-sm text-gray-500 dark:text-gray-400">
                                        Error!! Facing problem with error hendling please give us some time.
                                    </p>
                                </div>
                            </div>
                        </div>']);
        }
        

    }
    public function editChairParts($id){
        $data = ChairPartsModel::find($id);
        $catgdata = Category::orderBy('id','desc')->get();
        return view('admin.pages.editChairParts',compact('data','catgdata'));
    }
    public function updateData(Request $request){
        // return $request->input();
        $partsdata = ChairPartsModel::find($request->input('partsid'));
        $oldimage = $partsdata->product_image;
            if($partsdata){
                $validation = $request->validate([
                'title'=>'required|string|max:255',
                'catg'=>'required|string|max:255',
                'brand'=>'required|string|max:255',
                'price'=>'required|integer',
                'descrition'=>'required|min:160|max:255',
                'productimg' => 'nullable|mimes:jpg,jpeg,png,svg|max:300',
            ],[
                'required' => 'Please fill this feild.',
                'price.integer' => 'Price must be a valid number.',
                'descrition.min' => 'Description must be at least 160 characters long.',
                'productimg.max' => 'Image size must not exceed 300 KB.',
            ]);
            if($validation){
                if($request->hasFile('productimg')){
                    $file = $request->file('productimg');
                    $dateTime = date('d_m_Y_H_i_s');
                    $title = $request->input('title');
                    $extension = $file->getClientOriginalExtension();
                    $cusnamespaceremove = str_replace(' ','_',$title);
                    $customeName = $cusnamespaceremove.'_'.$dateTime.'.'.$extension;
                    // THIS IS ACCUTUAL PATH WHERE TO STORE THIS ON CRM
                    $path = $file->storeAs('chairparts',$customeName,'public');
                }else{
                    $path = $partsdata->product_image;
                }
                
                $partsdata->title = $request->input('title') ?? $partsdata->title;
                $partsdata->catg = $request->input('catg') ?? $partsdata->catg;
                $partsdata->price = $request->input('price') ?? $partsdata->price;
                $partsdata->brand = $request->input('brand') ?? $partsdata->brand;
                $partsdata->descrition = $request->input('descrition') ?? $partsdata->descrition;
                $partsdata->product_image = $path ?? $partsdata->product_image;

                if($partsdata->save()){
                    if($request->hasFile('productimg')){
                        if(Storage::disk('public')->exists($oldimage)){
                            Storage::disk('public')->delete($oldimage);
                        }
                    }
                    return redirect()->route('chair-ui')->with('success','Your data updated successfully');
                }else{
                    return redirect()->route('chair-ui')->with('error','Data not updated yet!! Try again...');
                }
                
            }
        }else{
            return 'no data found';
        }

    }
    public function statusChange(Request $request){
        $id = $request->input('id');
        $data = ChairPartsModel::find($id);
        ($data->chair_parts_status === 1) ? $status = 0 :$status = 1;
        $data->chair_parts_status = $status;
        if($data->save()){
            return response()->json([
                'success' => true,
                'new_status' => 'You change the status for '.$data->title,
            ]);
        }
    }
    public function deleteChairParts(Request $request){
        $id = $request->input('id');
        $data = ChairPartsModel::find($id);
        if($data->delete()){
            return response()->json([
                'success' => true,
                'message' => 'Delete successfully! you deleted '.$data->title . '.',
            ]);
        }
    }
}
