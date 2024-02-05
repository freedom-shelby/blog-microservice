<?php

namespace App\Http\Controllers\API\V1;

use App\DTO\PostDTO;
use App\Http\Controllers\Controller;
use App\Services\API\PostInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Jobs\Post\PostCreated;
use App\Jobs\Post\PostDeleted;
use App\Jobs\Post\PostUpdated;

class PostController extends Controller
{
    public function __construct(protected PostInterface $postService)
    {
    }

    public function create(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string',
            'author' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 422);
        }

        $title = $request->input('title');
        $author = $request->input('author');

        $postDTO = new PostDTO($title, $author);

        $post = $this->postService->create($postDTO);

        PostCreated::dispatch([
            'id' => $post->getKey(),
            'message' => 'Post Created',
        ]);

        return response()->json($post);
    }

    public function update(Request $request, int $id): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string',
            'author' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 422);
        }

        $title = $request->input('title');
        $author = $request->input('author');

        $postDTO = new PostDTO($title, $author, $id);

        $post = $this->postService->update($postDTO);

        PostUpdated::dispatch([
            'id' => $post->getKey(),
            'message' => 'Post Updated',
        ]);

        return response()->json($post);
    }

    public function delete(int $id): JsonResponse
    {
        $deleted = $this->postService->delete($id);

        PostDeleted::dispatch([
            'id' => $id,
            'message' => 'Post Deleted',
        ]);

        return response()->json($deleted);
    }
}
