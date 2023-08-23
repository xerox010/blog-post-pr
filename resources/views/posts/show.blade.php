@extends('layouts.dashboard')

@section('content')
    <nav class="navbar navbar-expand-sm bg-dark">
        <!-- Links -->
        <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link text-light" href="/">Posts</a>
        </li>
        <a href="{{ route('posts.index') }}" role="button" class="btn btn-primary btn-sm float-right">Post List</a>
        </ul>
    </nav>
    <div class="container" >
        <div class="row justify-content-center">
            <div class="col-sm-8">
                <div class="card mt-3 p-3">
                    <div class="form-group">
                        <label for="">Name</label>
                        <input type="text" name="name" class="form-control" value="{{$post->name}}" readonly>
                    </div>                            
                    <div class="form-group">
                        <label for="">Creator Name</label>
                        <input type="text" name="name" class="form-control" value="{{$post->user->name}}" readonly>
                    </div>
                    <div class="form-group">
                        <label for="">Description</label>
                        <p>{{$post->description}}</p>
                    </div>
                    <div class="form-group">
                        <label for="">Image</label>
                        @if($post->image)
                        <div class="col-md-6">
                            <div class="view view-sixth">
                                <img src="{{ asset('uploads/posts/' . $post->image) }}" class="img-fluid" style="height:160px; width:140px" />
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
