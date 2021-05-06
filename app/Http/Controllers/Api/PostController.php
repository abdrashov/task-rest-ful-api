<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Api\JwtController;
use App\Http\Resources\Post\PostResource;
use App\Http\Resources\Post\PostUpdateResource;
use App\Http\Resources\Post\PostsResource;
use App\Http\Resources\Post\PostsShowResource;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PostController extends JwtController
{
	public function index()
	{
		return PostsResource::collection(Post::all());
	}

	public function show($id)
	{
		if( !$post = Post::find($id) ){
			return response()->json([
			      'status'   => 'error',
			      'message'  => ['wrong' => ['Not found']]
			   ], 404);
		}
		return new PostsShowResource($post);
	}

	public function store(Request $request)
	{
		$validator = Validator::make($request->all(), [
			'title' => 'required',
			'content' => 'required',
		]);

		if ($validator->fails()) {
			return response()->json([
			      'status'   => 'error',
			      'message'  => $validator->getMessageBag()
			   ], 422);
		}

		$post = auth()->user()->hasPosts()->create($request->all());

		return new PostResource($post);
	}

	public function update(Request $request, $id)
	{
		$validator = Validator::make($request->all(), [
			'title' => 'required',
			'content' => 'required',
		]);

		if ($validator->fails()) {
			return response()->json([
			      'status'   => 'error',
			      'message'  => $validator->getMessageBag()
			   ], 422);
		}

		if( !$post = auth()->user()->hasPosts()->find($id) ){
			return response()->json([
			      'status'   => 'error',
			      'message'  => ['wrong' => ['Not found']]
			   ], 404);
		}

		$post->update([
			'title' => $request->title,
			'content' => $request->content,
		]);

		return new PostUpdateResource($post);
	}

	public function destroy($id)
	{
		if( !$post = auth()->user()->hasPosts()->find($id) ){
			return response()->json([
			      'status'   => 'error',
			      'message'  => ['wrong' => ['Not found']]
			   ], 404);
		}

		$post->delete();

		return response()->json([
			'message' => 'Post success delete'
		], 200);
	}

}
