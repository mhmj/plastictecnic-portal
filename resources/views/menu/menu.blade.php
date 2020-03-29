<div class="sidebar" data-color="blue">
    <!--
      Tip 1: You can change the color of the sidebar using: data-color="blue | green | orange | red | yellow"
  -->
    <div class="logo">
        <a href="http://www.creative-tim.com" class="simple-text logo-mini">
            PT
        </a>
        <a href="http://www.creative-tim.com" class="simple-text logo-normal">
            {{ Auth::user()->last_name }}
        </a>
    </div>
    <div class="sidebar-wrapper" id="sidebar-wrapper">
        <ul class="nav">
            <li class="active ">
                <a href="./dashboard.html">
                    <i class="now-ui-icons design_app"></i>
                    <p class="bold">Dashboard</p>
                </a>
            </li>
            <li>
                <a href="./tables.html">
                    <i class="now-ui-icons design_bullet-list-67"></i>
                    <p class="text-bold">IT Asset</p>
                </a>
            </li>
            <li>
                <a href="./map.html">
                    <i class="now-ui-icons location_map-big"></i>
                    <p>Incident Report</p>
                </a>
            </li>
            <li>
                <a href="./icons.html">
                    <i class="now-ui-icons education_atom"></i>
                    <p>IT Operation</p>
                </a>
            </li>
        </ul>
    </div>
</div>