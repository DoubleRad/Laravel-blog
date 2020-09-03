<?php

namespace App\Http\Controllers;
use App\Page;
use Illuminate\Routing\Controller;

class PageController extends Controller
{
    public function about(){
        $page = Page::where('page' , '=' , 'about')->first();
        return view('about' , ['page'=>$page]);
    }
    public function contacts(){
        $page = Page::where('page' , '=' , 'services')->first();
        return view('contacts',['page'=>$page]);
    }
}
