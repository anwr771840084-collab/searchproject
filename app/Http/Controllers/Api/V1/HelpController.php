<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Resources\Api\V1\HelpResource;
use App\Services\HelpService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class HelpController extends BaseController
{
    protected $helpService;

    public function __construct(HelpService $helpService)
    {
        $this->helpService = $helpService;
    }

    /**
     * جلب قائمة طلبات المساعدة.
     */
    public function index()
    {
        $helps = $this->helpService->getAllHelps();
        return $this->sendResponse(HelpResource::collection($helps), 'Helps fetched successfully.');
    }

    /**
     * إضافة طلب مساعدة جديد.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name'    => 'required|string|max:255',
            'email'   => 'required|email|max:255',
            'phone'   => 'required|string|max:20',
            'message' => 'required|string|max:1000',
            'image'   => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'address' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            return $this->sendError('Validation Error.', $validator->errors(), 422);
        }

        $help = $this->helpService->storeHelp($request->all(), $request->file('image'));

        return $this->sendResponse(new HelpResource($help), 'Help request created successfully.', 201);
    }

    /**
     * تحديث حالة التسليم للمعثورات عن طريق الـ API.
     */
    public function toggleDelivery($id)
    {
        $help = $this->helpService->toggleDeliveryStatus($id);
        return $this->sendResponse(new HelpResource($help), 'Help delivery status updated successfully.');
    }

    /**
     * حذف بلاغ معثورات عن طريق الـ API.
     */
    public function destroy($id)
    {
        $this->helpService->deleteHelp($id);
        return $this->sendResponse([], 'Help report deleted successfully.');
    }
}
