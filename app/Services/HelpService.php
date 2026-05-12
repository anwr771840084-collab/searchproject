<?php

namespace App\Services;

use App\Models\Help;

class HelpService
{
    /**
     * جلب كافة طلبات المساعدة.
     */
    public function getAllHelps()
    {
        return Help::orderBy('created_at', 'desc')->get();
    }

    /**
     * حفظ طلب مساعدة جديد مع معالجة الصورة.
     * الصور تُحفظ في: public/images2/
     */
    public function storeHelp(array $data, $imageFile = null)
    {
        $imagePath = null;
        if ($imageFile) {
            $imageName = time() . '.' . $imageFile->getClientOriginalExtension();
            $imageFile->move(public_path('images2'), $imageName);
            $imagePath = 'images2/' . $imageName;
        }

        return Help::create([
            'name'         => $data['name'],
            'email'        => $data['email'],
            'phone'        => $data['phone'],
            'image'        => $imagePath,
            'message'      => $data['message'],
            'is_delivered' => false,
            'address'      => $data['address'] ?? null,
        ]);
    }

    /**
     * تحديث حالة التسليم للمعثورات.
     */
    public function toggleDeliveryStatus($id)
    {
        $help = Help::findOrFail($id);
        $help->is_delivered = !$help->is_delivered;
        $help->save();
        return $help;
    }

    /**
     * حذف بلاغ معثورات.
     */
    public function deleteHelp($id)
    {
        $help = Help::findOrFail($id);
        if ($help->image) {
            $imagePath = public_path($help->image);
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
        }
        return $help->delete();
    }
}
