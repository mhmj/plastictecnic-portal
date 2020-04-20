<div class="sidebar" data-color="blue">
    <!--
      Tip 1: You can change the color of the sidebar using: data-color="blue | green | orange | red | yellow"
  -->
    <div class="logo">
        <a href="http://www.creative-tim.com" class="simple-text logo-mini">
            PT
        </a>
        <a href="{{route('profile')}}" class="simple-text logo-normal">
            {{ Auth::user()->username }}
        </a>
    </div>
    <div class="sidebar-wrapper" id="sidebar-wrapper">
        <ul class="nav">
            <li class="{{ (request()->routeIs('dashboard')) ? 'active' : '' }} ">
                <a href="{{route('dashboard')}}">
                    <i class="now-ui-icons design_app"></i>
                    <p class="bold">Dashboard</p>
                </a>
            </li>
            @if(Auth::user()->role_id == '2')
                <li class="{{ (request()->routeIs('Staff-ITAsset')) ? 'active' : '' }} ">
                    <a href="{{route('Staff-ITAsset')}}">
                        <i class="now-ui-icons design_bullet-list-67"></i>
                        <p class="text-bold">IT Asset Management</p>
                    </a>
                </li>
                <li class="{{ (request()->routeIs('Staff-Incident-Report')) ? 'active' : '' }} ">
                    <a href="{{route('Staff-Incident-Report')}}">
                        <i class="now-ui-icons location_map-big"></i>
                        <p class="text-bold">IT Incident Management</p>
                    </a>
                </li>
                <li class="{{ (request()->routeIs('Staff-List-Staff')) ? 'active' : '' }} ">
                    <a href="{{route('Staff-List-Staff')}}">
                        <i class="now-ui-icons users_single-02"></i>
                        <p class="text-bold">Staff List</p>
                    </a>
                </li>
            @endif

            @if(Auth::user()->role_id == '3')
                <li class="{{ (request()->routeIs('IT-ITAsset')) ? 'active' : '' }} ">
                    <a href="{{route('IT-ITAsset')}}">
                        <i class="now-ui-icons design_bullet-list-67"></i>
                        <p class="text-bold">IT Asset Management</p>
                    </a>
                </li>
                <li class="{{ (request()->routeIs('IT-License')) ? 'active' : '' }} ">
                    <a href="{{route('IT-License')}}">
                        <i class="now-ui-icons education_paper"></i>
                        <p class="text-bold">License Management</p>
                    </a>
                </li>
                <li class="{{ (request()->routeIs('IT-Staff')) ? 'active' : '' }} ">
                    <a href="{{route('IT-Staff')}}">
                        <i class="now-ui-icons users_single-02"></i>
                        <p class="text-bold">Staff Management</p>
                    </a>
                </li>
                <li class="{{ (request()->routeIs('IT-IncidentReport')) ? 'active' : '' }} ">
                    <a href="{{route('IT-IncidentReport')}}">
                        <i class="now-ui-icons location_map-big"></i>
                        <p>Incident Report</p>
                    </a>
                </li>
            @endif
            <li class="{{ (request()->routeIs('ITOperation')) ? 'active' : '' }} ">
                <a href="{{route('ITOperation')}}">
                    <i class="now-ui-icons education_atom"></i>
                    <p>IT Operation</p>
                </a>
            </li>
        </ul>
    </div>
</div>