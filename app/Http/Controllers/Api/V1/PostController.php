<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Resources\Api\V1\PostResource;
use App\Services\PostService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PostController extends BaseController
{
    protected $postService;

    public function __construct(PostService $postService)
    {
        $this->postService = $postService;
    }

    /**
     * جلب قائمة المنشورات.
     */
    public function index()
    {
        $posts = $this->postService->getAllPosts();
        return $this->sendResponse(PostResource::collection($posts), 'Posts fetched successfully.');
    }

    /**
     * إضافة منشور جديد.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name'    => 'required|string|max:255',
            'email'   => 'required|email|max:255',
            'phone'   => 'required|string|max:20',
            'massage' => 'required_without:message|string|max:1000',
            'message' => 'required_without:massage|string|max:1000',
            'image'   => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'address' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            return $this->sendError('Validation Error.', $validator->errors(), 422);
        }

        $post = $this->postService->storePost($request->all(), $request->file('image'));

        return $this->sendResponse(new PostResource($post), 'Post created successfully.', 201);
    }

    /**
     * تحديث حالة التسليم عن طريق الـ API.
     */
    public function toggleDelivery($id)
    {
        $post = $this->postService->toggleDeliveryStatus($id);
        return $this->sendResponse(new PostResource($post), 'Delivery status updated successfully.');
    }

    /**
     * حذف بلاغ مفقودات عن طريق الـ API.
     */
    public function destroy($id)
    {
        $this->postService->deletePost($id);
        return $this->sendResponse([], 'Post deleted successfully.');
    }
}
