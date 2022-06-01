<header class="header shop">
    <!-- Topbar -->
    <div class="topbar">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-12 col-12">
                </div>
                <div class="col-lg-8 col-md-12 col-12">
                    <!-- Top Right -->
                    <div class="right-content">
                        <ul class="list-main">
                            <li><i class="ti-user"></i> <a href="{{url('profile')}}">{{ Auth::user()->name }}</a></li>
                            <li><i class="ti-time"></i><a href="{{url('history')}}">Riwayat Pemesanan</a></li>
                            <li><i class="ti-power-off"></i><a href="{{ route('logout') }}" onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}</a></li>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                </form>
                        </ul>
                    </div>
                    <!-- End Top Right -->
                </div>
            </div>
        </div>
    </div>
    <!-- End Topbar -->
    <div class="middle-inner">
        <div class="container">
            <div class="row">
                <div class="col-lg-2 col-md-2 col-12">
                    <!-- Logo -->
                    <div class="logo">
                        <a href="{{'home'}}"><img src="images/logo.png" alt="logo"></a>
                    </div>
                    <!--/ End Logo -->
                    <!-- Search Form -->
                    <div class="search-top">
                        <div class="top-search"><a href="#0"><i class="ti-search"></i></a></div>
                        <!-- Search Form -->
                        <div class="search-top">
                            <form class="search-form">
                                <input type="text" action=" " placeholder="Search here..." name="search">
                                <button value="search" type="submit"><i class="ti-search"></i></button>
                            </form>
                        </div>
                        <!--/ End Search Form -->
                    </div>
                    <!--/ End Search Form -->
                    <div class="mobile-nav"></div>
                </div>
                <div class="col-lg-8 col-md-7 col-12">
                    <div class="search-bar-top">
                        <div class="search-bar">
                            <form>
                                <input name="search" placeholder="Search Products Here....." type="search">
                                <button class="btnn"><i class="ti-search"></i></button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-md-3 col-12">
                    <div class="right-bar">
                        <!-- Search Form -->
                        <div class="sinlge-bar shopping">
                            <?php
                                $pesanan_utama = \App\Models\Pesanan::where('user_id',Auth::user()->id)->where('status',0)->first();
                                if(!empty($pesanan_utama))
                                {
                                    $notif = \App\Models\Pesanan_detail::where('pesanan_id',$pesanan_utama->id)->count();
                                }
                                
                                
                            ?>
                            <a href="{{url('check_out')}}" class="single-icon">
                                <i class="ti-bag"></i> 
                                @if(!empty($notif))
                                <span class="total-count">{{$notif}}</span></a>
                                @endif
                            <!-- Shopping Item -->
                            <div class="shopping-item">
                                <div class="dropdown-cart-header">
                                    @if(!empty($notif))
                                        <span>{{$notif}}</span></a>
                                    @endif
                                    <a href="{{url('check_out')}}">Lihat Keranjang</a>
                                </div>
                                @foreach ($pesanan_details as $pesanan_detail)
                                <ul class="shopping-list">
                                    
                                    <li>
                                        <form action="{{url('home')}}/{{$pesanan_detail->id}}" method="post">  
                                            @csrf
                                            {{ method_field('DELETE')}}
                                        <button type="submit" class="remove" title="Remove this item"><i class="fa fa-remove" onclick="return confirm('Anda yakin akan menghapus pesanan anda?');></i></button>
                                        </form>
                                        <a class="cart-img" href="#"><img src="{{url('images/barang')}}/{{$pesanan_detail->barang->image}}" alt="#"></a>
                                        <h4><a href="#">{{$pesanan_detail->barang->nama_barang}}</a></h4>
                                        <p class="quantity">{{$pesanan_detail->harga}} - <span class="amount">{{$pesanan_detail->jumlah_harga}}</span></p>
                                    </li>
                                   
                                </ul>
                                @endforeach
                                <div class="bottom">
                                    <a href="{{url('konfirmasi_check_out')}}" class="btn animate" onclick="return confirm('Anda yakin akan check out pesanan anda?');">Checkout</a>
                                </div>
                            </div>
                            <!--/ End Shopping Item -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Header Inner -->
    <div class="header-inner">
        <div class="container">
            <div class="cat-nav-head">
                <div class="row">
                    <div class="col-lg-3">
                    </div>
                    <div class="col-lg-9 col-12">
                        <div class="menu-area">
                            <!-- Main Menu -->
                            <nav class="navbar navbar-expand-lg">
                                <div class="navbar-collapse">	
                                    <div class="nav-inner">	
                                        <ul class="nav main-menu menu navbar-nav">
                                                <li class="active"><a href="{{url('home')}}">Home</a></li>
                                                <li><a href="#">Shop<i class="ti-angle-down"></i><span class="new">New</span></a>
                                                    <ul class="dropdown">
                                                        <li><a href="{{'check_out'}}">Keranjang</a></li>
                                                        <li><a href="{{'history'}}">Riwayat Pemesanan</a></li>
                                                    </ul>
                                                </li>
                                                <li><a href="contact.html">Contact Us</a></li>
                                            </ul>
                                    </div>
                                </div>
                            </nav>
                            <!--/ End Main Menu -->	
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--/ End Header Inner -->
</header>