<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class News_by_category extends Controller
{
    public function __invoke($key)
    {
        $category = Category::where('key' , '=' , $key) -> first();
        return view('news_by_category' , ['category' => $category]);
    }
}
