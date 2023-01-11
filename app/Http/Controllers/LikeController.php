<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Post;
use App\Models\User;
use App\Models\Like;


class LikeController extends Controller
{
    public function store(Post $post) {
        Like::create([
            'post_id' => $post->id,
            'user_id' => Auth::id()
        ]);

        return back()->with('like', 'Esta nota te gusta');
    }

    public function destroy(Post $post, User $user) {
        $like = Like::where('post_id', $post->id)->where('user_id', $user->id);

        if($like) {
            $like->delete();
            return back()->with('like', 'Ya no te gusta esta nota');
        }

        return back()->withErrors('error', 'Tuvimos un problema');
    }
}
