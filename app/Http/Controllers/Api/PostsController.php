<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PostsController extends Controller
{
    public function listar()
    {
        $posts = \App\Post::all();

        $collection = collect();
        foreach ($posts as $post) {

            $tags = \DB::table('tag_post')->where('post_id', '=', $post->id)
                ->join('tags', 'tag_post.tag_id', '=', 'tags.id')
                ->get();

            $post->tags = $tags->pluck('name');
            $collection->push($post);
        }

        return $collection;
    }

    public function apenas($id)
    {
        $post = \DB::table('posts')
            ->where('posts.id', '=', $id)
            ->join('tag_post', 'post_id', '=', 'posts.id')
            ->first();

        $tags = \DB::table('tag_post')->where('post_id', '=', $post->id)
            ->join('tags', 'tag_post.tag_id', '=', 'tags.id')
            ->get();

        $post->tags = $tags->pluck('name');

        return response()->json($post);
    }
}
