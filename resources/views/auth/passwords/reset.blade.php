@extends('layouts.login.layout')

@section('content')
    <div class="container-login100">
        <div class="wrap-login100">
            <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img class="d-block w-100 h-50" src="https://plastictecnic.com/wp-content/uploads/2019/11/Bangi%20factory.jpg" alt="First slide">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src=" https://www.plastictecnic.com/images/news_banner.jpg" alt="Second slide">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="data:image/jpeg;base64,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" alt="Third slide">
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
            <div class="card-body">
                <form class="login100-form validate-form" method="POST" action="{{ route('password.update') }}">
                    @csrf
                    <span class="login100-form-title-1 m-b-20" style="color: #DE6262;">Reset Password</span>
                    <input type="hidden" name="token" value="{{ $token }}">

                        <div class="wrap-input100 validate-input m-b-26" data-validate="Username is required">
                            <span class="label-input100">Email</span>
                            <input id="email" type="email" class="input100 form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>
                            <span class="focus-input100"></span>
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <div class="wrap-input100 validate-input m-b-26" data-validate="Username is required">
                            <span class="label-input100">Password</span>
                            <input id="password" type="password" class="form-control input100 @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                            <span class="focus-input100"></span>
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <div class="wrap-input100 validate-input m-b-26" data-validate="Username is required">
                            <span class="label-input100">Confirm Password</span>
                            <input id="password-confirm" type="password" class="form-control input100" name="password_confirmation" required autocomplete="new-password">
                            <span class="focus-input100"></span>
                        </div>

                    {{--<div class="form-group row">--}}
                        {{--<label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>--}}

                        {{--<div class="col-md-6">--}}
                            {{--<input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>--}}

                            {{--@error('email')--}}
                            {{--<span class="invalid-feedback" role="alert">--}}
                                        {{--<strong>{{ $message }}</strong>--}}
                                    {{--</span>--}}
                            {{--@enderror--}}
                        {{--</div>--}}
                    {{--</div>--}}

                    {{--<div class="form-group row">--}}
                        {{--<label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>--}}

                        {{--<div class="col-md-6">--}}
                            {{--<input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">--}}

                            {{--@error('password')--}}
                            {{--<span class="invalid-feedback" role="alert">--}}
                                        {{--<strong>{{ $message }}</strong>--}}
                                    {{--</span>--}}
                            {{--@enderror--}}
                        {{--</div>--}}
                    {{--</div>--}}

                    {{--<div class="form-group row">--}}
                        {{--<label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>--}}

                        {{--<div class="col-md-6">--}}
                            {{--<input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">--}}
                        {{--</div>--}}
                    {{--</div>--}}
                    <div class="container-login100-form-btn" >
                        <div class="flex-sb-m w-full p-b-30">
                            <div class="contact100-form" style="display: flex; justify-content: flex-end;" >
                                <button  class="login100-form-btn" type="submit" style="background-color: #DE6262;">
                                    Send
                                </button>
                            </div>
                        </div>
                    </div>
                    {{--<div class="form-group row mb-0">--}}
                        {{--<div class="col-md-6 offset-md-4">--}}
                            {{--<button type="submit" class="btn btn-primary">--}}
                                {{--{{ __('Reset Password') }}--}}
                            {{--</button>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                </form>
            </div>
        </div>
    </div>
@endsection

{{--@extends('layouts.app')--}}

{{--@section('content')--}}
{{--<div class="container">--}}
    {{--<div class="row justify-content-center">--}}
        {{--<div class="col-md-8">--}}
            {{--<div class="card">--}}
                {{--<div class="card-header">{{ __('Reset Password') }}</div>--}}

                {{--<div class="card-body">--}}
                    {{--<form method="POST" action="{{ route('password.update') }}">--}}
                        {{--@csrf--}}

                        {{--<input type="hidden" name="token" value="{{ $token }}">--}}

                        {{--<div class="form-group row">--}}
                            {{--<label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>--}}

                            {{--<div class="col-md-6">--}}
                                {{--<input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>--}}

                                {{--@error('email')--}}
                                    {{--<span class="invalid-feedback" role="alert">--}}
                                        {{--<strong>{{ $message }}</strong>--}}
                                    {{--</span>--}}
                                {{--@enderror--}}
                            {{--</div>--}}
                        {{--</div>--}}

                        {{--<div class="form-group row">--}}
                            {{--<label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>--}}

                            {{--<div class="col-md-6">--}}
                                {{--<input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">--}}

                                {{--@error('password')--}}
                                    {{--<span class="invalid-feedback" role="alert">--}}
                                        {{--<strong>{{ $message }}</strong>--}}
                                    {{--</span>--}}
                                {{--@enderror--}}
                            {{--</div>--}}
                        {{--</div>--}}

                        {{--<div class="form-group row">--}}
                            {{--<label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>--}}

                            {{--<div class="col-md-6">--}}
                                {{--<input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">--}}
                            {{--</div>--}}
                        {{--</div>--}}

                        {{--<div class="form-group row mb-0">--}}
                            {{--<div class="col-md-6 offset-md-4">--}}
                                {{--<button type="submit" class="btn btn-primary">--}}
                                    {{--{{ __('Reset Password') }}--}}
                                {{--</button>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</form>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}
{{--</div>--}}
{{--@endsection--}}
