<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Services\PostService;
use Illuminate\Http\Request;
class PostController extends Controller
{
    protected $postService;

    public function __construct(PostService $postService)
    {
        $this->postService = $postService;
    }

    public function create(){
        return view('contact');

    }
    public function store(Request $request){
        $this->postService->storePost($request->all(), $request->file('image'));
        
        return back();

    }
    public function desblay(){
        $data=Post::all();
        return view('admin/layout-static',['data'=>$data]);
    }

    public function toggleDelivery($id)
    {
        $this->postService->toggleDeliveryStatus($id);
        return back()->with('success', 'تم تحديث حالة التسليم بنجاح');
    }
}
