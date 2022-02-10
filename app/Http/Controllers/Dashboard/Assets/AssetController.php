<?php

namespace App\Http\Controllers\Dashboard\Assets;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Asset;
use Validator;
use Yajra\Datatables\Datatables;
use Auth;
use Redirect;
use DB;

class AssetController extends Controller
{
    public function index(){
        $get_total_asset_value = DB::table('assets')->where('post_type', 'publish')->where('is_delete', 0)->sum('asset_price');
        $get_total_assets = DB::table('assets')->where('is_delete', 0)->count();
        $get_total_asset_publish = DB::table('assets')->where('post_type', 'publish')->where('is_delete', 0)->count();
        $get_total_asset_draft = DB::table('assets')->where('post_type', 'draft')->where('is_delete', 0)->count();
        $get_total_asset_trash = DB::table('assets')->where('is_delete', 1)->count();
        return view('dashboard.assets.index', compact('get_total_asset_value', 'get_total_assets', 'get_total_asset_publish', 'get_total_asset_draft', 'get_total_asset_trash'));
    }

    public function assetLists(Request $request)
    {
        // All Products
        if($request->get('post_type')=='publish'){ // Active Products
            $data = DB::table('assets')->where('post_type', 'publish')->where('is_delete', 0)->get();
        }else if($request->get('post_type')=='draft'){
            $data = DB::table('assets')->where('post_type', 'draft')->where('is_delete', 0)->get();
        }else if($request->get('post_type')=='delete'){
            $data = DB::table('assets')->where('is_delete', 1)->get();
        }else{
            $data = DB::table('assets')->where('is_delete', 0)->get();
        }
        // Return Datatables
        return Datatables::of($data)
            ->addIndexColumn()
            ->addColumn('asset_img', function($asset){
                $imgUrl = ($asset->asset_img) ? $asset->asset_img : asset('assets/images/default_image.png');
                $image = '<a href="'.$imgUrl.'" class="image-popup"><div class="tbl-img"><img src="'.$imgUrl.'" alt="Asset Image"></div></a>';
                return $image;
            })
            ->addColumn('asset_name', function($asset){
                return '
                    <div class="d-flex">
                        <div class="tbl-menu">
                            <a href="'.route('asset.view', $asset->id).'" class="tbl-title">'.($asset->asset_name).'</a>
                            <ul>
                                <li><a href="'.route('asset.edit', $asset->id).'">Edit</a></li>
                                <li><a href="javascript:;" class="text-danger" onclick="deleteAsset('.$asset->id.', \''.$asset->asset_name.'\')">Delete</a></li>
                                <li><a href="'.route('asset.view', $asset->id).'">View</a></li>
                            </ul>
                        </div>
                    </div>
                ';
            })
            ->addColumn('asset_description', function($asset){
                return \Str::limit(strip_tags($asset->asset_description),40);
            })
            ->addColumn('asset_quantity', function($asset){
                return $asset->asset_quantity;
            })
            ->addColumn('asset_price', function($asset){
                return '$'.number_format($asset->asset_price, 2, '.', '');
            })
            ->addColumn('created_at', function($asset){
                $post_type = ($asset->post_type == 'publish') ? 'Published' : 'Draft';
                return $post_type.'<br>'.date('Y-m-d h:i A', strtotime($asset->created_at));
            })
            ->addColumn('action', function($asset){
                $button = '
                    <div class="btn-group">
                        <button type="button" class="btn btn-default dropdown-toggle waves-effect waves-light btn-sm" data-toggle="dropdown" aria-expanded="true"><i class="ti-menu"></i> Options</button>
                        <ul class="dropdown-menu dropdown-menu-right" role="menu">
                            <li><a href="javascript:;">View Investments</a></li>
                            <li><a href="javascript:;">View History</a></li>
                            <li class="divider"></li>
                            <li><a href="'.route('asset.edit', $asset->id).'">Edit</a></li>
                            <li><a href="javascript:;" onclick="deleteAsset('.$asset->id.', \''.$asset->asset_name.'\')">Delete</a></li>
                        </ul>
                    </div>
                ';
                return $button;
            })
        ->escapeColumns([])->make(true);
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
            $data->post_type	     = $request->post_type;
            if($request->input('asset_image') != null){
                $data->asset_img = $this->upload_image($request->input('asset_image'), 'assets', $request->oldImgLink);
            }
            $data->save();
            return response()->json(['code' => 200, 'status' => true, 'msg' => 'Asset saved successfully', 'data' => $data], 200);
        }
    }

    public function editAsset($id){
        $asset = Asset::find($id);
        return view('dashboard.assets.edit', compact('asset'));
    }

    public function updateAsset(Request $request, $id){
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
            $data                    = Asset::find($id);
            $data->asset_name        = $request->asset_name;
            $data->asset_price       = $request->asset_price;
            $data->asset_quantity    = $request->asset_quantity;
            $data->asset_description = $request->asset_description;
            $data->asset_video	     = $request->video_banner;
            $data->post_type	     = $request->post_type;
            if($request->input('asset_image') != null){
                $data->asset_img = $this->upload_image($request->input('asset_image'), 'assets', $request->oldImgLink);
            }
            $data->save();
            return response()->json(['code' => 200, 'status' => true, 'msg' => 'Asset saved successfully', 'data' => $data], 200);
        }
    }

    public function viewAsset($id){
        $asset = Asset::find($id);
        return view('dashboard.assets.view', compact('asset'));
    }

    public function deleteAsset(Request $request){
        // Update Product Info
        $data            = Asset::find($request->id);
        $data->is_delete = 1;
        $data->save();
        return response()->json(['code' => 200, 'status' => true, 'msg' => 'The asset was successfully moved to trash', 'data' => []], 200);
    }
}
