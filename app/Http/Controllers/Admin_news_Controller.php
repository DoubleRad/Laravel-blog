<?php

namespace App\Http\Controllers;

use App\Author;
use App\Category;
use App\News;
use Illuminate\Http\Request;

use Illuminate\Routing\Controller;

class Admin_news_Controller extends Controller
{
    public function add(Request $request)
    {
        $authors = Author::all();
        $categories = Category::all();
        return view('admin.add_news' , ['authors' => $authors,'categories'=>$categories]);

    }

    public function save(Request $request)
    {
        if(\Auth::check()){
        if($request->method() == 'POST'){
            $news = new News();
            $news->author_id = $request->input('author_id');
            $news->tittle = $request->input('tittle');
            $news->body = $request->input('body');
            $image = $request->image;
            if($image){
                $imageName = $image->getClientOriginalName();
                $image->move('images' , $imageName);
                $news->img = 'http://blog/public/images/' . $imageName;
            }
            $news->save();
            $news->category()->sync($request->input('category_id'), false);
            $news->category()->getRelated();
            return redirect('/admin/delete_news');
        }
        }else{
            return redirect('/admin/delete_news');
        }
    }

    public function delete(Request $request){
        if($request->method() == 'DELETE'){
            $news = News::find($request->input('id'));
            $news->delete();
            return back();
        }else{
            return view('admin.delete_news' , ['news'=>News::all()]);
        }
    }

    public function edit($id)
    {
        $news = News::where('id' , '=' , $id)->first();
        $authors = Author::all();
        $categories = Category::all();
        return view('admin.edit_news' , ['news'=>$news , 'authors'=>$authors,'categories'=>$categories]);
    }

    public function edit_save(Request $request){
        if($request->method() == 'POST'){
            $news = News::where('id' , '=' , $request->input('id'))->first();
            $news->author_id = $request->input('author_id');
            $news->tittle = $request->input('tittle');
            $news->body = $request->input('body');
            $image = $request->image;
            if($image){
                $imageName = $image->getClientOriginalName();
                $image->move('images' , $imageName);
                $news->img = 'http://blog/public/images/' . $imageName;
            }
            $news->save();
            $news->category()->sync($request->input('category_id'), false);
            $news->category()->getRelated();
        }
        return redirect('/news/'.$news->id);
    }

}

