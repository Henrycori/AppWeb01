<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CommentController extends Controller
{
   public function store(Request $request, Post $post)
{
    $request->validate([
        'content' => 'required|string'
    ]);

    $post->comments()->create([
        'content' => $request->content,
        'user_id' => Auth::id(),
    ]);

    return back()->with('success', 'Comentario agregado.');
}

}
