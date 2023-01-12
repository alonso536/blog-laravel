<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;


class HomeController extends Controller
{
    public function index() {
        $posts = $this->getPosts();
        $users = $this->getUsers();

        return view('home', [
            'posts' => $posts->original,
            'users' => $users->original
        ]);
    }

    public function store(Request $request) {
        $search = $request->search;

        $header = 'Resultados de la búsqueda';
        $posts = $this->getPostSearch($search);
        $users = $this->getUsers();

        if(is_null($posts)) {
            $error = true;
            return view('home', [
                'header' => $header,
                'error' => $error,
                'users' => $users->original
            ]);
        }

        return view('home', [
            'header' => $header,
            'posts' => $posts->original,
            'users' => $users->original
        ]);
    }

    private function getPosts() {
        $posts = Post::orderBy('created_at', 'desc')->limit(5)->get();
        return response()->json($posts);
    }

    private function getUsers() {
        $users = User::orderBy('created_at', 'desc')->limit(5)->get();
        return response()->json($users);
    }

    private function getPostSearch($search) {
        $posts = Post::orderBy('created_at', 'desc')
                                ->where('title', 'like', '%'.$search.'%')
                                ->orWhere('content', 'like', '%'.$search.'%')
                                ->paginate(7);
        return response()->json($posts);
    }
}
