<?php

namespace App\Helpers;

use App\Models\Category;

class Helper
{
    public static function getCourcesWithSub(){
        $cources = Category::where('status','active')->where('is_parent',1)->with('sub_category')->get();
        return $cources;
    }
    // Add more methods as needed
}
