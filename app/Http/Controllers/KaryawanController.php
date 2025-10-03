<?php

namespace App\Http\Controllers;

use App\Models\Karyawan;
use Illuminate\Http\Request;

class KaryawanController extends Controller
{
    public function index() {
        $karyawans = Karyawan::all();
        return view('karyawan.index',compact('karyawans'));
    }
    public function create() { return view('karyawan.create'); }
    public function store(Request $r) {
        Karyawan::create($r->all());
        return redirect()->route('karyawan.index');
    }
    public function edit(Karyawan $karyawan) {
        return view('karyawan.edit',compact('karyawan'));
    }
    public function update(Request $r, Karyawan $karyawan) {
        $karyawan->update($r->all());
        return redirect()->route('karyawan.index');
    }
    public function destroy(Karyawan $karyawan) {
        $karyawan->delete();
        return back();
    }
}
