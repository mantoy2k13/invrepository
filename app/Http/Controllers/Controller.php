<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Models\User;
use DB;
use Auth;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function upload_image($file, $folder_name, $old_img=''){
        if($file){
            if($old_img){
                $old_img_name = explode('uploads', $old_img); 
                // Output: [0] => /storage/, [1] => /photos/img_5f69fb6a9a624.png
                $path = storage_path('app/public/uploads');
                if(file_exists($path.$old_img_name[1])){
                    unlink($path.$old_img_name[1]);
                }
            }
            $img_name = 'img_'.uniqid().'.png';
            $dataImg = explode(',', $file);
            $decoded = base64_decode($dataImg[1]);
            file_put_contents(storage_path(). '/app/public/uploads/'.$folder_name.'/'.$img_name, $decoded);
            return '/storage/uploads/'.$folder_name.'/'.$img_name;
            //Format = /storage/uploads/photos/img_5ef0b4e632874.png
        }else{
            return $old_img;
        }
    }

    public function relative_date($time) {
        $time    = strtotime($time);
        $today   = strtotime(date('M j, Y'));
        $hrs     = date("h:i A", $time);
        $reldays = ($time - $today)/86400;
    
        if ($reldays >= 0 && $reldays < 1) {
            return 'Today, '.$hrs;
        } else if ($reldays >= 1 && $reldays < 2) {
            return 'Tomorrow, '.$hrs;
        } else if ($reldays >= -1 && $reldays < 0) {
            return 'Yesterday, '.$hrs;
        }
            
        if (abs($reldays) < 7) {
            if ($reldays > 0) {
                $reldays = floor($reldays);
                return 'In ' . $reldays . ' day' . ($reldays != 1 ? 's' : '');
            } else {
                $reldays = abs(floor($reldays));
                return $reldays . ' day' . ($reldays != 1 ? 's' : '') . ' ago';
            }
        }
        
        if (abs($reldays) < 182) {
            return date('l, j F',$time ? $time : time());
        } else {
            return date('l, j F, Y',$time ? $time : time());
        }
    }

    public function get_my_info(){
        $user = DB::table('users')
            ->leftJoin('personal_information', 'users.id', '=', 'personal_information.user_id')
            ->where('users.id', Auth::user()->id)
        ->first();
        return $user;
    }

    public function get_my_role($role){
        return ($role=='admin') ? 'Administrator' : (($role=='member') ? 'Member' : 'Guest');
    }
    public function display_name($type){
        $my_info = $this->get_my_info();
        switch ($type) {
            case 1: // Nickname
                return $my_info->nickname;
                break;
            case 2: // First Name
                return $my_info->first_name;
                break;
            case 3: // Last Name
                return $my_info->last_name;
                break;
            case 4: // First & Last Name
                return $my_info->first_name.' '.$my_info->last_name;
                break;
            case 5: // Email
                return $my_info->email;
                break;
            default: // Username
                return $my_info->username;
        }
    }
}
