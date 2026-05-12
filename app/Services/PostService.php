<?php

namespace App\Services;

use App\Models\Post;

class PostService
{
    /**
     * جلب كافة المنشورات.
     */
    public function getAllPosts()
    {
        return Post::orderBy('created_at', 'desc')->get();
    }

    /**
     * حفظ منشور جديد مع معالجة الصورة.
     * الصور تُحفظ في: public/images/
     */
    public function storePost(array $data, $imageFile = null)
    {
        $imagePath = null;
        if ($imageFile) {
            $imageName = time() . '.' . $imageFile->getClientOriginalExtension();
            $imageFile->move(public_path('images'), $imageName);
            $imagePath = 'images/' . $imageName;
        }

        return Post::create([
            'name'         => $data['name'],
            'email'        => $data['email'],
            'phone'        => $data['phone'],
            'image'        => $imagePath,
            'massage'      => $data['massage'] ?? ($data['message'] ?? null),
            'is_delivered' => false,
            'address'      => $data['address'] ?? null,
        ]);
    }

    /**
     * تحديث حالة التسليم.
     */
    public function toggleDeliveryStatus($id)
    {
        $post = Post::findOrFail($id);
        $post->is_delivered = !$post->is_delivered;
        $post->save();
        return $post;
    }

    /**
     * حذف بلاغ مفقودات.
     */
    public function deletePost($id)
    {
        $post = Post::findOrFail($id);
        if ($post->image) {
            $imagePath = public_path($post->image);
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
        }
        return $post->delete();
    }
}
