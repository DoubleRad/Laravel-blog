@extends('Layout')

@section('content')

    <a href="{{route('add_news_get')}}"><div style="font-size: 23px;width: 250px;height: 100px;background-color: #3a7f72;color: whitesmoke;position: relative;position: fixed;right: 20px;bottom: 20px;display: flex;justify-content: center;align-items: center;border-radius:15px; "><span>Добавить новость</span></div></a>

<div style="margin-left: 20px;margin-top: 30px;" class="delete_div">
    <h1 style="font-family: Arial">Таблица всех новостей</h1>
    <table class="table table-hover-dark">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">TITTLE</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
        @foreach($news as $n)

            <tr>
                <th scope="row">{{$n->id}}</th>
                <td>{{$n->tittle}}</td>
                <td>
                    <form action="/admin/edit_news/{{$n->id}}" method="GET">
                        <input type="hidden" name="id" value="{{$n->id}}">
                        <button type="submit" class="btn btn-outline-dark">EDIT</button>
                    </form>
                </td>
                <td>
                    <form action="" method="post">
                        {{csrf_field()}}
                        {{method_field('delete')}}
                        <input type="hidden" name="id" value="{{$n->id}}">
                        <button type="submit" class="btn btn-outline-danger">DELETE</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>

    </table>
</div>



@endsection




