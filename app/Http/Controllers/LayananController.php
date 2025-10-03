<?php

namespace App\Http\Controllers;

use App\Models\Layanan;
use Illuminate\Http\Request;

class LayananController extends Controller
{
    public function index() {
        $layanans = Layanan::all();
        return view('layanan.index',compact('layanans'));
    }
    public function create() { return view('layanan.create'); }
    public function store(Request $r) {
        Layanan::create($r->all());
        return redirect()->route('layanan.index');
    }
    public function edit(Layanan $layanan) {
        return view('layanan.edit',compact('layanan'));
    }
    public function update(Request $r, Layanan $layanan) {
        $layanan->update($r->all());
        return redirect()->route('layanan.index');
    }
    public function destroy(Layanan $layanan) {
        $layanan->delete();
        return back();
    }
}
