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
        <div class="sidenav-header-inner text-center"><img src="img/admin.png" alt="person" class="img-fluid rounded-circle">
          <h2 class="h5">Devina</h2><span>Admin</span>
        </div>
        <!-- Small Brand information, appears on minimized sidebar-->
        <div class="sidenav-header-logo"><a href="{{ url('/homepegawai') }}" class="brand-small text-center">
          <strong>MAAF</strong></a></div>
        </div>      
        <!-- Sidebar Navigation Menus-->
        <div class="main-menu">
          <h5 class="sidenav-heading">Menu</h5>
          <ul id="side-main-menu" class="side-menu list-unstyled">                  
            <li><a href="{{ url('/homepegawai') }}"> <i class="icon-home"></i>Home</a></li>
            <li><a href="#dropdownPenjualan" aria-expanded="false" data-toggle="collapse"> <i class="fa fa-line-chart"></i>Transaksi Penjualan</a>
              <ul id="dropdownPenjualan" class="collapse list-unstyled ">
                <li><a href="{{ url('/penjualanInputSV') }}">Penjualan Service</a></li>
                <li><a href="{{ url('/penjualanInputSP') }}">Penjualan Sparepart</a></li>
                <li><a href="{{ url('/penjualanInputSS') }}">Penjualan Service Sparepart</a></li>
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
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item active">Tampil Transaksi Penjualan </li>
        </ul>
      </div>
    </div>
    <section class="forms">
      <div class="container-fluid">
            <!-- Page Header-->
        <div class="row">
          <div class="col-lg-12">
            <div class="card">
              <div class="card-header d-flex align-items-center">
                <h4>Cari Transaksi Penjualan</h4>
              </div>
              <div class="card-body">
                <form action="{{ url()->current() }}">
                  <div class="form-group">
                    <label for="inlineFormInput" class="sr-only">Nama Konsumen</label>
                    <input id="tj_nama" type="text" placeholder="" name="tj_nama" class="mr-3 form-control">
                  </div>
                  <span class="form-group-prepend">
                    <button type="submit" class="btn btn-primary">Cari</button>
                  </span>
                </form>
              </div>
            </div>
          </div>
        </div>
        <form action="{{ url('/penjualanInput') }}" >
          <input name="tambah" type="hidden" value="Tambah">
          <button class="btn btn-success" type="submit" style="margin-top:-10px;"> <i class="fa fa-plus-square"></i>Tambah</button>
        </form>
        <div class="row">
            <div class="col-lg-12">
              <div class="card">
              <br>
                <h4>&emsp;Tampil Transaksi Penjualan</h4>
                <div class="card-body">
                    <div class="table-responsive">
                    <table class="table table-striped table-hover">
                      <thead>
                        <tr>
                          <th>ID Transaksi</th>
                          <th>Tanggal</th>
                          <th>Nama Konsumen</th>
                          <th>No Telepon</th>
                          <th>Detail Motor</th>
                          <th>Detail Service</th>
                          <th>Detail Sparepart</th>
                          <th>ID CS</th>
                          <th>ID Montir</th>
                          <th>ID Montir2</th>
                          <th>Subtotal Service</th>
                          <th>Subtotal Sparepart</th>
                          <th>Total</th>
                          <th>Status</th>
                          <th>Bayar</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($transaksi_juals as $transaksi_jual)
                      <tr>
                        <td>{{ $transaksi_jual->tj_id }}</td>
                        <td>{{ date('dmy',strtotime($transaksi_jual->tj_tanggal)) }}</td>
                        <td>{{ $transaksi_jual->tj_nama }}</td>
                        <td>{{ $transaksi_jual->tj_telepon }}</td>
                        <td>
                          <form action="{{ url('/penjualanTampilDetailMotor', [$transaksi_jual->tj_id]) }}" >
                            <input name="tambah" type="hidden" value="cek">
                            <button class="btn btn-primary" type="submit">Cek</button>
                          </form>
                        </td>
                        <td>
                          <form action="{{ url('/penjualanTampilDetailService', [$transaksi_jual->tj_id]) }}" >
                            <input name="tambah" type="hidden" value="cek">
                            <button class="btn btn-primary" type="submit">Cek</button>
                          </form>
                        </td>
                        <td>
                          <form action="{{ url('/penjualanTampilDetailSparepart',[$transaksi_jual->tj_id]) }}" >
                            <input name="tambah" type="hidden" value="cek">
                            <button class="btn btn-primary" type="submit">Cek</button>
                          </form>
                        </td>
                        <td>{{ $transaksi_jual->id_cs }}</td>
                        <td>{{ $transaksi_jual->id_montir }}</td>
                        <td>{{ $transaksi_jual->id_montir2 }}</td>
                        <td>{{ $transaksi_jual->tj_subtotal_jasa }}</td>
                        <td>{{ $transaksi_jual->tj_subtotal_spareparts }}</td>
                        <td>{{ $transaksi_jual->tj_jumlah }}</td>
                        <td>{{ $transaksi_jual->tb_status }}</td>
                        <td>
                          <form action="{{ url('/pembayaranTampil') }}" >
                            <input name="tambah" type="hidden" value="cek">
                            <button class="btn btn-primary" type="submit">Bayar</button>
                          </form>
                        </td>
                      </tr>
                      </tbody>
                        @endforeach
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section> 
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