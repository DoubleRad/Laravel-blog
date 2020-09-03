<?php

namespace App\Http\Controllers;
use App\Comment;
use App\News;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class Single_news_controller extends Controller
{
    public function __invoke($id)
    {

        $news = News::where('id' , '=' , $id)->first();
        $comments = Comment::where('news_id' , '=' , $id)->get();
        return view('single_news' , ['news'=>$news, 'comments' => $comments]);
    }
}
