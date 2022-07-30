<?php

namespace App\Http\Controllers\Admin\Categories;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function __invoke()
    {
        return view('admin.categories.index');
    }
}
