<?php

namespace App\Http\Controllers\pages;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ChairParts extends Controller
{
    public function chair_part(){
        return view('admin.pages.addChairParts');
    }
}
