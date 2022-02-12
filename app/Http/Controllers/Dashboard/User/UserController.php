<?php

namespace App\Http\Controllers\Dashboard\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use Illuminate\Validation\Rule;
use App\Models\Asset;
use App\Models\User;
use App\Models\PersonalInformation;
use Validator;
use Redirect;
use Auth;
use Hash;
use DB;

class UserController extends Controller
{
    public function myProfile(){
        $user = DB::table('users')
            ->leftJoin('personal_information', 'users.id', '=', 'personal_information.user_id')
            ->where('users.id', Auth::user()->id)
        ->first();
        return view('dashboard.users.profile', compact('user'));
    }

    public function updateProfile(Request $request){
        $id = Auth::user()->id;
        $rules = [
            'first_name'     => 'required',
            'last_name'      => 'required',
            'nickname'       => 'required',
            'contact_number' => 'required',
        ];
        $validator = Validator::make($request->all(), $rules);
        if($validator->fails()){
            $errorString = implode("<br>",$validator->messages()->all());
            return response()->json(['code' => 200, 'status' => false, 'msg' => $errorString, 'data' => null], 200);
        }else{
            $user                   = PersonalInformation::find($id);
            $user->first_name       = $request->input('first_name');
            $user->last_name        = $request->input('last_name');
            $user->middle_name      = $request->input('middle_name');
            $user->nickname         = $request->input('nickname');
            $user->address          = $request->input('address');
            $user->contact_number   = $request->input('contact_number');
            $user->bio              = $request->input('bio');
            if($request->input('profile_image') != null){
                $user->user_image = $this->upload_image($request->input('profile_image'), 'users', $request->oldImgLink);
            }
            $user->save();
            return response()->json(['code' => 200, 'status' => true, 'msg' => 'Profile updated successfully', 'data' => null], 200);
        }
    }

    public function updateAccount(Request $request){
        $id = Auth::user()->id;
        $rules = [
            'username'     => ['required',Rule::unique('users','username')->ignore($id)] ,
            'email'        => ['required',Rule::unique('users','email')->ignore($id)] ,
            'display_name' => 'required|numeric',
        ];
        $validator = Validator::make($request->all(), $rules);
        if($validator->fails()){
            $errorString = implode("<br>",$validator->messages()->all());
            return response()->json(['code' => 200, 'status' => false, 'msg' => $errorString, 'data' => null], 200);
        }else{
            $user               = User::find($id);
            $user->username     = $request->input('username');
            $user->email        = $request->input('email');
            $user->display_name = $request->input('display_name');
            $user->password     = ($request->input('password')) ? Hash::make($request->input('password')) : $user->password;
            $user->save();
            return response()->json(['code' => 200, 'status' => true, 'msg' => 'Account updated successfully', 'data' => null], 200);
        }
    }

    public function viewUser(Request $request){
        $total_members = DB::table('users')->where('users.role', '=','member')->count();
        $total_guests = DB::table('users')->where('users.role', '=','guest')->count();
        $get_total_assets = DB::table('assets')->where('is_delete', 0)->count();
        $get_total_asset_publish = DB::table('assets')->where('post_type', 'publish')->where('is_delete', 0)->count();
        $view_all_user = User::all();
        return view('dashboard.users.index', compact('total_members', 'total_guests', 'view_all_user'));
    }

    public function userLists(Request $request)
    {
        // All Products
        $data = DB::table('users')
        ->select(
            'users.id as id',
            'users.username as username',
            'users.email as email',
            'users.created_at as created_at',
            'users.role as role',
            'personal_information.user_image as user_image'
        )
        ->leftJoin('personal_information', 'users.id', '=', 'personal_information.user_id')
        ->where('users.role', '!=', 'admin')
        ->get();

        // Return Datatables
        return Datatables::of($data)
            ->addIndexColumn()
            ->addColumn('username', function($assets){
                return ucfirst($assets->username);
            })
            ->addColumn('email', function($assets){
                return ucfirst($assets->email);
            })
            ->addColumn('created_at', function($asset){

                return date('Y-m-d h:i A', strtotime($asset->created_at));
            })
            ->addColumn('user_type', function($asset){
                return ucfirst($asset->role);
            })
            ->addColumn('user_image', function($asset){
                $imgUrl = ($asset->user_image) ? $asset->user_image : asset('storage/uploads/assets/img_61fdc4855f55b.png');
                $image = '<a href="'.$imgUrl.'" class="image-popup"  ><div class="tbl-img"><img src="'.$imgUrl.'" alt="Asset Image"></div></a>';
                return $image;
            })
            ->addColumn('action', function($asset){
                    $button = '
                    <div class="btn-group">
                        <button type="button" class="btn btn-default dropdown-toggle waves-effect waves-light btn-sm" data-toggle="dropdown" aria-expanded="true"><i class="ti-menu"></i> Options</button>
                        <ul class="dropdown-menu dropdown-menu-right" role="menu">
                            <li><a href="javascript:;">View Investments</a></li>
                            <li><a href="javascript:;">View History</a></li>
                            <li class="divider"></li>

                            <li><a href="'.route('edit.user', $asset->id).'"  >Update User</a></li>
                        </ul>
                    </div>
                ';
                return $button;
            })
            ->escapeColumns([])->make(true);

    }
    public function editUser(Request $request, $id){

        $user = DB::table('users')
        ->leftJoin('personal_information', 'users.id', '=', 'personal_information.user_id')
        ->where('users.id', '=', $id)
        ->first();
        $user_id = $id;
        return view('dashboard.users.edit', compact('user', 'user_id'));
    }
    public function updateUser(Request $request){
        // $user_id = $request->input('user_id');
        $id = $request->input('user_id');
        $rules = [
            'first_name'     => 'required',
            'last_name'      => 'required',
            'nickname'       => 'required',
            'contact_number' => 'required',
        ];
        $validator = Validator::make($request->all(), $rules);
        if($validator->fails()){
            $errorString = implode("<br>",$validator->messages()->all());
            return response()->json(['code' => 200, 'status' => false, 'msg' => $errorString, 'data' => null], 200);
        }else{
            $user                   = PersonalInformation::find($id);
            $user->first_name       = $request->input('first_name');
            $user->last_name        = $request->input('last_name');
            $user->middle_name      = $request->input('middle_name');
            $user->nickname         = $request->input('nickname');
            $user->address          = $request->input('address');
            $user->contact_number   = $request->input('contact_number');
            $user->bio              = $request->input('bio');
            if($request->input('profile_image') != null){
                $user->user_image = $this->upload_image($request->input('profile_image'), 'users', $request->oldImgLink);
            }
            $user->save();
            return response()->json(['code' => 200, 'status' => true, 'msg' => 'Profile updated successfully', 'data' => null], 200);
        }
    }
}
