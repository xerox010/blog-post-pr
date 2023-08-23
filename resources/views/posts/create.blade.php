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
                    
                        <form action="{{route('post.store')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="name">Name<sup class="text-danger">*</sup></label>
                                <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" required>
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="">Description<sup class="text-danger">*</sup></label>
                                <textarea class="form-control @error('description') is-invalid @enderror" name="description" id="description" cols="15" rows="5" required></textarea>
                                @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="">Image</label>
                                <input name="image" type="file" id="image" class="form-control">
                            </div>
                            
                            <div class="form-group text-center">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
    </div>

@endsection
