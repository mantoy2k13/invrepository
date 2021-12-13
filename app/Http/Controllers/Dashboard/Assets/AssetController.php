<?php

namespace App\Http\Controllers\Dashboard\Assets;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AssetController extends Controller
{
    public function index(){
        return view('dashboard.assets.index');
    }

    public function addAsset(Request $request){
        return view('dashboard.assets.add');
    }
}
