<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang;
use App\Models\Pesanan;
use App\Models\Pesanan_detail;
use Alert;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.index');
    }

    public function admin(Request $request)
    {
        $validatedData = $request->validate([
            'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
    
           ]);
        
        $barang = new Barang;
        $barang->nama_barang = $request->nama_barang;
        $barang->harga = $request->harga;
        $barang->stok = $request->stok;
        $barang->keterangan = $request->keterangan;
        $pesanan->image = $request->file('image');
        $pesanan->save();

        Alert::success('Data berhasil diinput', 'Berhasil');
        return redirect('/dashboard');
    }
}
