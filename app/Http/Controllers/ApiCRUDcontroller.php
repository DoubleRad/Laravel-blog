<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class ApiCRUDcontroller extends Controller
{
    public function create(Request $request){
        $news = new \App\News();
        $news->author_id = $request->post('author_id');
        $news->tittle = $request->post('tittle');
        $news->body = $request->post('body');
        $news->img = $request->post('img');
        $news->save();

        return response()->json($news, 201);
    }

    public function update(Request $request, $id){
        $news = \App\News::find($id);
        $news->author_id = $request->post('author_id');
        $news->tittle = $request->post('tittle');
        $news->body = $request->post('body');
        $news->img = $request->post('img');
        $news->save();

        return response()->json($news, 200);
    }

    public function delete($id){
        $news = \App\News::find($id);
        $news -> delete();

        return response()->json(['msh' => $news->id . 'Новость успешно удалена'] , 204);
    }
}
