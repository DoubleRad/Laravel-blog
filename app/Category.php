<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function show_categories()
    {
        $categories = Category::all();
        return $categories;
    }
    public function news(){
        return $this->belongsToMany(News::class);
    }
}
