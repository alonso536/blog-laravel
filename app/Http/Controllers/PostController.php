<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PostController extends Controller {
    public function index($user = 0) {
        if($user > 0) {
            $posts = Post::orderBy('created_at', 'desc')->where('user_id', $user)->paginate(5);
        } else {
            $posts = Post::orderBy('created_at', 'desc')->paginate(5);
        }
        return view('posts.index', ['posts' => $posts]);
    }

    public function create() {
        return view('posts.create', ['title' => 'Escribir Nota']);
    }

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

    public function show(Post $post) {
        return view('posts.show', ['post' => $post]);
    }

    public function edit(Post $post) {
        if(Auth::user()->id != $post->user_id) {
            return back();
        }
        return view('posts.edit', ['title' => 'Editar Nota', 'post' => $post]);
    }

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

    public function destroy(Post $post) {
        $post->delete();
        return back()->with('status', 'Nota borrada con exito');
    }

    public function restore($post) {        
        DB::table('posts')->where('id', $post)->update(['deleted_at' => null]);
        return back()->with('status', 'Nota restaurada con exito');
    }
}
