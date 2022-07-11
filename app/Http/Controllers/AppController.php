<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Response;
use File;
use Storage;
use Image;

class AppController extends Controller
{
    //
    public function index($a, $b, $url) {
        $urll = "https://img.giaibaitap.me/picture/article/".$a."/".$b."/".$url;
        $contents = file_get_contents($urll);
        $name = substr($url, strrpos($url, '/images/'));
        Storage::disk('public')->put($name, $contents);

        return Redirect('/storage/'.$url);
    }

    public function indexMain($url) {
        $urll = "http://127.0.0.1:8000/storage/".$url;
        $contents = file_get_contents($urll);
        $name = substr($url, strrpos($url, '/images/'));
        Storage::disk('public')->put($name, $contents);

        return Redirect('/storage/'.$url);
    }

    public function showImage($thumb, $image) {
        $size = explode("x", str_replace("thumb_", "", $thumb));

        $imageFullPath = public_path('storage/'.$image);

        $savedPath = public_path($size[0].'x'.$size[1]. '/' . $image);

        $savedDir = dirname($savedPath);
        
        if (!is_dir($savedDir)) {
            mkdir($savedDir, 777, true);
            $imagee = Image::make($imageFullPath)->fit($size[0], $size[1])->save($savedPath);
        } else {
            $imagee = Image::make($imageFullPath)->fit($size[0], $size[1]);
        }

        return $imagee->response();

    }
}
