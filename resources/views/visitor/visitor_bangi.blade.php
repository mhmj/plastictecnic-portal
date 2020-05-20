@extends('layouts.dashboard.visitorLayout')

@section('content')
    <div class="wrapper">
        <div class="main-panel" id="main-panel" style="width: 100%;">
            <nav class="navbar  navbar-absolute" style="background-color: #0c2646">
                <div class="container-fluid" style="justify-content: center">
                    <div class="navbar-wrapper" >
                        <div class="logo" >
                            <a class="simple-text logo-mini" style="">
                                <img class="avatar border-gray" src="/images/icons/plastictecnic-icon.jpg" style="height:50px; width:50px; border-radius: 80px; margin-right: 10px;">
                            </a>
                        </div>
                    </div>
                </div>
            </nav>
            <div class="content" style="margin-top: 80px" >
                <div class="row">
                    <div class="col-md-12">
                        <div class="card  card-tasks">
                            <div class="card-header">
                                <h4 class="card-title">Health Screening Form For Visitor</h4>
                            </div>
                            <div class="card-body ">
                                <visitor-bangi-component></visitor-bangi-component>
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
