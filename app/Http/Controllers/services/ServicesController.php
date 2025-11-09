<?php

namespace App\Http\Controllers\services;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\pages\Category;

class ServicesController extends Controller
{
    public function loadservices(){
        return view('admin.services.service');
    }
    public function loadaddservice(){
        $catgdata = Category::orderBy('id', 'desc')->get();
        return view('admin.services.addservice',compact('catgdata'));
    }
}
