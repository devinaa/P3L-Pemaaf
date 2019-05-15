<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>PEMAAF</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">
    <!-- Bootstrap CSS-->
    <link rel="stylesheet" href="{{asset('vendor/bootstrap/css/bootstrap.min.css')}}">
    <!-- Font Awesome CSS-->
    <link rel="stylesheet" href="{{asset('vendor/font-awesome/css/font-awesome.min.css')}}">
    <!-- Fontastic Custom icon font-->
    <link rel="stylesheet" href="{{asset('css/fontastic.css')}}">
    <!-- Google fonts - Roboto -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700">
    <!-- jQuery Circle-->
    <link rel="stylesheet" href="{{asset('css/grasp_mobile_progress_circle-1.0.0.min.css')}}">
    <!-- Custom Scrollbar-->
    <link rel="stylesheet" href="{{asset('vendor/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.css')}}">
    <!-- theme stylesheet-->
    <link rel="stylesheet" href="{{asset('css/style.default.css')}}" id="theme-stylesheet">
    <!-- Custom stylesheet - for your changes-->
    <!-- <link rel="stylesheet" href="css/custom.css"> -->
    <!-- Favicon-->
    <link rel="shortcut icon" href="img/favicon.ico">
    <!-- Tweaks for older IEs-->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
        
</head>
<body>
  <nav class="side-navbar" role="navigation">
        <div class="side-navbar-wrapper">
        <!-- Sidebar Header    -->
            <div class="sidenav-header d-flex align-items-center justify-content-center">
                <!-- User Info-->
                <div class="sidenav-header-logo"><a href="{{ url('') }}" class="brand-small text-center">
                <strong>MAAF</strong></a></div>
            </div>
            <!-- Sidebar Navigation Menus-->
          <div class="main-menu">
          <h5 class="sidenav-heading">Menu</h5>
          <ul id="side-main-menu" class="side-menu list-unstyled">                  
            <li><a  href="{{ url('') }}">
                <i class="fa fa-home"></i>Home </a></li>
            <li><a  href="{{ url('/kostumerRiwayat') }}">
                <i class="fa fa-search"></i>Riwayat Transaksi</a></li>
            <li><a  href="{{ url('/kostumerSortir') }}">
                <i class="fa fa-wrench"></i>Cek Spareparts</a></li>
            <li><a  data-toggle="modal" data-target="#loginModal">
                <i class="fa fa-id-badge"></i>Login </a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </nav>
  <div class="page">
    <!-- navbar-->
    <header class="header">
      <nav class="navbar">
        <div class="container-fluid">
          <div class="navbar-holder d-flex align-items-center justify-content-between">
            <div class="navbar-header"><a id="toggle-btn" href="#" class="menu-btn"><i class="icon-bars"> </i></a><a href="index.html" class="navbar-brand">
                <div class="brand-text d-none d-md-inline-block"><strong class="text-primary">Dashboard</strong></div></a></div>
            <ul class="nav-menu list-unstyled d-flex flex-md-row align-items-md-center">
              <!-- Notifications dropdown-->
              <li class="nav-item dropdown"> 
                <a id="notifications" rel="nofollow" data-target="#" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link">
                  <i class="fa fa-bell"></i><span class="badge badge-warning"></span></a>
                <ul aria-labelledby="notifications" class="dropdown-menu">
                  <li><a rel="nofollow" href="#" class="dropdown-item"> 
                      <div class="notification d-flex justify-content-between">
                        <div class="notification-content"><i class="fa fa-envelope"></i>You have 1 new messages </div>
                        <div class="notification-time"><small>4 minutes ago</small></div>
                      </div></a></li>
                  <li><a rel="nofollow" href="#" class="dropdown-item all-notifications text-center"> <strong> <i class="fa fa-bell"></i>view all notifications</strong></a></li>
                </ul>
              </li>
              <!-- Log out-->
            </ul>
          </div>
        </div>
      </nav>
    </header>
    <!-- Breadcrumb-->
    <div class="breadcrumb-holder">
      <div class="container-fluid">
        <ul class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ url('') }}">Home</a></li>
          <li class="breadcrumb-item active"> Tampil Detail Service </li>
        </ul>
      </div>
    </div>
    <section class="forms">
      <div class="container-fluid">
            <!-- Page Header-->
        <form action="{{ url('/kostumerRiwayat') }}" >
          <input name="tambah" type="hidden" value="Tambah">
          <button class="btn" type="submit" style="margin-top:10px;"> <i class="fa fa-caret-square-o-left"></i>Kembali</button>
        </form>
        <div class="row">
          <div class="col-lg-12">
            <div class="card">
            <br>
              <h4>&emsp;Tampil Detail Sparepart Konsumen</h4>
              <div class="card-body">
                  <div class="table-responsive">
                  <table class="table table-striped table-hover">
                    <thead>
                      <tr>
                        <th>ID Transaksi</th>
                        <th>ID Sparepart</th>
                        <th>Jumlah</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($detail_spareparts as $detail_sparepart)
                    <tr>
                      <td>{{ $detail_sparepart->tj_id }}</td>
                      <td>{{ $detail_sparepart->sp_id }}</td>
                      <td>{{ $detail_sparepart->ds_jumlah }}</td>
                    </tr>
                  </tbody>
                      @endforeach
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
    </div>
      <!-- JavaScript files-->
      <script src="vendor/jquery/jquery.min.js"></script>
      <script src="vendor/popper.js/umd/popper.min.js"> </script>
      <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
      <script src="js/grasp_mobile_progress_circle-1.0.0.min.js"></script>
      <script src="vendor/jquery.cookie/jquery.cookie.js"> </script>
      <script src="vendor/chart.js/Chart.min.js"></script>
      <script src="vendor/jquery-validation/jquery.validate.min.js"></script>
      <script src="vendor/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js"></script>
      <script src="js/charts-home.js"></script>
      <script src="js/front.js"></script>
  </body>
</html>