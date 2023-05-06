<?php

namespace App\Http\Controllers;

use App\Cate;
use App\Nation;
use App\Year;
use App\Language;
use App\Movie;
use App\Link;
use App\User;
use App\Comment;
use Illuminate\Http\Request;
use Auth;

class CommentController extends Controller
{

    public function postComment(Request $request, $movie_id)
    {
        if (session('username_minmovies')) {
            $username = session('username_minmovies');
            $user = User::where('username', $username)->first();
            $user_id = $user->id;
            $comment = new Comment;
            $comment->user_id = $user_id;
            $comment->movie_id = $movie_id;
            $comment->comment = $request->comment;
            $comment->save();
        }
    }
    public function editComment(Request $request, $comment_id)
    {
        $comment = Comment::find($comment_id);
        $comment->comment = $request->comment;
        $comment->save();
    }
    public function delComment($comment_id)
    {
        $comment = Comment::find($comment_id);
        $comment->delete();
        return redirect()->back();
    }
    public function index()
    {
        $movie = Movie::all();
        $user = User::all();
        $comment = Comment::all();
        return view('admin.comment.list', compact('movie', 'user', 'comment'));
    }
    public function adminDelComment($id)
    {
        $comment = Comment::find($id);
        $comment->delete();
        return redirect()->route('admin.comment.list')->with(['thongbao_level' => 'success', 'thongbao' => '<b>Xoá bình luận thành công!</b>']);
    }
}