<?php

namespace App\Http\Controllers\Api;

use App\Category;
use App\Comment;
use App\Http\Resources\CategoriesResource;
use App\Http\Resources\CommentsResource;
use App\Http\Resources\PostsResource;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    public function index()
    {
        return new CategoriesResource( Category::paginate( env('CATEGORIES_PER_PAGE') ) );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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

    public function posts( $id ){
        $category = Category::find( $id );
        $posts = $category->posts()->paginate( env('POSTS_PER_PAGE') );
        return new PostsResource( $posts );
    }
}
