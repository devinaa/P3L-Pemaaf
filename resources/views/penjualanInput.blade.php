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
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/resources/demos/style.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
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
                    <h2 class="h5">Hai</h2><span>Pegawai</span>
                </div>
                <!-- Small Brand information, appears on minimized sidebar-->
                <div class="sidenav-header-logo"><a href="index.html" class="brand-small text-center">
                        <strong>MAAF</strong></a></div>
            </div>
            <!-- Sidebar Navigation Menus-->
             <div class="main-menu">
          <h5 class="sidenav-heading">Menu</h5>
          <ul id="side-main-menu" class="side-menu list-unstyled">                  
            <li><a href="{{ url('/homepegawai') }}"> <i class="icon-home"></i>Home</a></li>
            <li><a href="#dropdownPenjualan" aria-expanded="false" data-toggle="collapse"> <i class="fa fa-line-chart"></i>Transaksi Penjualan</a>
              <ul id="dropdownPenjualan" class="collapse list-unstyled ">
                <li><a href="{{ url('/penjualanTampil') }}">CRUDS Penjualan</a></li>
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
        <div class="countainer">
         @if(session()->has('notif'))
          <div>
            <div class="row">
              <div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true"> &times;</button>
                <strong>Notification</strong> {{ session()->get('notif') }}  
              </div>
            </div>
          </div>

        @endif
        </div>
      </header>
      <!-- Breadcrumb-->
        <div class="breadcrumb-holder">
            <div class="container-fluid">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="homepegawai.php">Home</a></li>
                    <li class="breadcrumb-item active">Input Transaksi Penjualan </li>
                </ul>
            </div>
        </div>
        <section class="forms">
          <div class="container-fluid">
            <!-- Page Header-->
            <header>
                <h4>Input Transaksi Penjualan</h4>
            </header>
            <div class="row">
              <div class="col-lg-6">
                <div class="card">
                  <div class="card-body">
                    <form action="{{ url('/api/transaksi_jual') }}" method="post" enctype="multipart/form-data" >
                      {{ csrf_field() }}
                      <label>ID Transaksi</label>
                      <div class="form-row">
                          <div class="col">
                            <label>Jenis Transaksi</label>
                            <select class="form-control" name="tj_jenis" required>
                              <option value=""> --Pilih-- </option>
                              <option value="SV" >Service</option>
                              <option value="SP" >Sparepart</option>
                              <option value="SS" >Service Sparepart</option>
                            </select>
                            <input type="text" name="tj_noTransaksi" class="form-control" placeholder="No Transaksi" required>
                          </div>
                      </div>
                      <div class="form-group">
                          <label>Nama Konsumen</label>
                          <input type="text" id="tj_nama" name="tj_nama" placeholder="" class="form-control" required>
                      </div>
                      <div class="form-group">  
                          <label>No Telp</label>
                          <input type="text" id="tj_telepon" name="tj_telepon" placeholder="" class="form-control" required>
                      </div>  
                      <!-- <div class="form-group">
                          <label>Jumlah</label>
                          <input type="number" id="tj_jumlah" name="tj_jumlah" placeholder="" class="form-control" required>
                      </div> -->
                      
                      <label>CS</label>
                      <select name="id_cs" id="id_cs" class="form-control">
                        <option value="">-- Pilih --</option>
                          @foreach ($pegawais as $pegawai)
                          <option value="{{ $pegawai->pgw_id }}">{{ $pegawai->pgw_nama.'('.$pegawai->pgw_jabatan.')' }}</option>
                          @endforeach 
                      </select>
                        <label>Montir</label>
                      <select name="id_montir" id="id_montir" class="form-control">
                        <option value="">-- Pilih --</option>
                          @foreach ($pegawais as $pegawai)
                          <option value="{{ $pegawai->pgw_id }}">{{ $pegawai->pgw_nama.'('.$pegawai->pgw_jabatan.')' }}</option>
                          @endforeach 
                      </select><label>Montir 2</label>
                      <select name="id_montir2" id="id_montir2" class="form-control">
                        <option value="">-- Pilih --</option>
                          @foreach ($pegawais as $pegawai)
                          <option value="{{ $pegawai->pgw_id }}">{{ $pegawai->pgw_nama.'('.$pegawai->pgw_jabatan.')' }}</option>
                          @endforeach 
                      </select>
                      <label>Cabang</label>
                      <select name="cab_id" id="cab_id" class="form-control">
                        <option value="">-- Pilih --</option>
                        @foreach ($cabangs as $cabang)
                        <option value="{{ $cabang->cab_id }}">{{ $cabang->cab_nama }}</option>
                        @endforeach 
                      </select>
                      <div class="form-group">
                        <label>Status Pembayaran</label>
                        <select class="form-control" name="tb_status" required>
                          <option value=""> --Pilih-- </option>
                          <option value="Lunas"disabled>Lunas</option>
                          <option value="Belum Lunas" >Belum Lunas</option>
                        </select>
                      </div>
                    <div class="form-group">
                        <input type="submit" value="Simpan" class="btn btn-primary" >
                    </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
      </div>
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