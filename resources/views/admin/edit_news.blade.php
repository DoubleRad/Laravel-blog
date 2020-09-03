@extends('Layout')

@section('content')
    <div style="margin:30px 0 0 20px;background-color: #343a40;border-radius: 15px;display: inline-block;padding: 10px;color: white" class="add_news">
        <form action="add_news" method="post" enctype="multipart/form-data">
            {{csrf_field()}}
            <h1 style="font-family: Arial">Добавить новость</h1><br>
            <select class="mdb-select md-form" multiple="multiple" name="category_id[]">
                @foreach($categories as $category)
                    <option value="{{$category->id}}">{{$category->category}}</option>
                @endforeach
            </select><br><br>
            Автор:
            <select name="author_id">
                @foreach($authors as $author)
                    <option @if($author->id == $news->author_id) selected @endif value="{{$author->id}}">{{$author->name}}</option>
                @endforeach
            </select><br><br>Заголовок:<br>
            <input type="hidden" name="id" value="{{$news->id}}">
            <input type="text" name="tittle" placeholder="Заголовок" value="{{$news->tittle}}"><br><br>Тело блога:<br>
            <textarea name="body" placeholder="Контент блога" >{{$news->body}}</textarea><br><br>Картинка:<br>
            <input type="file" name="image"><br><br>
            <input class="btn btn-info" type="submit" value="Сохранить">

        </form>
    </div>



@endsection

