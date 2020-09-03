<?php

namespace App\Http\Controllers;

use App\News;
use Illuminate\Routing\Controller;

class IndexController extends Controller
{
    public function __invoke()
    {
        $news = News::paginate(5);
        return view('index' , ['news'=>$news]);
    }
}
