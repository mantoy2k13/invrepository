<?php

namespace App\Http\Controllers\Dashboard\Settings;

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
class SettingsController extends Controller
{
    public function payment(){
      $user = DB::table('users')
      ->leftJoin('personal_information', 'users.id', '=', 'personal_information.user_id')
      ->where('users.id', Auth::user()->id)
  ->first();
   return view('dashboard.settings.payment',compact('user'));
     
    }
    public function api(){
      $user = DB::table('users')
      ->leftJoin('personal_information', 'users.id', '=', 'personal_information.user_id')
      ->where('users.id', Auth::user()->id)
  ->first();
      return view('dashboard.settings.api',compact('user'));
     }
}
