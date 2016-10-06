<?php

namespace App\Http\Controllers;

use App\Post;

use Markdown;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index()
    {
        $posts = Post::orderBy('created_at', 'desc')->simplePaginate(10);
        foreach ($posts as $post) {
            $post->content = Markdown::convertToHtml($post->content);
            $post->content = str_limit( strip_tags($post->content), 250);
        }

        return view('home', compact('posts'));
    }
}
