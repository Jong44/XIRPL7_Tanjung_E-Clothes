@extends('layouts.apps')

@section('content')

<div class="breadcrumbs">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="bread-inner">
                    <ul class="bread-list">
                        <li><a href="{{url('home')}}">Home<i class="ti-arrow-right"></i></a></li>
                        <li class="active"><a href="{{url('check_out')}}">Riwayat Pemesanan</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>


    


<div class="shopping-cart section">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <!-- Shopping Summery -->

                <table class="table shopping-summery">
                    <thead>
                        <tr class="main-hading">
                            <th>No</th>
                            <th>Tanggal</th>
                            <th>Status</th> 
                            <th>Jumlah Harga</th> 
                            <th><i class="ti-info info-icon"></i></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; ?>
                        @foreach($pesanan as $pesanan)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{$pesanan->tanggal}}</td>
                            <td>
                                @if($pesanan->status == 1)
                                Sudah Pesan & Belum dibayar
                                @else
                                Sudah dibayar 
                                @endif
                            </td>
                            <td>Rp. {{ number_format($pesanan->jumlah_harga+$pesanan->kode) }}</td>
                            <td>
                                <a href="{{ url('history') }}/{{ $pesanan->id }}" ><i class="ti-info info-icon" ></i></a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
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
                            </div>
                        </div>
                    </div>
                </div>
                <!--/ End Total Amount -->
            </div>
        </div>
    </div>
</div>

@endsection