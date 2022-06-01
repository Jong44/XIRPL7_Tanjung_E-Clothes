@extends('layouts.apps')

@section('content')

<div class="breadcrumbs">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="bread-inner">
                    <ul class="bread-list">
                        <li><a href="{{url('home')}}">Home<i class="ti-arrow-right"></i></a></li>
                        <li class="active"><a href="{{url('check_out')}}">Cart</a></li>
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
                            <th>PRODUK</th>
                            <th>NAMA</th>
                            <th class="text-center">UKURAN</th>
                            <th class="text-center">HARGA</th>
                            <th class="text-center">JUMLAH</th>
                            <th class="text-center">HARGA</th> 
                            <th class="text-center"><i class="ti-trash remove-icon"></i></th>
                        </tr>
                    </thead>
                    @if (!@empty($pesanan))
                    <tbody>
                        @foreach ($pesanan_details as $pesanan_detail)
                        <tr>
                            <td class="image" data-title="No"><img src="{{url('images/barang')}}/{{$pesanan_detail->barang->image }}" alt="#"></td>
                            <td class="product-des" data-title="Description">
                                <p class="product-name"><a href="#"></a>{{$pesanan_detail->barang->nama_barang }}</p>
                                <p class="product-description"><a href="#"></a>{{$pesanan_detail->barang->keterangan }}</p>

                            </td>
                            <td class="price" data-title="Price"><span>{{$pesanan_detail->ukuran}}</span></td>
                            <td class="price" data-title="Price"><span>Rp {{number_format($pesanan_detail->barang->harga)}}</span></td>
                            <td class="qty" data-title="Qty"><span>{{$pesanan_detail->jumlah}}</span></td>
                            <td class="total-amount" data-title="Total"><span>Rp {{number_format($pesanan_detail->jumlah_harga)}}</span></td>
                            <td class="action"> 
                                <form action="{{url('check_out')}}/{{$pesanan_detail->id}}" method="post">  
                                    @csrf
                                    {{ method_field('DELETE')}}

                                <button type="submit"><i class="ti-trash remove-icon" onclick="return confirm('Anda yakin akan menghapus pesanan anda?');"></i></button>
                            </form>
                            </td>
                        </tr>
                        @endforeach
                        
                    </tbody>
                    @endif
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
                                    <li class="last">Total Jumlah<span>Rp {{number_format($pesanan->jumlah_harga)}}</span></li>
                                </ul>
                                <div class="button5">
                                    <a href="{{url('konfirmasi_check_out')}}" class="btn" onclick="return confirm('Anda yakin akan check out pesanan anda?');">Checkout</a>
                                    <a href="{{url('home')}}" class="btn">Continue shopping</a>
                                </div>
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

@endsection