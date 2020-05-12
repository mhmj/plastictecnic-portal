@extends('layouts.dashboard.layout')

@section('content')
    <div class="wrapper">
        <div class="main-panel" id="main-panel">
            <nav class="navbar navbar-expand-lg navbar-transparent  bg-primary  navbar-absolute">
                <div class="container-fluid">
                    <div class="navbar-wrapper">
                        <div class="navbar-toggle">
                            <button type="button" class="navbar-toggler">
                                <span class="navbar-toggler-bar bar1"></span>
                                <span class="navbar-toggler-bar bar2"></span>
                                <span class="navbar-toggler-bar bar3"></span>
                            </button>
                        </div>
                        <a class="navbar-brand">
                            <h4 class="card-title">IT Operation</h4>
                        </a>
                    </div>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-bar navbar-kebab"></span>
                        <span class="navbar-toggler-bar navbar-kebab"></span>
                        <span class="navbar-toggler-bar navbar-kebab"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-end" id="navigation">
                        <ul class="navbar-nav">
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="now-ui-icons users_single-02"></i>
                                    <p>
                                        <span class="d-lg-none d-md-block">{{ Auth::user()->full_name }}</span>
                                    </p>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                                    <a class="dropdown-item" href="{{ route('profile') }}">
                                        Profile
                                    </a>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <div class="panel-header panel-header-sm">
            </div>
            <div class="content">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card  card-tasks">
                            <div class="card-header ">
                                <h5 class="card-category" style="padding-left: 10px; padding-right: 0px">List IT Operation</h5>
                                <h4 class="card-title" style="padding-left: 10px; padding-right: 0px">IT Operation</h4>
                            </div>
                            <div class="card-body ">
                                <div class="row">
                                    <div class="col-12">
                                        <ul class="nav" data-tabs="tabs">
                                            <li class="nav-item">
                                                <button type="button" class="btn btn-sm" style="background-color: #99b433;" href="#ITTeam" data-toggle="tab">
                                                    IT Team
                                                </button>
                                            </li>
                                            <li class="nav-item" style="margin-left: 5px">
                                                <button type="button" class="btn btn-sm" style="background-color: #ffc40d;"  href="#ITPolicy" data-toggle="tab">
                                                    IT Policy & Procedure
                                                </button>
                                            </li>
                                            <li class="nav-item" style="margin-left: 5px">
                                                <button type="button" class="btn btn-sm" style="background-color: #00aba9;" href="#datacenter" data-toggle="tab">
                                                    Data Center & Network
                                                </button>
                                            </li>
                                            <li class="nav-item" style="margin-left: 5px">
                                                <button type="button" class="btn btn-sm" style="background-color: #da532c;" href="#tool" data-toggle="tab">
                                                    Tool
                                                </button>
                                            </li>
                                            <li class="nav-item" style="margin-left: 5px">
                                                <button type="button" class="btn btn-sm" style="background-color: #b91d47;" href="#application" data-toggle="tab">
                                                    Application Overview
                                                </button>
                                            </li>
                                            <li class="nav-item" style="margin-left: 5px">
                                                <button type="button" class="btn btn-sm" style="background-color: #9f00a7;" href="#inventory" data-toggle="tab">
                                                    Inventory
                                                </button>
                                            </li>
                                            <li class="nav-item" style="margin-left: 5px">
                                                <button type="button" class="btn btn-sm" style="background-color: #2b5797;" href="#partner" data-toggle="tab">
                                                    Partner
                                                </button>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="row" >
                                    <div class="col-12">
                                        <div class="tab-content text-center">
                                            <div class="tab-pane active" id="ITTeam" style="border-top: 2px solid #99b433; margin-top: 10px">
                                                <div class="row" style="margin-top: 20px">
                                                    <div class="col-lg-7">
                                                        <img style="width: 120%;height: 80%;"  src="{{asset('/images/IT operation/1-ITTeam/1.0.png')}}">
                                                    </div>
                                                    <div class="col-lg-5" style="">
                                                        <img style="width: 100%; margin-right: 55px" src="{{asset('/images/IT operation/1-ITTeam/1.2.png')}}">
                                                        <img style="width: 100%; margin-right: 55px" src="{{asset('/images/IT operation/1-ITTeam/1.3.png')}}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane"  id="ITPolicy" style="border-top: 2px solid #ffc40d; margin-top: 10px">
                                                <div class="row" style="margin-top: 20px">
                                                    <div class="col-lg-12">
                                                        <img style="width: 70%;height: 100%;"  src="{{asset('/images/IT operation/2-ITPolicy/2.0.png')}}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane"  id="datacenter" style="border-top: 2px solid #00aba9; margin-top: 10px">
                                                <div class="row" style="margin-top: 20px">
                                                    <div class="col-lg-12">
                                                        <img style="width: 70%;height: 100%;"  src="{{asset('/images/IT operation/3-DataCenter/3.0.jpg')}}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane"  id="tool" style="border-top: 2px solid #da532c; margin-top: 10px">
                                                <div class="row" style="margin-top: 20px">
                                                    <div class="col-lg-12">
                                                        <img style="width: 70%;height: 100%;"  src="{{asset('/images/IT operation/4-Tool/4.0.jpg')}}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane"  id="application" style="border-top: 2px solid #b91d47; margin-top: 10px">
                                                <div class="row" style="margin-top: 20px">
                                                    <div class="col-lg-12">
                                                        <img style="width: 70%;height: 100%;"  src="{{asset('/images/IT operation/5-ApplicationOverview/5.0.png')}}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane" id="inventory" style="border-top: 2px solid #9f00a7; margin-top: 10px">
                                                <div class="row" style="margin-top: 20px">
                                                    <div class="col-lg-12">
                                                        <img style="width: 70%;height: 100%;"  src="{{asset('/images/graph/graph-2.jpg')}}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane" id="partner" style="border-top: 2px solid #2b5797; margin-top: 10px">
                                                <div class="row" style="margin-top: 20px">
                                                    <div class="col-lg-12">
                                                        <img style="width: 70%;height: 100%;"  src="{{asset('/images/IT operation/7-Partner/7.0.jpg')}}">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <footer class="footer">
                <div class=" container-fluid ">
                    <div class="copyright" id="copyright">
                        Copy Right, Plastictecnic (M) Sdn Bhd. All Rights Reserved.
                    </div>
                </div>
            </footer>
        </div>
    </div>
@endsection
