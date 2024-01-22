<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function postList()
    {
        $posts = Post::all();

        return view('posts.post-list', compact('posts'));
    }
    public function likePost($id)
    {
        $post = Post::find($id);
        $post->like();
        $post->save();
        $post->like(); // like the post for current user
        $post->like($id); // pass in your own user id
        $post->like(0); // just add likes to the count, and don't track by user

        $post->unlike(); // remove like from the post
        $post->unlike($id); // pass in your own user id
        $post->unlike(0); // remove likes from the count -- does not check for user

        $post->likeCount; // get count of likes

        $post->likes; // Iterable Illuminate\Database\Eloquent\Collection of existing likes

        $post->liked(); // check if currently logged in user liked the post-
        $post->liked($id);

        post::whereLikedBy($id) // find only posts where user liked them
            ->with('likeCounter') // highly suggested to allow eager load
            ->get();

        return redirect()
            ->route('post.list')
            ->with('message', 'Post Like successfully!');
    }

    public function unlikePost($id)
    {
        $post = Post::find($id);
        $post->unlike();
        $post->save();

        return redirect()
            ->route('post.list')
            ->with('message', 'Post Like undo successfully!');
    }
}
