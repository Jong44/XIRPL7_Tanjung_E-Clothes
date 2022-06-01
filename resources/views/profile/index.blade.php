@extends('layouts.apps')

@section('content')

        <div class="product-area section">
        
    <div class="container">
            <div class="breadcrumbs">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="bread-inner">
                                <ul class="bread-list">
                                    <li><a href="{{url('home')}}">Home<i class="ti-arrow-right"></i></a></li>
                                    <li class="active"><a href="{{url('profile')}}">Profile</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        <div class="card">
        <div class="card-header">
            <h5><i class="ti-user"></i> PROFILE</h5>
        </div>
        <div class="card-body">
            <div class="table-lg">
                <table class="table">
                    <tbody>
                        <tr>
                            <td>Nama</td>
                            <td>:</td>
                            <td>{{$user->name}}</td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td>:</td>
                            <td>{{$user->email}}</td>
                        </tr>
                        <tr>
                            <td>No HP</td>
                            <td>:</td>
                            <td>{{$user->no_hp}}</td>
                        </tr>  
                        <tr>
                            <td>Alamat</td>
                            <td>:</td>
                            <td>{{$user->alamat}}</td>
                        </tr>   
                        
                    </tbody>
                </table>
            </div>

        </div>
        </div>
        <br>
        <div class="card">
            <div class="card-header">
                <h5><i class="ti-user"></i> UPDATE PROFILE</h5>
            </div>
            <form method="POST" action="{{ url('profile') }}">
                @csrf
                <br>
                <div class="form-group row">
                    <label for="name" class="col-md-2 col-form-label text-md-right">{{ __('Name') }}</label>

                    <div class="col-md-6">
                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $user->name }}" required autocomplete="name" autofocus>

                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="email" class="col-md-2 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                    <div class="col-md-6">
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $user->email }}" required autocomplete="email">

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="nohp" class="col-md-2 col-form-label text-md-right">No. HP</label>

                    <div class="col-md-6">
                        <input id="nohp" type="text" class="form-control @error('nohp') is-invalid @enderror" name="nohp" value="{{ $user->no_hp }}" required autocomplete="nohp" autofocus>

                        @error('nohp')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="alamat" class="col-md-2 col-form-label text-md-right">Alamat</label>

                    <div class="col-md-6">
                        <textarea name="alamat" class="form-control @error('alamat') is-invalid @enderror" required="">{{ $user->alamat }}</textarea>

                        @error('alamat')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="password" class="col-md-2 col-form-label text-md-right">{{ __('Password') }}</label>

                    <div class="col-md-6">
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password">

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="password-confirm" class="col-md-2 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                    <div class="col-md-6">
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation">
                    </div>
                </div>
                <br>
                <div class="form-group row mb-4">
                    <div class="col-md-6 offset-md-2">
                        <button type="submit" class="btn btn-primary">
                            Save
                        </button>
                    </div>
                </div>
            </form>
        </div>
        </div>
    </div>


@endsection
