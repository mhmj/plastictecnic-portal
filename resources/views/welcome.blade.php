@extends('layouts.login.layout')

@section('content')
    <div class="container-login100">
        <div class="wrap-login100">
            <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img class="d-block w-100 h-50" src="images/slider/protal_banner_01.jpg" alt="First slide">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="images/slider/protal_banner_02.jpg" alt="Second slide">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="images/slider/protal_banner_04.jpg" alt="Second slide">
                    </div>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
            <div>
                {{--@if($errors->any())--}}
                    {{--@foreach ($errors->all() as $error)--}}
                        {{--<div class="text-danger">{{ $error }}</div>--}}
                    {{--@endforeach--}}
                {{--@endif--}}
                <form class="login100-form validate-form" method="post" action="{{route('login')}}">
                    @csrf
                    <span class="login100-form-title-1 m-b-20" style="color: #DE6262;">Plastictecnic Portal</span>
                    <div class="wrap-input100 validate-input m-b-26" style="border-bottom: 0px">
                        <div class="wrap-input100 validate-input m-b-26" data-validate="Username is required">
                            <span class="label-input100">Username</span>
                            <input class="input100" type="text" placeholder="Username" name="username">
                            <span class="focus-input100"></span>
                        </div>
                        @error('username')
                        <span class="text-danger" style="font-size: 14px">{{ $message }}</span>
                        @enderror
                        <div class="wrap-input100 validate-input m-b-18" data-validate = "Password is required">
                            <span class="label-input100">Password</span>
                            <input class="input100 @error('password') is-invalid @enderror" type="password" name="password" placeholder="Password">
                            <span class="focus-input100"></span>

                        </div>
                        @error('password')
                            <span class="text-danger" style="font-size: 14px">{{ $message }}</span>
                        @enderror
                        <div class="flex-sb-m w-full p-b-30">
                            <div class="contact100-form-checkbox">
                            </div>
                            @if (Route::has('password.request'))
                                <a class="txt1" href="{{ route('password.request') }}">
                                    {{ __('Forgot Password?') }}
                                </a>
                            @endif
                        </div>
                        <div class="container-login100-form-btn" >
                            <div class="flex-sb-m w-full p-b-30">
                                <div class="contact100-form">
                                    <button class="login100-form-btn" type="submit" style="background-color: #DE6262;">
                                        Login
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection