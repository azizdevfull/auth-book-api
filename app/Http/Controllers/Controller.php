<?php

namespace App\Http\Controllers;

abstract class Controller
{
    public function uploadPhoto($file, $path="uploads"){
        $photoName=md5(time() . $file->getFilename()) . '.' . $file->getClientOriginalExtension();
        return $file->storeAs($path, $photoName,'public');
    }
    public function deletePhoto($path){
        $fullpath = public_path('storage/' . $path);

        if(file_exists($fullpath)){
            unlink($fullpath);
        }

    }
}
