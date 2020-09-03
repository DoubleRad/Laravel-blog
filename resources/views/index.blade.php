@extends('Layout')

@section('content')

@if(Auth::check())
    <!-- Page Content -->
    <div class="container">

      <div class="row">

        <!-- Blog Entries Column -->
        <div class="col-md-8">

          <h1 class="my-4">
<small></small>
          </h1>
@foreach($news as $new)
          <!-- Blog Post -->
          <div class="card mb-4">
            <img class="card-img-top" src="{{$new->img}}" alt="Card image cap">
            <div class="card-body">
              <h2 class="card-title">{{$new->tittle}}</h2>
              <p class="card-text">{{$new->body}}</p>
              <a href="{{route('single_news' , $new->id)}}" class="btn btn-primary">Читать полностью &rarr;</a>
            </div>
            <div class="card-footer text-muted">
Размещен {{$new->created_at}} автором:
<a href="{{route('news_by_authors' , $new->author->key)}}">{{$new->author->name}}</a>
            </div>

              <div class="card-footer text-muted">
                  Категории:
                  @foreach($new->category as $categor)
                  <a href="{{route('news_by_category' , $categor->key)}}" style="text-decoration: underline">{{$categor->category}}</a>
                  @endforeach
              </div>
          </div>
@endforeach

            <!-- Pagination -->
            <ul class="pagination justify-content-center mb-4">
                @if($news->currentPage() != 1)

                    <li class="page-item">
                        <a class="page-link" href="?page=1">Начало</a>
                    </li>

                    <li class="page-item">
                            <a class="page-link" href="{{$news->previousPageUrl()}}">&larr;</a>
                    </li>

                @endif

                @if($news->count() > 0)

                    @for($count = 1 ; $count <= $news->lastPage() ; $count++)

                        @if($count > $news->currentPage() - 3 and $count < $news->currentPage()+3)

                            <li class="page-item  @if($count == $news->currentPage()) disabled @endif">
                                <a class="page-link" href="?page={{$count}}">{{$count}}</a>
                            </li>

                        @endif

                    @endfor

                @endif

                @if($news->currentPage() != $news->lastPage())

                        <li class="page-item">
                            <a class="page-link" href="{{$news->nextPageUrl()}}">&rarr;</a>
                        </li>

                        <li class="page-item">
                            <a class="page-link" href="?page={{$news->lastPage()}}">Конец</a>
                        </li>

                @endif

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
                                @inject('categories' , '\App\Category')

                                      @foreach($categories->show_categories() as $category)
                                      <li>
                                          <a href="{{route('news_by_category' , $category->key)}}">{{$category->category}}</a>
                                        </li>
                                      @endforeach

                              </ul>
                          </div>
                      </div>
                  </div>
              </div>
              <!-- Side Widget -->
              <div class="card my-4">
                  <h5 class="card-header">Мы в соц. сетях</h5>
                  <div class="card-body">
                      <div class="row">
                          <div class="col-lg-6">
                              <ul class="list-unstyled mb-0">
                                  @inject('metrics' ,'\App\social')
                                  {{$metrics->show_socials()}}
                              </ul>
                          </div>
                      </div>
                  </div>
              </div>

          </div>

      </div>
        <!-- /.row -->

    </div>
    <!-- /.container -->
    @else
    <h1 class="my-4" style="position: absolute; left: 45%; color: #7d3232;">
        <small>Авторизируйтесь</small>
    </h1>
    @endif
@endsection




