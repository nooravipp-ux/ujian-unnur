<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrameController extends Controller
{
    public function index(){
        return view ('frame.index');
    }
}
