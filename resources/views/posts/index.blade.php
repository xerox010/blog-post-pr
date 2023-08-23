@extends('layouts.dashboard')

@section('content')
    <nav class="navbar navbar-expand-sm bg-dark">
        <!-- Links -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link text-light" href="/posts">Posts</a>

            </li>
            <li class="nav-item">
                <a class="dropdown-item text-light mt-1" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </li>
        </ul>
    </nav>
    
    <div class="container-fluid">
        <h2 class="mt-4">Post list</h2>
        <form action="{{ route('posts.index') }}" method="GET" class="mb-3">
            <div class="input-group">
                <input type="text" name="search" class="form-control" placeholder="Search by Post Name"
                      value="{{ request('search') }}"> <!-- Populate input with current search value -->
                <div class="input-group-append">
                    <button type="submit" class="btn btn-primary">Search</button>
                    @if (request()->has('search')) <!-- Show the clear button only when search query is present -->
                        <a href="{{ route('posts.index') }}" class="btn btn-secondary">Clear</a>
                    @endif
                </div>
            </div>
        </form>




        <a href="{{ route('posts.create') }}" role="button" class="btn btn-primary btn-sm float-right">Add Post</a>

        <div class="d-flex justify-content-center align-items-center">
            <table class="table table-bordered text-center" style="width: 80%">
                <thead>
                    <tr>
                        <th scope="col" style="width: 5%">SN</th>
                        <th scope="col" style="width: 25%">Name</th>
                        <th scope="col" style="width: 20%">Image</th>
                        <th scope="col" style="width: 20%">Creator</th>
                        <th scope="col" style="width: 30%"> Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($posts as $key => $post)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $post->name }}</td>
                            <td>
                                <img src="{{ asset('uploads/posts/' . $post->image) }}" alt="{{ $post->image }}"
                                            height="40px" width="80px" style="border-radius: 50%;">
                            </td>
                            <td>{{ $post->user->name }}</td>
                            <td>
                                <a href="{{ route('post.show', $post->id) }}" class="btn btn-primary btn-sm">View</a>
                                <a href="{{ route('post.edit', $post->id) }}" class="btn btn-success btn-sm">Edit</a>
                                <form action="{{ route('post.destroy', $post->id) }}" method="post"
                                    style="display: inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm"
                                        onclick="return confirm('Are you sure?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5">There are no Posts available at the moment.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="d-flex justify-content-center">
            {{ $posts->links() }}
        </div>
    </div>
@endsection
