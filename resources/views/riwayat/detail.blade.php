@extends('layouts.apps')

@section('content')

<div class="breadcrumbs">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="bread-inner">
                    <ul class="bread-list">
                        <li><a href="{{url('home')}}">Home<i class="ti-arrow-right"></i></a></li>
                        <li><a href="{{url('history')}}">Riwayat Pemesanan<i class="ti-arrow-right"></i></a></li>
                        <li class="active"><a href="{{url('history')}}">Detail</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="shopping-cart">
    <div class="div">
    <div class="container">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    @if(!empty($pesanan))
                    <h5>Berhasil!!!!</h5>
                    <p>Pesanan anda sudah sukses dicheck out selanjutnya silahkan untuk melakukan pembayaran transfer ke rekening <strong>Bank BCI dengan Nomer Rekening : 1234-1234-2123</strong> sebesar  : <strong>Rp. {{ number_format($pesanan->kode+$pesanan->jumlah_harga) }}</strong></p>
                    @endif
                </div>
            </div>
            <br>
        <div class="row">
            <div class="col-12">
                <!-- Shopping Summery -->

                <table class="table shopping-summery">
                    <thead>
                        <tr class="main-hading">
                            <tr>
                                <th>No</th>
                                <th>Gambar</th>
                                <th>Nama Barang</th>
                                <th>Jumlah</th>
                                <th>Ukuran</th>
                                <th>Harga</th>
                                <th>Total Harga</th>
                                
                            </tr>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; ?>
                            @foreach($pesanan_details as $pesanan_detail)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>
                                    <img src="{{ url('images/barang') }}/{{ $pesanan_detail->barang->image }}" width="300" alt="...">
                                </td>
                                <td>{{ $pesanan_detail->barang->nama_barang }}</td>
                                <td>{{ $pesanan_detail->jumlah }}</td>
                                <td>{{ $pesanan_detail->ukuran }}</td>
                                <td align="right">Rp. {{ number_format($pesanan_detail->barang->harga) }}</td>
                                <td align="right">Rp. {{ number_format($pesanan_detail->jumlah_harga) }}</td>
                                
                            </tr>
                            @endforeach
                </table>

                <!--/ End Shopping Summery -->
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <!-- Total Amount -->
                <div class="total-amount">
                    <div class="row">
                        <div class="col-lg-8 col-md-5 col-12">
                            <div class="left">
                                <div class="coupon">
                                    
                                </div>
                                
                            </div>
                        </div>
                        @if (!@empty($pesanan))
                        <div class="col-lg-4 col-md-7 col-12">
                            <div class="right">
                                <ul>
                                    <li>Total<span>Rp {{number_format($pesanan->jumlah_harga)}}</span></li>
                                    <li>Ongkir<span>Free</span></li>
                                    <li>Diskon<span>0</span></li>
                                    <li>Biaya Admin<span>Rp {{number_format($pesanan->kode)}}</span></li>
                                    <li class="last">Total Jumlah<span>Rp {{number_format($pesanan->kode+$pesanan->jumlah_harga)}}</span></li>
                                </ul>
                                <br>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <!--/ End Total Amount -->
            </div>
        </div>
    </div>
    </div>
</div>

@endsection