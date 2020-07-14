<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Post;
use App\Category;
use Illuminate\Support\Str;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::with('category')->get();
        return view('admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.posts.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
              'title' => 'required|max:255|unique:posts,title',
              'content' => 'required'
          ]);
        $dati = $request->all();
        $slug = Str::of($dati['title'])->slug('-');
        $slug_originale = $slug;
        $post_trovato = Post::where('slug', $slug)->first();
        $contatore = 0;
        while ($post_trovato) {
            $contatore++;
            $slug = $slug_originale . '-' . $contatore;
            $post_trovato = Post::where('slug', $slug)->first();
        }
        $dati['slug'] = $slug;
        $nuovo_post = new Post();
        $nuovo_post->fill($dati);
        $nuovo_post->save();
        return redirect()->route('admin.posts.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);
        if ($post) {
            return view('admin.posts.show', compact('post'));
        } else {
            return abort('404');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);
        if ($post) {
            $categories = Category::all();
            $data = [
                'post' => $post,
                'categories' => $categories
            ];
            return view('admin.posts.edit', $data);
        } else {
            return abort('404');
        }
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
        $request->validate([
              'title' => 'required|max:255|unique:posts,title,'.$id,
              'content' => 'required'
          ]);

        $dati = $request->all();
        $slug = Str::of($dati['title'])->slug('-');
        $slug_originale = $slug;
        $post_trovato = Post::where('slug', $slug)->first();
        $contatore = 0;
        while ($post_trovato) {
            $contatore++;
            $slug = $slug_originale . '-' . $contatore;
            $post_trovato = Post::where('slug', $slug)->first();
        }
        $dati['slug'] = $slug;
        $post = Post::find($id);
        $post->update($dati);
        return redirect()->route('admin.posts.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        if ($post) {
            $post->delete();
            return redirect()->route('admin.posts.index');
        } else {
            return abort('404');
        }
    }
}
