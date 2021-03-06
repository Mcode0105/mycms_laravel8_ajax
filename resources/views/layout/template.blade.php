<!DOCTYPE html>
<html lang="en">

<head>
    <title>{{$title}}</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="" />
    <meta name="keywords" content="">
    <meta name="author" content="Phoenixcoded" />
    <meta name="csrf-token" content="{{csrf_token()}}">
    <!-- Favicon icon -->
    <link rel="icon" href="{{asset('asset_admin')}}/images/favicon.ico" type="image/x-icon">
    <!-- vendor css -->
    <link rel="stylesheet" href="{{asset('asset_admin')}}/css/style.css">
    <link rel="stylesheet" href="{{asset('asset_admin')}}/fontawesome/css/all.css">
    <link rel="stylesheet" href="{{asset('asset_admin')}}/js/toast/build/toastr.css">
    <link rel="stylesheet"  href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
</head>
<body class="">
    <!-- [ Pre-loader ] start -->
    <div class="loader-bg">
        <div class="loader-track">
            <div class="loader-fill"></div>
        </div>
    </div>
    <!-- [ Pre-loader ] End -->
    <!-- [ navigation menu ] start -->
    <nav class="pcoded-navbar menu-light ">
        <div class="navbar-wrapper  ">
            <div class="navbar-content scroll-div ">
                <div class="">
                    <div class="main-menu-header">
                        <img class="img-radius" src="{{asset('asset_admin')}}/images/user/avatar-2.jpg" alt="User-Profile-Image">
                        <div class="user-details">
                            <div id="more-details">Adminstrator <i class="fa fa-caret-down"></i></div>
                        </div>
                    </div>
                    <div class="collapse" id="nav-user-link">
                        <ul class="list-unstyled">
                            <li class="list-group-item"><a href="user-profile.html"><i class="feather icon-user m-r-5"></i>View Profile</a></li>
                            <li class="list-group-item"><a href="#!"><i class="feather icon-settings m-r-5"></i>Settings</a></li>
                            <li class="list-group-item"><a href="auth-normal-sign-in.html"><i class="feather icon-log-out m-r-5"></i>Logout</a></li>
                        </ul>
                    </div>
                </div>
                <ul class="nav pcoded-inner-navbar ">
                    <li class="nav-item pcoded-menu-caption">
                        <label>Dashboard</label>
                    </li>
                    <li class="nav-item">
                        <a href="/admin" class="nav-link "><span class="pcoded-micon"><i class="feather icon-home"></i></span><span class="pcoded-mtext">Dashboard</span></a>
                    </li>
                    {{-- <li class="nav-item pcoded-menu-caption">
                        <label>Conten Management System</label>
                    </li> --}}
                  
                    <li class="nav-item pcoded-hasmenu">
                        <a href="#!" class="nav-link "><span class="pcoded-micon"><i class="feather icon-box m-r-5"></i></span><span class="pcoded-mtext">CMS</span></a>
                        <ul class="pcoded-submenu">
                            <li><a href="/berita">Data Berita</a></li>
                            <li><a href="/konten">Data Konten</a></li>
                            <li><a href="/tag">Data Tag</a></li>
                        </ul>
                    </li>
                    {{-- <li class="nav-item pcoded-menu-caption">
                        <label>Files</label>
                    </li> --}}
                    <li class="nav-item pcoded-hasmenu">
                        <a href="#!" class="nav-link "><span class="pcoded-micon"><i class="feather icon-file-text m-r-5"></i></span><span class="pcoded-mtext">Files</span></a>
                        <ul class="pcoded-submenu">
                            <li><a href="/file">File</a></li>
                            <li><a href="/karya">Karya</a></li>
                            <li><a href="/foto">Foto</a></li>
                        </ul>
                    </li>
                    {{-- <li class="nav-item pcoded-menu-caption">
                        <label>Setings</label>
                    </li> --}}
                    <li class="nav-item pcoded-hasmenu">
                        <a href="#!" class="nav-link "><span class="pcoded-micon"><i class="feather icon-settings m-r-5"></i></span><span class="pcoded-mtext">Pengaturan</span></a>
                        <ul class="pcoded-submenu">
                            <li><a href="akun">Akun</a></li>
                            <li><a href="/cms">CMS</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- [ navigation menu ] end -->
    <!-- [ Header ] start -->
    <header class="navbar pcoded-header navbar-expand-lg navbar-light header-blue">
        <div class="m-header">
            <a class="mobile-menu" id="mobile-collapse" href="#!"><span></span></a>
            <a href="#!" class="b-brand">
                <!-- ========   change your logo hear   ============ -->
                <img src="{{asset('asset_admin')}}/images/logo.png" alt="" class="logo">
                <img src="{{asset('asset_admin')}}/images/logo-icon.png" alt="" class="logo-thumb">
            </a>
            <a href="#!" class="mob-toggler">
                <i class="feather icon-more-vertical"></i>
            </a>
        </div>
        <div class="collapse navbar-collapse">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a href="#!" class="pop-search"><i class="feather icon-search"></i></a>
                    <div class="search-bar">
                        <input type="text" class="form-control border-0 shadow-none" placeholder="Search hear">
                        <button type="button" class="close" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                </li>
            </ul>
            <ul class="navbar-nav ml-auto">
                <li>
                    <div class="dropdown drp-user">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="feather icon-user"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right profile-notification">
                            <div class="pro-head">
                                <img src="{{asset('asset_admin')}}/images/user/avatar-1.jpg" class="img-radius" alt="User-Profile-Image">
                                <span>John Doe</span>
                                <a href="auth-signin.html" class="dud-logout" title="Logout">
                                    <i class="feather icon-log-out"></i>
                                </a>
                            </div>
                            <ul class="pro-body">
                                <li><a href="user-profile.html" class="dropdown-item"><i class="feather icon-user"></i> Profile</a></li>
                                <li><a href="email_inbox.html" class="dropdown-item"><i class="feather icon-mail"></i> My Messages</a></li>
                                <li><a href="auth-signin.html" class="dropdown-item"><i class="feather icon-lock"></i> Lock Screen</a></li>
                            </ul>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </header>
    <!-- [ Header ] end -->
    <!-- [ Main Content ] start -->
    <div class="pcoded-main-container">
     @yield('content')
    </div>
    <!-- Required Js -->
    <script src="{{asset('asset_admin')}}/js/vendor-all.min.js"></script>
    <script src="{{asset('asset_admin')}}/js/plugins/bootstrap.min.js"></script>
    <script src="{{asset('asset_admin')}}/js/ripple.js"></script>
    <script src="{{asset('asset_admin')}}/js/pcoded.min.js"></script>
    <!-- Apex Chart -->
    <script src="{{asset('asset_admin')}}/js/plugins/apexcharts.min.js"></script>
    <script src="{{asset('asset_admin')}}/fontawesome/js/all.js"></script>
    <!-- custom-chart js -->
    <script src="{{asset('asset_admin')}}/js/pages/dashboard-main.js"></script>
  
    <script src="{{asset('asset_admin')}}/js/ckeditor/ckeditor.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @yield('script')
</body>

</html>