@extends('layouts.login.layout')

@section('content')
    <div class="container-login100">
        <div class="wrap-login100">
            <slider-component></slider-component>
            <div>
                <form class="login100-form validate-form" method="post" action="{{route('login')}}">
                    @csrf
                    <span class="login100-form-title-1 m-b-20" style="color: #DE6262;">Plastictecnic Portal</span>
                    <login-component></login-component>
                </form>
            </div>
        </div>
    </div>
@endsection