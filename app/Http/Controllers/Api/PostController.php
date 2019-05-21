<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\CommentsResource;
use App\Http\Resources\PostResource;
use App\Http\Resources\PostsResource;
use App\Post;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PostController extends Controller
{

    /**
     * @return PostsResource
     */
    public function index()
    {
        $posts = Post::paginate( env('POSTS_PER_PAGE') );
        return new PostsResource( $posts );
    }

    /**
     * @param Request $request
     * @return PostResource
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'content'   => 'required',
            'category_id'   => 'required'
        ]);

        $user = $request->user();

        $post = new Post();

        $post->title = $request->get( 'title' );
        $post->content = $request->get( 'content' );
        if( intval( $request->get( 'category_id' ) ) != 0 ){
            $post->category_id = intval( $request->get( 'category_id' ) );
        }
        $post->user_id = $user->id;

        // TODO: Handle featured_image File Upload
        $post->votes_up = 0;
        $post->votes_down = 0;

        $post->date_written = Carbon::now()->format('Y-m-d H:i:s');

        $post->save();

        return new PostResource( $post );
    }

    /**
     * @param $id
     * @return PostResource
     */
    public function show( $id )
    {
        $post = Post::find( $id );
        return new PostResource( $post );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    /**
     * @param $id
     * @return CommentsResource
     */
    public function comments( $id ){
        $post = Post::find( $id );
        $comments = $post->comments()->paginate( env( 'COMMENTS_PER_PAGE' ) );
        return new CommentsResource( $comments );
    }
}
