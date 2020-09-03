<?php

namespace App\Http\Controllers;
use App\Comment;
use Illuminate\Http\Request;

class SaveCommentController extends Controller
{
    public function __invoke(Request $request)
    {
        if(\Auth::check()){
            if($request->method() == 'POST'){

                $comment = new Comment();
                $comment->news_id = $request->input('news_id');
                $comment->author_id = $request->input('author_id');
                $comment->comment = $request->input('comment');

                $comment->save();

                return redirect()->route('single_news',$request->input('news_id'));
            }
        }
    }
}
