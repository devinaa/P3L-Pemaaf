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
                <div class="sidenav-header-inner text-center"><img src="img/admin.png" alt="person"
                        class="img-fluid rounded-circle">
                    <h2 class="h5">Devina</h2><span>Admin</span>
                </div>
                <!-- Small Brand information, appears on minimized sidebar-->
                <div class="sidenav-header-logo"><a href="index.html" class="brand-small text-center">
                        <strong>MAAF</strong></a></div>
            </div>
            <!-- Sidebar Navigation Menus-->
             <div class="main-menu">
          <h5 class="sidenav-heading">Menu</h5>
          <ul id="side-main-menu" class="side-menu list-unstyled">                  
            <li><a href="index.html"> <i class="icon-home"></i>Home</a></li>
            <li><a href="#dropdownPegawai" aria-expanded="false" data-toggle="collapse"> <i class="fa fa-users"></i>Pegawai </a>
              <ul id="dropdownPegawai" class="collapse list-unstyled ">
                <li><a href="#">Input</a></li>
                <li><a href="#">Edit</a></li>
                <li><a href="#">Tampil</a></li>
                <li><a href="#">Cari</a></li>
              </ul>
            </li>
            <li><a href="#dropdownSpareparts" aria-expanded="false" data-toggle="collapse"> <i class="fa fa-briefcase"></i>Spareparts </a>
              <ul id="dropdownSpareparts" class="collapse list-unstyled ">
                <li><a href="#">Input</a></li>
                <li><a href="#">Edit</a></li>
                <li><a href="#">Tampil</a></li>
                <li><a href="#">Cari</a></li>
              </ul>
            </li>
            <li><a href="#dropdownJasa" aria-expanded="false" data-toggle="collapse"> <i class="fa fa-wrench"></i>Jasa </a>
              <ul id="dropdownJasa" class="collapse list-unstyled ">
                <li><a href="#">Input</a></li>
                <li><a href="#">Edit</a></li>
                <li><a href="#">Tampil</a></li>
                <li><a href="#">Cari</a></li>
              </ul>
            </li>
            <li><a href="#dropdownSupplier" aria-expanded="false" data-toggle="collapse"> <i class="fa fa-handshake-o"></i>Supplier </a>
              <ul id="dropdownSupplier" class="collapse list-unstyled ">
                <li><a href="#">Input</a></li>
                <li><a href="#">Edit</a></li>
                <li><a href="#">Tampil</a></li>
                <li><a href="#">Cari</a></li>
              </ul>
            </li>
            <li><a href="#dropdownMotor" aria-expanded="false" data-toggle="collapse"> <i class="fa fa-motorcycle"></i>Motor </a>
              <ul id="dropdownMotor" class="collapse list-unstyled ">
                <li><a href="#">Input</a></li>
                <li><a href="#">Edit</a></li>
                <li><a href="#">Tampil</a></li>
                <li><a href="#">Cari</a></li>
              </ul>
            </li>
            <li><a href="#dropdownCabang" aria-expanded="false" data-toggle="collapse"> <i class="fa fa-home"></i>Cabang </a>
              <ul id="dropdownCabang" class="collapse list-unstyled ">
                <li><a href="#">Input</a></li>
                <li><a href="#">Edit</a></li>
                <li><a href="#">Tampil</a></li>
                <li><a href="#">Cari</a></li>
              </ul>
            </li>
            <li><a href="#dropdownPengadaan" aria-expanded="false" data-toggle="collapse"> <i class="fa fa-shopping-cart"></i>Pengadaan </a>
              <ul id="dropdownPengadaan" class="collapse list-unstyled ">
                <li><a href="#">Input</a></li>
                <li><a href="#">Edit</a></li>
                <li><a href="#">Tampil</a></li>
                <li><a href="#">Cari</a></li>
              </ul>
            </li>
            <li><a href="#dropdownHistori" aria-expanded="false" data-toggle="collapse"> <i class="fa fa-line-chart"></i>Histori </a>
              <ul id="dropdownHistori" class="collapse list-unstyled ">
                <li><a href="#">Barang Masuk</a></li>
                <li><a href="#">Barang Keluar</a></li>
              </ul>
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
              <li class="nav-item"><a href="{{ url('logout') }}" class="nav-link logout"> <span class="d-none d-sm-inline-block">Logout</span><i class="fa fa-sign-out"></i></a></li>
            </ul>
          </div>
        </div>
      </nav>
    </header>
    <!-- Breadcrumb-->
    <div class="breadcrumb-holder">
      <div class="container-fluid">
        <ul class="breadcrumb">
          <li class="breadcrumb-item"><a href="homepegawai.php">Home</a></li>
          <li class="breadcrumb-item active">Edit Pengadaan </li>
        </ul>
      </div>
    </div>
    <!-- Tempat Count item gadget -->
    <!-- Header Section-->
    <!-- CODENYA TARUH SINI -->
    <section class="forms">
          <div class="container-fluid">
              <!-- Page Header-->
              <header>
                  <h4>Edit Pengadaan</h4>
              </header>
              <div class="row">
                <div class="col-lg-6">
                  <div class="card">
                    <div class="card-body">
                      <form action="{{ url('/api/transaksi_pengadaan', [$transaksi_pengadaans->ta_id]) }}" method="post" enctype="multipart/form-data">
                         {{ method_field('PATCH') }}
                          @csrf
                        <div class="form-group">
                          <label>Transaksi Pengadaan ID </label>
                          <input type="text" id="ta_id" name="ta_id" placeholder="" value="{{ $transaksi_pengadaans->ta_id}}" class="form-control" disabled >
                        </div>
                         <label>Status</label>
                        <div class="form-group">
                          <select class="form-control" name="ta_status" required>
                          <option value="{{ $transaksi_pengadaans->ta_status}}"></option>
                          <option value="Ready">Konfirms</option>
                          <option value="Belum Ready"disabled>Belum Di Konfirm</option>
                          </select>
                      </div>
                        <div class="form-group">
                          <input type="submit" value="Simpan" class="btn btn-primary">
                        </div>
                      </form>
                    </div>
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
    <script src="vendor/jquery.cookie/jquery.cookie.js"> </script>
    <script src="vendor/chart.js/Chart.min.js"></script>
    <script src="vendor/jquery-validation/jquery.validate.min.js"></script>
    <script src="vendor/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js"></script>
    <script src="js/charts-home.js"></script>
    <script src="js/front.js"></script>
</body>
</html>