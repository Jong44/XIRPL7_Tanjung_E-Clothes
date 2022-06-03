<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang;
use App\Models\Pesanan;
use App\Models\Pesanan_detail;
use App\Models\User;
use Auth;
use Alert;

class HistoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {

        $pesanan = Pesanan::where('user_id', Auth::user()->id)->where('status',0)->first();
 	    $pesanan_details = [];
        if(!empty($pesanan))
        {
            $pesanan_details = Pesanan_detail::where('pesanan_id', $pesanan->id)->get();

        }
        $pesanan = Pesanan::where('user_id', Auth::user()->id)->where('status','!=',0)->get();
        return view('riwayat.index', compact('pesanan','pesanan_details'));
    }
    
    public function detail($id)
    {
        $pesanan = Pesanan::where('id', $id)->first();
    	$pesanan_details = [];
        if(!empty($pesanan))
        {
            $pesanan_details = Pesanan_detail::where('pesanan_id', $pesanan->id)->get();

        }

     	return view('riwayat.detail', compact('pesanan','pesanan_details'));
    }
}
