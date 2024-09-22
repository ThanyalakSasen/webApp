<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReservationController extends Controller
{
    public function index(){
        $reserves = Reserve::all();
        return view('ชื่อ blad view', compact('reserves'));
    }
    // ฟังก์ชันเพิ่มข้อมูลการจอง
    public function insert(Request $request){
        $new_reserve = new $reserves;
        $new_reserve -> typedata = $request-> nameInput;
        $request -> save();
        return view('ชื่อ blad view', compact('reserves'));
    }
    public function update(Request $request){
        $reserves = Reserve::find($request);
        $request ->save();
        return view('ชื่อ blad view', compact('reserves'));
    }
}
