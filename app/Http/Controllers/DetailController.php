<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Pesanan;
use App\Models\Pesanan_detail;
use App\Models\User;
use Auth;
use Alert;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DetailController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index($id)
    {
        $pesanan = Pesanan::where('user_id', Auth::user()->id)->where('status',0)->first();
 	    $pesanan_details = [];
        if(!empty($pesanan))
        {
            $pesanan_details = Pesanan_detail::where('pesanan_id', $pesanan->id)->get();

        }
        $barangs = Barang::where('id',$id)->first();
        return view('pesan.index', compact('barangs','pesanan_details'));

    }

    public function pesan(Request $request,$id)
    {
        //
        $barangs = Barang::where('id',$id)->first();
        $tanggal = Carbon::now();

        //
        if($request->jumlah_pesanan > $barangs->stok)
        {
            return redirect('detail/'.$id);
        }

        //
        $cek_pesanan = Pesanan::where('user_id', Auth::user()->id)->where('status',0)->first();

        if(empty($cek_pesanan))
        {
        $pesanan = new Pesanan;
        $pesanan->user_id = Auth::user()->id;
        $pesanan->tanggal = $tanggal;
        $pesanan->status = 0;
        $pesanan->jumlah_harga = 0;
        $pesanan->kode = mt_rand(1000,9999);
        $pesanan->save();
        }

        //
        $pesanan_baru = Pesanan::where('user_id', Auth::user()->id)->where('status',0)->first();

        //
        $cek_pesanan_detail = Pesanan_detail::where('barang_id', $barangs->id)->where('pesanan_id', $pesanan_baru->id)->first();
        if(empty($cek_pesanan_detail))
        {
            $pesanan_detail = new Pesanan_detail;
            $pesanan_detail->barang_id = $barang_id = $barangs->id;
            $pesanan_detail->pesanan_id = $pesanan_id = $pesanan_baru->id;
            $pesanan_detail->jumlah = $request->jumlah_pesanan;
            $pesanan_detail->jumlah_harga = $barangs->harga*$request->jumlah_pesanan;
            $pesanan_detail->ukuran = $request->ukuran;
            $pesanan_detail->save();
        } else 
        {
            $pesanan_detail =Pesanan_detail::where('barang_id', $barangs->id)->where('pesanan_id', $pesanan_baru->id)->first();
            $pesanan_detail->jumlah = $pesanan_detail->jumlah+$request->jumlah_pesan;

            //
            $pesanan_detail->jumlah=$pesanan_detail->jumlah+$request->jumlah_pesanan;
            $harga_pesanan_detail_baru = $barangs->harga*$request->jumlah_pesanan;
            $pesanan_detail->jumlah_harga = $pesanan_detail->jumlah_harga+$harga_pesanan_detail_baru;
            $pesanan_detail->update();

        }

       $pesanan = Pesanan::where('user_id', Auth::user()->id)->where('status',0)->first();
       $pesanan->jumlah_harga = $pesanan->jumlah_harga+$barangs->harga*$request->jumlah_pesanan;
       $pesanan->update();


        Alert::success('Pesanan berhasil di masukkan keranjang', 'Berhasil');
        return redirect('check_out');

    }

    public function check_out()
    {
        $pesanan = Pesanan::where('user_id', Auth::user()->id)->where('status',0)->first();
 	    $pesanan_details = [];
        if(!empty($pesanan))
        {
            $pesanan_details = Pesanan_detail::where('pesanan_id', $pesanan->id)->get();

        }
        
        return view('pesan.check_out', compact('pesanan', 'pesanan_details'));
    }

    public function delete($id)
    {
        $pesanan_detail = Pesanan_detail::where('id', $id)->first();

        $pesanan = Pesanan::where('id', $pesanan_detail->pesanan_id)->first();
        $pesanan->jumlah_harga = $pesanan->jumlah_harga-$pesanan_detail->jumlah_harga;
        $pesanan->update();


        $pesanan_detail->delete();

        Alert::error('Sukses','Pesanan berhasil dihapus');
        return redirect('check_out');
    }

    public function konfirmasi()
    {
        $user = User::where('id', Auth::user()->id)->first();

        if(empty($user->alamat))
        {
            Alert::error('Error', 'Harap Lengkapi Identitas');
            return redirect('profile');
        }

        if(empty($user->no_hp))
        {
            Alert::error('Error', 'Harap Lengkapi Identitas');
            return redirect('profile');
        }

        $pesanan = Pesanan::where('user_id', Auth::user()->id)->where('status',0)->first();
        $pesanan_id = $pesanan->id;
        $pesanan->status = 1;
        $pesanan->update();

        $pesanan_details = Pesanan_detail::where('pesanan_id', $pesanan_id)->get();
        foreach ($pesanan_details as $pesanan_detail){
            $barangs = Barang::where('id',$pesanan_detail->barang_id)->first();
            $barangs->stok = $barangs->stok-$pesanan_detail->jumlah;
            $barangs->update();
        }

        Alert::success('Sukses','Pesanan berhasil dihapus');
        return redirect('home');
    }

}
