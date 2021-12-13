<?php

namespace App\Http\Controllers\Dashboard\Assets;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Asset;
use Validator;
use Yajra\Datatables\Datatables;
use Auth;
use Redirect;

class AssetController extends Controller
{
    public function index(){
        return view('dashboard.assets.index');
    }

    public function addAsset(){
        return view('dashboard.assets.add');
    }

    public function storeAsset(Request $request){
        $rules = [
            'asset_name'     => 'required',
            'asset_price'    => 'required|numeric',
            'asset_quantity' => 'required|numeric'
        ];

        $validator = Validator::make($request->all(), $rules);
        if($validator->fails()){
            $errorString = implode(" ",$validator->messages()->all());
            return response()->json([ 'code' => 200, 'status' => false, 'msg' => $errorString, 'data' => null], 200);
        }else{
            // Update Product Info
            $data                    = new Asset;
            $data->asset_name        = $request->asset_name;
            $data->asset_price       = $request->asset_price;
            $data->asset_quantity    = $request->asset_quantity;
            $data->asset_description = $request->asset_description;
            $data->asset_video	     = $request->video_banner;
            if($request->input('asset_image') != null){
                $data->asset_img = $this->upload_image($request->input('asset_image'), 'assets', $request->oldImgLink);
            }
            $data->save();
            return response()->json(['code' => 200, 'status' => true, 'msg' => 'Asset saved successfully', 'data' => $data], 200);
        }
    }
}
