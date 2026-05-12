<?php

namespace App\Http\Resources\Api\V1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PostResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'email' => $this->email,
            'phone' => $this->phone,
            'image_url' => $this->image ? asset($this->image) : null,
            'message' => $this->massage, // تعيين الاسم الصحيح هنا مع جلب القيمة من الحقل الأصلي massage
            'is_delivered' => (bool) $this->is_delivered,
            'address' => $this->address,
            'created_at' => $this->created_at->format('Y-m-d H:i:s'),
        ];
    }
}
