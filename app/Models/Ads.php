<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ads extends Model
{
    use HasFactory;


    public function post_image()
    {
        $image = PostImage::where('id',$this->image_id)->first();
        if($image != null)
            return $image->title;
        else
            return $image;
    }
}
