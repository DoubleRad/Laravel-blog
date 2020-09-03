@extends('Layout')

@section('content')


@if(\Auth::check())
<div style="margin:30px 0 0 20px;background-color: #343a40;border-radius: 15px;display: inline-block;padding: 10px;color: white" class="add_news">
    <form  action="add_news" method="post" enctype="multipart/form-data">
        {{csrf_field()}}
        <h1 style="font-family: Arial">Добавить новость</h1>
        <select class="mdb-select md-form" multiple="multiple" name="category_id[]">
            @foreach($categories as $category)
                <option value="{{$category->id}}">{{$category->category}}</option>
            @endforeach
        </select><br><br>
        Автор:
        <select name="author_id">
            @foreach($authors as $author)
                <option value="{{$author->id}}">{{$author->name}}</option>
            @endforeach
        </select><br><br>Заголовок<br>
        <input type="text" name="tittle" placeholder="Заголовок"><br><br>Тело блога<br>
        <textarea name="body" placeholder="Контент блога"></textarea><br><br>Картинка<br>
        <input type="file" name="image"><br><br>
        <input class="btn btn-info" type="submit" value="Сохранить">

    </form>
</div>

    @endif



@endsection
