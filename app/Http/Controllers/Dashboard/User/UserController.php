<?php

namespace App\Http\Controllers\Dashboard\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use App\Models\Asset;
use Validator;
use Auth;
use Redirect;
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
}
