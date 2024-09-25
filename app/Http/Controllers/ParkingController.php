<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ParkingController extends Controller
{
    // ฟังก์ชันที่ใช้แสดงฟอร์ม
    public function showForm()
    {
        return view('parking');
    }

    // ฟังก์ชันที่จัดการเมื่อฟอร์มถูกส่ง
    public function submitForm(Request $request)
    {
        // Validate ข้อมูลที่ได้รับจากฟอร์ม
        $request->validate([
            // การ validate ตามประเภทของการจอด (รายชั่วโมง, รายวัน, รายเดือน)
            'parking_type' => 'required',
            'vehicle_type_hourly' => 'required_if:parking_type,hourly',
            'parking_spot_hourly' => 'required_if:parking_type,hourly',
            'parking_date_in_hourly' => 'required_if:parking_type,hourly',
            'parking_time_in_hourly' => 'required_if:parking_type,hourly',
            'parking_time_out_hourly' => 'required_if:parking_type,hourly',
            'vehicle_type_daily' => 'required_if:parking_type,daily',
            'parking_spot_daily' => 'required_if:parking_type,daily',
            'parking_date_in_daily' => 'required_if:parking_type,daily',
            'parking_date_out_daily' => 'required_if:parking_type,daily',
            'vehicle_type_monthly' => 'required_if:parking_type,monthly',
            'parking_spot_monthly' => 'required_if:parking_type,monthly',
            'parking_date_in_monthly' => 'required_if:parking_type,monthly',
            'parking_duration_monthly' => 'required_if:parking_type,monthly',
        ]);

        // ประมวลผลข้อมูลที่ได้รับ เช่น บันทึกลงฐานข้อมูล
        $data = $request->all();

        // หลังจากบันทึกข้อมูลเรียบร้อยแล้ว ให้ส่งผู้ใช้กลับไปที่หน้าฟอร์มพร้อมกับข้อความยืนยัน
        return back()->with('success', 'Form submitted successfully!');
    }
}

