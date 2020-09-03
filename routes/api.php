<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/' , function(){
    return response()->json(['Z'=>['x'=>'y']]);
});

Route::get('/news' , function (){
    return response()->json(\App\News::paginate(2) , 200);
});

Route::get('/news/{id}' , function ($id){

    try{

        $news = \App\News::findOrFail($id);

    } catch (Exception $exception){

        return response()->json(['msg'=>'News not found'] , 404);

    }

    return response()->json(\App\News::find($id) , 200);
});

Route::post('/news', 'ApiCRUDcontroller@create');

Route::put('/news/{id}', 'ApiCRUDcontroller@update');

Route::delete('/news/{id}' , 'ApiCRUDcontroller@delete');









