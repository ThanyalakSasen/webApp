<?php

namespace App\Http\Controllers;

use App\Models\Dashboard;
use Illuminate\Http\Request;
use App\Models\CarInfo;

class DashboardController extends Controller
{
    public function create(Request $request)
    {
        // ตรวจสอบความถูกต้องของข้อมูล
        $request->validate([
            'shipping-type' => 'required|string|max:255',
            'vehicle-type' => 'required|string|max:255',
            'date-entry' => 'required|date',
            'date-exit' => 'required|date|after:date-entry',
            'duration' => 'required|integer|min:1',
            'carInfo' => 'required|string', // ตรวจสอบว่ามีการเลือกหมายเลขทะเบียน
        ]);

        // สร้างรายการใหม่ใน dashboard
        Dashboard::create([
            'shippingType' => $request->input('shipping-type'),
            'vehicleType' => $request->input('vehicle-type'),
            'dateEntry' => $request->input('date-entry'),
            'dateExit' => $request->input('date-exit'),
            'duration' => $request->input('duration')[0] ?? null, // สำหรับระยะเวลา
            'license_plate' => $request->input('carInfo'), // เพิ่มหมายเลขทะเบียน
        ]);

        return redirect()->route('dashboard')->with('success', 'สร้างรายการใน Dashboard สำเร็จแล้ว.');
    }
    
    // public function index()
    // {
    //     $dashboards = Dashboard::with('carInfo')->get(); // ดึงข้อมูลจาก Dashboard พร้อม carInfo
    //     $carInfos = CarInfo::all(); // ดึงข้อมูลรถทั้งหมด
    
    //     return view('dashboard', compact('dashboards', 'carInfos'));
    // }
}
