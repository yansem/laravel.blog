<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function __invoke()
    {
        $posts = Post::paginate(6);
        $randomPosts = Post::all()->random(4);
        $popularPosts = Post::withCount('likedPosts')->orderBy('liked_posts_count', 'desc')->take(4)->get();
        return view('post.index', compact('posts', 'randomPosts', 'popularPosts'));
    }
}
