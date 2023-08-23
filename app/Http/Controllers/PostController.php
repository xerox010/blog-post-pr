<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function index(Request $request)
    {
        $query = $request->get('search'); // Get the search query from the request

        $posts = Post::with('user')
            ->when($query, function ($queryBuilder) use ($query) {
                return $queryBuilder->where('name', 'like', '%' . $query . '%');
            })->paginate(5);
    
        return view('posts.index', compact('posts'));
    }

   public function create(){
    return view('posts.create');
   }


   public function show($id){
    $post = Post::with('user')->find($id);
    return view('posts.show', compact('post'));
   }

   public function store(Request $request){
        $request->validate([
            'name' => 'required|min:3|unique:posts,name',
            'description' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);
        $post = new Post;
        $post->name = $request->name;
        $post->user_id = Auth::user()->id;
        $post->description = $request->description;
        if($request->hasfile('image')){
            $file = $request->file('image');
            $extention = $file->getClientOriginalExtension();
            $filename = time().'.'.$extention;
            $file->move('uploads/posts/',$filename);
            $post->image = $filename;
        }
        $post->save();

        return redirect()->route('posts.index')->with('message', 'Post Created successfully.');
   }

   public function edit($id){
    $post = Post::find($id);
    return view('posts.edit', compact('post'));
   }

   
   public function update(Request $request, $id){
    $post = Post::find($id);
    $post->name = $request->name;
    $post->user_id = Auth::user()->id;
    $post->description = $request->description;
    if($request->hasfile('image')){
        $file = $request->file('image');
        $extention = $file->getClientOriginalExtension();
        $filename = time().'.'.$extention;
        $file->move('uploads/posts/',$filename);
        $post->image = $filename;
    }
    $post->update();
    return redirect()
    ->route('posts.index')
    ->with('message', 'Post Updated successfully!');
   }

   public function destroy($id){
    $post = Post::find($id);
    $post->delete();
    return redirect()
            ->route('posts.index')
            ->with('message', 'Post deleted successfully!');
   }
}
