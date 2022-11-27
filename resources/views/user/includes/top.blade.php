<header class="app-header navbar">
    <button class="navbar-toggler sidebar-toggler d-lg-none mr-auto" type="button" data-toggle="sidebar-show">
      <span class="navbar-toggler-icon"></span>
    </button>
    <a class="navbar-brand" href="{{ route('user.category')}}">
      <img class="navbar-brand-full" src="{{ asset('images/logo.png')}}" style="width:100px;" alt="BHS">
      <img class="navbar-brand-minimized" src="" style="width:50px;"  alt="Music Ecommerce">
    </a>
    <button class="navbar-toggler sidebar-toggler d-md-down-none" type="button" data-toggle="sidebar-lg-show">
      <span class="navbar-toggler-icon"></span>
    </button>
    <ul class="nav navbar-nav d-md-down-none">
      <li class="nav-item px-3"></li>
    </ul>
    <ul class="nav navbar-nav ml-auto">
      <li class="nav-item px-3">
          <b>Hello, {{ Auth::user()->name }}</b>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
          <img class="img-avatar" src="{{ asset('images/avatar.png')}}" alt="User DP">
        </a>
        <div class="dropdown-menu dropdown-menu-right">
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="{{ route('logout')}}">
            <i class="fa fa-lock"></i>Logout</a>
        </div>
      </li>
    </ul>
  </header>
