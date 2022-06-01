<?php

namespace App\Http\Controllers;
use App\Models\Barang;
use App\Models\Pesanan;
use App\Models\Pesanan_detail;
use Auth;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $pesanan = Pesanan::where('user_id', Auth::user()->id)->where('status',0)->first();
 	    $pesanan_details = [];
        if(!empty($pesanan))
        {
            $pesanan_details = Pesanan_detail::where('pesanan_id', $pesanan->id)->get();

        }

        if($request->has('search')){
            $barangs = Barang::where('nama_barang','LIKE','%' .$request->search.'%')->paginate(20);
        }else{
        
            $barangs = Barang::paginate(20);
        }
       
        return view('home', compact('barangs','pesanan_details'));
    }
    public function delete($id)
    {
        $pesanan_detail = Pesanan_detail::where('id', $id)->first();

        $pesanan = Pesanan::where('id', $pesanan_detail->pesanan_id)->first();
        $pesanan->jumlah_harga = $pesanan->jumlah_harga-$pesanan_detail->jumlah_harga;
        $pesanan->update();


        $pesanan_detail->delete();

        Alert::error('Sukses','Pesanan berhasil dihapus');
        return redirect('home');
    }
}
