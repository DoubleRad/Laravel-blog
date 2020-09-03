@extends('Layout')

@section('content')


    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">

                <h1 class="my-4">
                    <small></small>
                </h1>

                <!-- Blog Post -->
                    <div class="card mb-4">
                        <img class="card-img-top" src="{{$news->img}}" alt="Card image cap">
                        <div class="card-body">
                            <h2 class="card-title">{{$news->tittle}}</h2>
                            <p class="card-text">{{$news->body}}</p>
                            <a href="" class="btn btn-primary">Читать полностью &rarr;</a>
                        </div>
                        <div class="card-footer text-muted">
                            Размещен {{$news->created_at}} автором:
                            <a href="{{route('news_by_authors' , $news->author->key)}}">{{$news->author->name}}</a>
                        </div>
                        <div class="card-footer text-muted">
                            Категории:
                            @foreach($news->category as $categor)
                                <a href="{{route('news_by_category' , $categor->key)}}" style="text-decoration: underline">{{$categor->category}}</a>
                            @endforeach
                        </div>
                    </div>

                <div>
                    @if(\Auth::check())
                    <hr>
                    @if(count($comments)==0) <b>Коментариев пока нет</b>@endif
                    @foreach($comments as $comment)
                        <div class="comments">
                            Автор: <strong>{{$comment->author_id}}</strong><br>
                            {{$comment->comment}}<br>
                            <b style="color: #c6c6c6; font-weight: normal">  Добавлен: {{$comment->created_at}}</b>
                            <hr>
                        </div>
                    @endforeach
                    @else
                    <b>Войдите, что бы увидеть коментарии.</b>
                    @endif
                        <form action="save_comment" method="post">
                            @csrf
                            <h3>Добавить комментарий</h3>
                            <input type="hidden" name="news_id" value="{{$news->id}}">
                            <input type="hidden" name="author_id" value="{{Auth::user()->name}}">

                            <textarea style="width: 100%;height: 150px;" name="comment"></textarea><br><br>
                            <button class="btn-save btn btn-primary btn-sm">Отправить</button><br>
                        </form>
                </div>



            <!-- Pagination -->
                <ul class="pagination justify-content-center mb-4">
                    <li class="page-item">
                        <a class="page-link" href="#">&larr; Older</a>
                    </li>
                    <li class="page-item disabled">
                        <a class="page-link" href="#">Newer &rarr;</a>
                    </li>
                </ul>

            </div>

            <!-- Sidebar Widgets Column -->
            <div class="col-md-4">

                <!-- Search Widget -->
                <div class="card my-4">
                    <h5 class="card-header">Search</h5>
                    <div class="card-body">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Search for...">
                            <span class="input-group-btn">
                  <button class="btn btn-secondary" type="button">Go!</button>
                </span>
                        </div>
                    </div>
                </div>
                <!-- Categories Widget -->
                <div class="card my-4">
                    <h5 class="card-header">Categories</h5>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-6">
                                <ul class="list-unstyled mb-0">
                                    <ul class="list-unstyled mb-0">
                                        @inject('categories' , '\App\Category')

                                        @foreach($categories->show_categories() as $category)
                                            <li>
                                                <a href="{{route('news_by_category' , $category->key)}}">{{$category->category}}</a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Side Widget -->
                <div class="card my-4">
                    <h5 class="card-header">Side Widget</h5>
                    <div class="card-body">
                        @inject('metrics' ,'\App\social')
                        {{$metrics->show_socials()}}
                    </div>

                </div>


            </div>


        </div>
        <!-- /.row -->

    </div>
    <!-- /.container -->

@endsection



