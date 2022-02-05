<?php

namespace App\Http\Controllers\Dashboard\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class DashboardController extends Controller
{
    public function index()
    {
        $get_total_users= DB::table('users')->count();
        $get_total_assets = DB::table('assets')->where('post_type', 'publish')->where('is_delete', 0)->count();
        return view('dashboard.dashboard.index',compact('get_total_users', 'get_total_assets')) ;
    }
}
