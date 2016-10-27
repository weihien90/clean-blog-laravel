<?php

namespace App\Http\Controllers;

use Markdown;
use Illuminate\Http\Request;

use App\Post;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::orderBy('created_at', 'desc')->paginate(20);
        foreach ($posts as $post) {
            $post->content = Markdown::convertToHtml($post->content);
            $post->content = str_limit( strip_tags($post->content), 250);
        }

        return view('posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $post = new Post;
        $post->category = $request->category;
        $post->title = $request->title;
        $post->slug = str_slug($post->title);
        $post->cover_image = $request->input('cover-image');
        $post->content = $request->content;
        $post->save();

        return redirect()->back()->with('message', 'Post published');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $year
     * @param  int  $month
     * @param  int $day
     * @param  string  $slug
     * @return \Illuminate\Http\Response
     */
    public function show($year, $month, $day, $slug)
    {
        $post = Post::withTrashed()->whereSlug($slug)->first();
        $post->content = Markdown::convertToHtml($post->content);

        return view('posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view('posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
      $post->category = $request->category;
      $post->title = $request->title;
      $post->slug = str_slug($post->title);
      $post->cover_image = $request->input('cover-image');
      $post->content = $request->content;
      $post->save();

      return redirect()->back()->with('message', 'Post updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        
    }

    /**
     * Archive the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function archive(Post $post)
    {
        $post->delete();
        return redirect()->back();
    }

    /**
     * Restore the archived resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function restore(Post $post)
    {
        $post->restore();
        return redirect()->back();
    }

    /**
     * Display the listings of archived blogpost.
     *
     * @return \Illuminate\Http\Response
     */
    public function archived()
    {
        $archived_posts = Post::onlyTrashed()
            ->orderBy('created_at', 'desc')
            ->simplePaginate(10);

        foreach ($archived_posts as $post) {
            $post->content = Markdown::convertToHtml($post->content);                                                                                
            $post->content = str_limit( strip_tags($post->content), 250);
        }

        return view('posts.archived', compact('archived_posts'));
    }
}
