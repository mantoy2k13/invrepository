<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

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
}
