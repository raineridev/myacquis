<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Models\Post;
use Illuminate\Http\Request;
use Laravel\Sanctum\PersonalAccessToken;

class PostController extends Controller
{
    private $idByToken;

    public function __construct(Request $request)
    {
        $this->idByToken = PersonalAccessToken::findToken($request->bearerToken())->id;
    }

    public function store(PostRequest $request)
    {
        $post = Post::create(array_merge($request->validated(), ["user_id" => $this->idByToken]));
        return response()->json($post, 201);
    }

    public function index(Request $request)
    {

        $post = Post::where('user_id', $this->idByToken)->get()->makeHidden('user_id');

        return response()->json($post);
    }

    public function show($id)
    {
        try
        {
            $post = Post::where('id', $id)->where('user_id', $this->idByToken)->firstOrFail();
            return response()->json($post, 200);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json(['error' => 'Post not found or you do not have permission to view this post'], 404);
        } catch (\Exception $e) {
            return response()->json(['error' => 'An error occurred while fetching the post'], 500);
        }

    }
}
