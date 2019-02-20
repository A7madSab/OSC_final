@extends('layouts.app')

@section('content')

    <div class="container-fluid" style="padding-top: 10px">
        <div class="row">
            <div class="col-lg-3 ">

                <form method="POST" action='/search'>
                    <div class="container">
                        <div class="form-group">
                            @csrf
                            <input class="form-control" type="text" placeholder="Search" name="searchval">
                            <button type="submit" class="btn btn-danger" style="width:100%; margin-top: 10px">Go!</button>
                        </div>
                    </div>
                </form>
   
   
                <div class="sidebar text-center">
                    <h3>Categories</h3>
                    <ul class="list-unstyled">
                        @foreach($cats as $cat)
                            <li>
                                <a href="/Category/{{$cat->category_Name}}" class="btn btn-primary" style="margin-top: 10px">
                                    <ion-icon name="browsers"></ion-icon>
                                    {{$cat->category_Name}}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>

            </div>


            <div class="col-8">
                
                <form method="POST" action="/Createpost" enctype="multipart/form-data">
                    <fieldset style="padding:16px;   border:2px solid grey; -moz-border-radius:8px; -webkit-border-radius:8px;	border-radius:8px;	" >
                        <legend style="text-align: center">Create Post</legend>
                        {{csrf_field()}}    

                        <div class="form-group">
                            <input  class="form-control" name="title" placeholder="Title">
                        </div>

                        <div class="form-group">
                            <textarea class="form-control" name="body" rows="5" placeholder="Post Body"></textarea>
                        </div>
                        
                        <div class="form-group">
                            <input  type="file" name="imgefile">
                        </div>

                        <button type="submit" style="width: 100%" class="btn btn-success">Publish Post  </button>
                    </fieldset> 

                </form>
                <hr>

                @foreach($posts as $post)
                    <div>
                        <div class="card mb-3">
                            <div class="card-header">
                                <a href="User/{{ Auth::User()->id }}">
                                    <span>  <i class="fa fa-user" aria-hidden="true"></i> {{$post->auther}}</span>                    
                                </a>
                            </div>
                            <div class="card-body" style="flex-direction: column">
                                <a href="comment/{{$post->post_id}}">
                                  
                                    <h3><strong>{{ $post->title }}</strong></h3>
                                </a>
                                <p>
                                    {{$post->body}}
                                </p>
                                <hr>
                                <div >
                                    <img style="max-width: 100%" class="img-responsive" src="{{$post->image}}" alt="plane" />                
                                </div>
                            </div>
                            <div class="card-footer small text-muted">
                                <small>{{$post->created_at}}</small>
                            </div>
                        </div>  
                    </div>
                @endforeach 
            </div>
        </div>
    </div>

   
</body>

@endsection