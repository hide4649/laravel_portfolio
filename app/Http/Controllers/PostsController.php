<?php

namespace App\Http\Controllers;

use App\Post;
use App\Comment;
use App\Http\Requests\PostRequest;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    
    public function index(){
        $posts = Post::paginate(10);
        return view('posts.index')->with('posts',$posts);
    }


    public function post(){
        return view('posts.post');
    }


    public function show(Post $post){
        
        $orderbys = Post::where('user_id', $post->user_id)->latest()->limit(3)->get();
        $randoms = Post::where('user_id', $post->user_id)->inRandomOrder()->take(3)->get();
        $comments = Comment::where('post_id',$post->id)->get();
        return view('posts.show',compact('orderbys','randoms','comments'))->with('post',$post);
    
    }


    public function store(PostRequest $request){
          
        if($request->file('image')) {
            $post = new Post;
            $post->user_id = $request->user_id;
            $post->category_id = $request->category_id;
            $post->body = $request->body;
            $post->title = $request->title;
            
            $image = $request->file('image');
            $filename = $image->store('public/image');
            $post->image = basename($filename);

            $post->save();

        }elseif($request->file('image') === null){
            $post = new Post;
            $post->user_id = $request->user_id;
            $post->category_id = $request->category_id;
            $post->body = $request->body;
            $post->title = $request->title;
            $post->save();
        }


        return redirect('/');
    }


    public function editpost(Post $post){
        return view('posts.editpost')->with('post', $post);
    }


    public function update(PostRequest $request, Post $post) {
        
        $exist = User::where('image', $post->image)->exists();
        
        if($exist){

            \File::delete('public/proflieimage/'. $post->image);
            if($request->file('image')) { 
                $post->name = $request->name;
                $image = $request->file('image');
               
                $filename = $image->store('public/proflieimage');
    
                $post->image = basename($filename);
                $post->save();
            }else{
                $post->name = $request->name;
                $post->save();
            }

        }else{

            if($request->file('image')) { 
                $post->name = $request->name;
                $image = $request->file('image');
               
                $filename = $image->store('public/proflieimage');
    
                $post->image = basename($filename);
                $post->save();
            }
        }

        return redirect('/');
        
    }


    public function destroy(Post $post) {
        
        $deleteimg = $post->image;
  
        if($deleteimg === null){
          $post->delete();  
         }
         else{
          \File::delete('public/image/'.$deleteimg);
          $post->delete();
         }
         return redirect('/');
    }

    

}