<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Post extends Model
{
    use HasFactory;



    public function categories()
    {
        return $this->belongsToMany(Category::class,'post_categories', 'post_id', 'category_id');
    }




    // seperate category and sub category
    public function cat()
    {
        return $this->belongsToMany(Category::class,'post_categories', 'post_id', 'category_id')->where('is_parent',1);
    }

    public function sub_cat()
    {
        return $this->belongsToMany(Category::class,'post_categories', 'post_id', 'category_id')->where('is_parent',0);
    }


    public function post_image()
    {
        $image = PostImage::where('id',$this->image_id)->first();
        if($image != null)
            return $image->title;
        else
            return $image;
    }

    public function post_image_alt()
    {
        $image = PostImage::where('id',$this->image_id)->first();
        if($image != null)
            return $image->alt_text;
        else
            return $image;
    }
    public function post_image_caption_text()
    {
        $image = PostImage::where('id',$this->image_id)->first();
        if($image != null)
            return $image->caption_text;
        else
            return $image;
    }
}
