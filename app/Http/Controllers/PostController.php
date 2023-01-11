<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PostController extends Controller {
    public function index() {
        $posts = Post::orderBy('created_at', 'desc')->paginate(5);
        return view('posts.index', ['posts' => $posts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        return view('posts.create', ['title' => 'Escribir Nota']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $request->validate([
            'texto' => ['required', 'regex:/^[A-Za-z0-9\s\-\_.,;:]{10,25}$/'],
            'contenido' => ['required']
        ]);

        Post::create([
            'user_id' => Auth::id(),
            'title' => $request->texto,
            'content' => $request->contenido
        ]);

        return back()->with('status', 'Nota creada con exito');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post) {
        return view('posts.show', ['post' => $post]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post) {
        return view('posts.edit', ['title' => 'Editar Nota', 'post' => $post]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post) {
        $request->validate([
            'texto' => ['required', 'regex:/^[A-Za-z0-9\s\-\_.,;:]{10,25}$/'],
            'contenido' => ['required']
        ]);

        $post->update([
            'title' => $request->texto,
            'content' => $request->contenido
        ]);

        return back()->with('status', 'Nota actualizada con exito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post) {
        $post->delete();
        return back()->with('status', 'Nota borrada con exito');
    }

    public function restore($post) {        
        DB::table('posts')->where('id', $post)->update(['deleted_at' => null]);
        return back()->with('status', 'Nota restaurada con exito');
    }
}
