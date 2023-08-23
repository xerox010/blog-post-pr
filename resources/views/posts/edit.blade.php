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
                    
                        <form action="{{route('post.update',$post->id)}}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('put')
                            <div class="form-group">
                                <label for="">Name</label>
                                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{$post->name}}" required>
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="">Description</label>
                                <textarea class="form-control @error('description') is-invalid @enderror" name="description" id="" cols="15" rows="5" value="" required>{{$post->description}}</textarea>
                                @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="">Image</label>
                                <input type="file" name="image" class="form-control"  value="{{ $post->image }}">
                            </div>
                            
                            <div class="form-group text-center">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>

                        </form>
                        @if($post->image)
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-body">
                                    <div class="view view-sixth">
                                        <div>
                                            <h5>Your Previous Photo</h5>
                                        </div>
                                        <img src="{{ asset('uploads/posts/' . $post->image) }}" class="img-fluid" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
    </div>

@endsection
