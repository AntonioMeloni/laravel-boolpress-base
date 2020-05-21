<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;

use App\Post;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();
        // dd($posts);
        return view('posts.index', compact('posts'));
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexPublished()
    {
        $posts = Post::where('published', 1)->get();
        // dd($posts);
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
        $data = $request->all();
        $data['slug'] = Str::slug($data['title'], '-');

        $validator = Validator::make($data,[
          'title'=> 'required|string|max:150',
          'body'=> 'required',
          'author'=> 'required',
          'img'=> 'required',
          'published'=> 'required'
        ]);

        if ($validator->fails()) {
          return redirect('posts/create')->withErrors($validator)->withInput();
        }
        $post = new Post;
        $post->fill($data);
        $saved = $post->save();
        if (!$saved) {
          echo "Error";
        }

        return redirect()->route('posts.show', $post->slug);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $post = Post::where('slug', $slug)->first();
        if(empty($post)){
          abort('404');
        }

        return view('posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Post $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        if (empty($post)) {
          abort('404');
        }

        return view('posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

      $post = Post::find($id);
      if (empty($post)) {
        abort('404');
      }

      $data = $request->all();
      $data['slug'] = Str::slug($data['title'], '-');

      $validator = Validator::make($data,[
        'title'=> 'required|string|max:150',
        'body'=> 'required',
        'author'=> 'required',
        'img'=> 'required',
        'published'=> 'required'
      ]);

      if ($validator->fails()) {
        return redirect('posts.edit')->withErrors($validator)->withInput();
      }

      $post->fill($data);
      $updated = $post->update();
      if (!$updated) {
        echo "Error";
      }

      return redirect()->route('posts.show', $post->slug);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
