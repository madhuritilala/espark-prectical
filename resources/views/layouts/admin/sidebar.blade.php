<div class="sidebar" data-color="purple" data-background-color="white" data-image="{{asset('assets/admin/img/sidebar-1.jpg')}}">
    <!--
      Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

      Tip 2: you can also add an image using data-image tag
  -->
    <div class="logo"><a href="http://www.creative-tim.com" class="simple-text logo-normal">
        Creative Tim
      </a></div>
    <div class="sidebar-wrapper">
      <ul class="nav">
        <li class="nav-item @if(request()->routeIs('admin.dashboard')) active @endif">
        <a class="nav-link" href="{{route('admin.dashboard')}}">
            <i class="material-icons">dashboard</i>
            <p>Dashboard</p>
          </a>
        </li>
        <li class="nav-item @if(request()->routeIs('admin.myprofile')) active @endif">
          <a class="nav-link" href="{{route('admin.myprofile')}}">
            <i class="material-icons">person</i>
            <p>User Profile</p>
          </a>
        </li>
          <li class="nav-item @if(request()->routeIs('employee.*')) active @endif">
          <a class="nav-link" href="{{route('employee.index')}}">
                <i class="fa fa-file-text-o" aria-hidden="true"></i>
                <p>Employess Details</p>
            </a>
          </li>
        <li class="nav-item ">
          <a class="nav-link" href="./rtl.html">
            <i class="material-icons">language</i>
            <p>RTL Support</p>
          </a>
        </li>
        <li class="nav-item active-pro ">
          <a class="nav-link" href="./upgrade.html">
            <i class="material-icons">unarchive</i>
            <p>Upgrade to PRO</p>
          </a>
        </li>
      </ul>
    </div>
  </div>
