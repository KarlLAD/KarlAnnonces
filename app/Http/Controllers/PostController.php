<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    //

    public function index()
    {
        $posts = Post::all();

       return view('post', compact('posts'));
    }

    public function detail()
    {
       return view('detail') ;
    }
}
