<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    public function store(Request $request, Post $post) {
        $request->validate(['contenido' => 'required']);

        Review::create([
            'user_id' => Auth::id(),
            'post_id' => $post->id,
            'content' => $request->contenido
        ]);

        return back();
    }

    public function edit(Post $post, Review $review) {
        $exists = Review::where('post_id', $post->id)->first(); 
        if((Auth::user()->id != $review->user_id) || is_null($exists)) {
            return back();
        }
        return view('reviews.edit', ['title' => 'Editar Comentario', 'review' => $review, 'post' => $post]);
    }

    public function update(Request $request, Review $review) {
        $request->validate(['contenido' => 'required']);
        $review->update(['content' => $request->contenido]);

        return to_route('users.reviews')->with('status', 'Comentario actualizado con exito');
    }

    public function destroy(Review $review) {
        $review->delete();
        return back();
    }
}
