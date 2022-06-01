@extends('layouts.apps')

@section('content')
<div class="product-area section">
<div class="container">
    <div class="row">
        <div class="col-md-12">

            <div class="card bg-light">
                <div class="card-header">
                    <h3><strong>DETAILS</strong></h3>

                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-5">
                            <img src="{{url('images/barang')}}/{{$barangs->image}}" width="70%" class="rounded mx-auto d-block ">
                        </div>
                            <div class="col-md-6 mt-5">
                            <h2>{{$barangs->nama_barang}}</h2>
                            <div class="table-lg">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <td>Harga</td>
                                        <td>:</td>
                                        <td>Rp. {{ number_format($barangs->harga)}}</td>
                                    </tr>
                                    <tr>
                                        <td>Stok</td>
                                        <td>:</td>
                                        <td>{{ number_format($barangs->stok)}}</td>
                                    </tr>
                                    <tr>
                                        <td>Keterangan</td>
                                        <td>:</td>
                                        <td>{{ $barangs->keterangan}}</td>
                                    </tr> 
                                    <form action="{{url('detail')}}/{{$barangs->id}}" method="POST">
                                        @csrf  
                                        <td>Ukuran</td>
                                        <td>:</td>
                                        <td>
                                            <select name="ukuran" id="ukuran">
                                                <option value="" selected>-Ukuran-</option>
                                                <option value="S">S</option>
                                                <option value="M">M</option>
                                                <option value="L">L</option>
                                                <option value="XL">XL</option>
                                                <option value="XXL">XXL</option>
                                                <option value="XXXL">XXXL</option>
                                            </select>
                                        </td>
                                    <tr>

                                    </tr>
                                        <tr>
                                            <td>Jumlah Pesanan</td>
                                            <td>:</td>
                                            <td>
                                                
                                                <input type="number" name="jumlah_pesanan" class="form-control" required>
                                                <br>
                                                <button type="submit" class="btn btn-primary"><i class="ti-bag"> Masukan Keranjang </i></button>
                                            </form>
                                            </td>
                                        </tr>
                                </tbody>
                            </table>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    
    </div>
</div>
</div>

@endsection
