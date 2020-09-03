<?php

namespace App\Http\Controllers;

use App\Author;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class News_by_author_controller extends Controller
{
    public function __invoke($key)
    {
        $author = Author::where('key','=',$key)->first();
        return view('news_by_authors' , ['authors' => $author]);
    }
}
