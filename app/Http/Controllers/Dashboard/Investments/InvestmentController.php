<?php

namespace App\Http\Controllers\Dashboard\Investments;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use App\Models\Investment;
use App\Models\User;
use Validator;
use Redirect;
use Auth;
use DB;

class InvestmentController extends Controller
{
    // Admin
    public function investments(){
        return view('dashboard.investments.investment');
    }
    // Members
    public function myInvestments(){
        $get_total_investment=  DB::table('investments')->sum('invest_amount');
        return view('dashboard.investments.my-investment',compact('get_total_investment'));
    }

    public function storeInvestment(Request $request){
         $rules = [
            'amount'            => 'required',
            'card_number'       => 'required',
            'card_name'         => 'required',
            'card_expiry_month' => 'required',
            'card_expiry_year'  => 'required',
            'card_cvc'          => 'required'
         ];

        $validator = Validator::make($request->all(), $rules);
        if($validator->fails()){
            $errorString = implode(" ",$validator->messages()->all());
            return response()->json([ 'code' => 200, 'status' => false, 'msg' => $errorString, 'data' => null], 200);
        }else{
            // Update Product Info
            $user_id             = Auth::user()->id;
            $data                = new Investment;
            $data->user_id       = $user_id;
            $data->invest_amount = $request->amount;
            $data->card_number   = $request->card_number;
            $data->card_name     = $request->card_name;
            $data->card_exp	     = $request->card_expiry_month .'/'.$request->card_expiry_year;
            $data->card_cvc	     = $request->card_cvc;
            $data->save();

            $user_data = User::find($user_id);
            $user_data->role = 'member';
            $user_data->save();

            return response()->json(['code' => 200, 'status' => true, 'msg' => 'Investment saved successfully', 'data' => $data], 200);
        }
    }
    
}

