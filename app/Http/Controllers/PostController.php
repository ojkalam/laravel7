<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{

    public function index(Request $request)
    {
        $posts = Post::orderBy('id', 'DESC')->paginate(5);
dd($posts);
        return view('post.index', compact('posts'));
    }

    public function show($slug)
    {
        return Post::where('slug', $slug)->first();
    }

}
