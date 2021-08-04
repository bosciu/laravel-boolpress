<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Post;

class PostController extends Controller
{
    public function index(){
        $posts = Post::paginate(4);
        foreach ($posts as $post) {
            if($post->cover){
                $post->cover = url('storage/' . $post->cover);
            }else{
                $post->cover = url('storage/covers/default.jpg');
            }
        }
        return response()->json($posts);
    }

    public function show($slug){
        $post = Post::where('slug', $slug)->with(['category', 'tags'])->first();
        if($post->cover){
            $post->cover = url('storage/' . $post->cover);
            }else {
                $post->cover = url('storage/covers/default.jpg');
            }
        return response()->json($post);
    }
}
