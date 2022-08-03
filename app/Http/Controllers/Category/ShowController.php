<?php

namespace App\Http\Controllers\Category;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;


class ShowController extends Controller
{
    public function __invoke(Category $category)
    {
        $posts = $category->posts()->paginate(2);
        return view('category.show', compact('posts'));
    }
}
