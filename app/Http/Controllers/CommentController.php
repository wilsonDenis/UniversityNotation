<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Rating;
use App\Models\University;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log; 

class CommentController extends Controller
{
    public function store(Request $request, University $university)
    {
        $request->validate([
            'content' => 'required|string',
            'rating' => 'required|integer|min:1|max:5'
        ]);

        Log::info('Storing new comment and rating.', ['user_id' => Auth::id(), 'university_id' => $university->id, 'content' => $request->content, 'rating' => $request->rating]);

        Comment::create([
            'user_id' => Auth::id(),
            'university_id' => $university->id,
            'content' => $request->content
        ]);

        Rating::create([
            'user_id' => Auth::id(),
            'university_id' => $university->id,
            'score' => $request->rating
        ]);

        return redirect('/dashboard')->with('success', 'Comment and rating added successfully.');
    }

    public function getComments(University $university)
    {
        $comments = Comment::with('user')
            ->where('university_id', $university->id)
            ->orderBy('created_at', 'desc')
            ->get();

        return view('comments', compact('comments'));
    }
    public function getCommentToAdmin()
    {
        $comments = Comment::with('user')->orderBy('created_at', 'desc')->get();
        return view('admin.comments.commentboard', compact('comments'));
    }




    public function destroy(Comment $comment)
    {
        try {

            // $this->authorize('delete', $comment);
            $comment->delete();


            Log::info('Comment deleted successfully: ' . $comment->id);

            return back()->with('success', 'Comment deleted successfully!');
        } catch (\Exception $e) {
            Log::error('Error deleting comment: ' . $e->getMessage());
            return redirect()->route('comments.toAdmin')->with('error', 'An error occurred while deleting the comment.');
        }
    }
}
