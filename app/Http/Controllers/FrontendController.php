<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
class FrontendController extends Controller
{
    public function index()
    {
        $posts = Post::orderBy('created_at','desc')->paginate(6);
        return view('index', compact('posts'));
    }

    public function singlePost($slug)
    {
        $post = Post::where('slug', $slug)->first();
        $prev_id = Post::where('id', '<', $post->id)->max('id');
        $next_id = Post::where('id', '>', $post->id)->min('id');

        $prev_post = Post::find($prev_id);
        $next_post = Post::find($next_id);
        return view('single', compact('post','prev_post','next_post'));
    }
}
