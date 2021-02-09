<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Posts;
use App\Tags;
use App\Categories;
use App\Posts_info;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $posts = Posts::all();
      return view('post', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $tags = Tags::all();
      $categorie = Categories::all();

      return view('post_create', compact(['tags', 'categorie']));
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

      $nuovo_post = new Posts();
      $nuovo_post_info = new Posts_info();

      $nuovo_post->title = $data['title'];
      $nuovo_post->author = $data['author'];
      $nuovo_post->category_id = $data['category_id'];
      $nuovo_post_info->description = $data['description'];
      $nuovo_post_info->slug = 'example';

      $nuovo_post->save();

      $nuovo_post_info->post_id = $nuovo_post->id;

      $nuovo_post_info->save();

      $nuovo_post->post_tag()->attach($data['tags']);

      return redirect()->route('post.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $post = Posts::find($id);
      return view('single_post', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $post = Posts::find($id);

      $post->post_post_info->delete();

      foreach ($post->post_tag as $tag) {
        $post->post_tag()->detach($tag->id);
      }

      $post->delete();

      return redirect()->route('post.index');

    }
}
