<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\University;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request, University $university)
    {
        $request->validate([
            'content' => 'required|string',
        ]);

        $comment = new Comment();
        $comment->content = $request->content;
        $comment->user_id = auth()->id();
        $comment->university_id = $university->id;
        $comment->save();

        return back()->with('success', 'Comment added successfully!');
    }

    public function destroy(Comment $comment)
    {
        $this->authorize('delete', $comment);

        $comment->delete();

        return back()->with('success', 'Comment deleted successfully!');
    }
}
