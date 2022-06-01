<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Alert;
use App\Models\Pesanan;
use App\Models\Pesanan_detail;
use App\Models\User;

class ProfileController extends Controller
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
        $user = User::where('id', Auth::user()->id)->first();
        return view('profile.index', compact('user','pesanan_details'));
    }

    public function update(Request $request)
    {
        $this->validate($request, [
            'password' => 'confirmed',
        ]);

        $user = User::where('id',Auth::user()->id)->first();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->no_hp = $request->nohp;
        $user->alamat = $request->alamat;
        if(!empty($request->password))
        {
            $user->password = Hash::make($request->password);

        }

        $user->update();

        Alert::success('Sukses','Profile berhasil diubah');
        return redirect('profile');
    }
}