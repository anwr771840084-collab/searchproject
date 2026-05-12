<?php

namespace App\Http\Controllers;

use App\Models\Help;
use App\Services\HelpService;
use Illuminate\Http\Request;

class HelpController extends Controller
{
    protected $helpService;

    public function __construct(HelpService $helpService)
    {
        $this->helpService = $helpService;
    }

    /**
     * عرض صفحة طلب المساعدة
     */
    public function create()
    {
        return view('help');
    }

    /**
     * حفظ طلب المساعدة في قاعدة البيانات
     */
    public function store(Request $request){
        $this->helpService->storeHelp($request->all(), $request->file('image'));
        
        return back();

    }
    public function gaza(){
        $data=Help::all();
        return view('admin/layout-sidenav-light',['data'=>$data]);
    }

    public function toggleDelivery($id)
    {
        $this->helpService->toggleDeliveryStatus($id);
        return back()->with('success', 'تم تحديث حالة التسليم بنجاح');
    }
}

  