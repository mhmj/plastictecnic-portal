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
                            <h4 class="card-title">IT Asset</h4>
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
                                <div class="row">
                                    <div class="col">
                                        <h5 class="card-category"><h4 class="card-title" style="padding-left: 10px; padding-right: 0px">IT Asset</h4></h5>
                                    </div>
                                    <div class="col" style="display: flex; justify-content: flex-end">
                                        <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#ITAssetModal">
                                            New
                                        </button>
                                    </div>
                                </div>
                                <div class="row border-bottom">
                                    <div class="col">
                                        <ul class="nav" data-tabs="tabs">
                                            <li class="nav-item col-lg-auto" style="padding-left: 10px; padding-right: 0px">
                                                <button style="background-color: #2b5797;" type="button" class="btn btn-md" href="#summary" data-toggle="tab">
                                                    Summary
                                                </button>
                                            </li>
                                            <li class="nav-item col-lg-auto" style="padding-left: 10px; padding-right: 0px">
                                                <button type="button" class="btn btn-md btn-info" href="#bangi" data-toggle="tab">
                                                    Bangi Plant
                                                </button>
                                            </li>
                                            <li class="nav-item col-lg-auto" style="padding-left: 10px; padding-right: 0px">
                                                <button type="button" class="btn btn-md btn-success" href="#nilai-a" data-toggle="tab">
                                                    Nilai Plant (Block A)
                                                </button>
                                            </li>
                                            <li class="nav-item col-lg-auto" style="padding-left: 10px; padding-right: 0px">
                                                <button type="button" class="btn btn-md btn-warning" href="#nilai-b" data-toggle="tab">
                                                    Nilai Plant (Block B)
                                                </button>
                                            </li>
                                            <li class="nav-item col-lg-auto" style="padding-left: 10px; padding-right: 0px">
                                                <button type="button" class="btn btn-md btn-info" href="#goodhart" data-toggle="tab">
                                                    GOODHART MILLIONS S/B (Bangi Plant)
                                                </button>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class=" card-tasks">
                            <div class="">
                                <div class="tab-content text-center">
                                    <div class="tab-pane active" id="summary">
                                        <it-asset-summary-element-component></it-asset-summary-element-component>
                                    </div>
                                    <div class="tab-pane" id="bangi">
                                        <list-it-asset-location-component id1="1" category="bangi"></list-it-asset-location-component>
                                    </div>
                                    <div class="tab-pane"  id="nilai-a">
                                        <list-it-asset-location-component id1="2" category="nilaiA"></list-it-asset-location-component>
                                    </div>
                                    <div class="tab-pane" id="nilai-b">
                                        <list-it-asset-location-component id1="3" category="nilaiB"></list-it-asset-location-component>
                                    </div>
                                    <div class="tab-pane" id="goodhart">
                                        <list-it-asset-location-component id1="4" category="goodhart"></list-it-asset-location-component>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="ITAssetModal" tabindex="-1" role="dialog" aria-labelledby="ITAssetModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="ITAssetModalLabel">New IT Asset</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <create-it-asset-form-component></create-it-asset-form-component>
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
