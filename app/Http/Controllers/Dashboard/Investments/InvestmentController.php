<?php

namespace App\Http\Controllers\Dashboard\Investments;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;


use App\Models\Investment;

use Validator;
use Redirect;
use Auth;

use DB;

class InvestmentController extends Controller
{
    // Admin
    public function investments(){
        // $user = DB::table('users')
        //     ->leftJoin('personal_information', 'users.id', '=', 'personal_information.user_id')
        //     ->where('users.id', Auth::user()->id)
        // ->first();
        return view('dashboard.investments.investment');
    }
    // Members
    public function myInvestments(){
        return view('dashboard.investments.my-investment');
    }

    public function storeInvestment(Request $request){
        $rules = [
            'invest_amount'     => 'required',
           
        ];

        $validator = Validator::make($request->all(), $rules);
        if($validator->fails()){
            $errorString = implode(" ",$validator->messages()->all());
            return response()->json([ 'code' => 200, 'status' => false, 'msg' => $errorString, 'data' => null], 200);
        }else{
            // Update Product Info
            $data                    = new Investment;
            $data->invest_amount      = $request->invest_amount;
           
           
            $data->save();
            return response()->json(['code' => 200, 'status' => true, 'msg' => 'Investment saved successfully', 'data' => $data], 200);
        }
    }
    
}

