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
}
