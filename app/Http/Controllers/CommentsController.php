<?php

namespace App\Http\Controllers;
use App\Post;
use Illuminate\Http\Request;
use App\Comment;
use App\User;
use App\Http\Requests\PostRequest;

class CommentsController extends Controller
{
    public function store(Request $request, Post $post){
        $comment = new Comment;
        $comment->body = $request->body;
        $comment->user_id = $request->user_id;
        $comment->post_id = $post->id;
        $comment->save();

        return redirect()->action('PostsController@show', $post);
      }
  
      public function destroy(Post $post, Comment $comment){
        $comment->delete();
        return redirect()->back();
      }
}
