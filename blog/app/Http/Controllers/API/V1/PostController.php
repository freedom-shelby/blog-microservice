<?php

namespace App\Http\Controllers\API\V1;

use App\DTO\PostDTO;
use App\Http\Controllers\Controller;
use App\Services\API\Weather\PostInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

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

        return response()->json($this->postService->create($postDTO));
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

        return response()->json($this->postService->update($postDTO));
    }

    public function delete(int $id): JsonResponse
    {
        return response()->json($this->postService->delete($id));
    }
}
