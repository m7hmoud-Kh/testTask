<?php

namespace App\Http\Trait;

use Illuminate\Support\Facades\Storage;


trait Imageable
{
    public function insertImage($title,$image,$dir)
    {
        $new_image  = $title.'_'.date('Y-m-d-h-i-s').'.'.$image->getClientOriginalExtension();
        $image->move(public_path($dir), $new_image);
        return $new_image;
    }

    public function deleteImage($folder, $user_image)
    {
        Storage::disk($folder)->delete($user_image);
    }

}
