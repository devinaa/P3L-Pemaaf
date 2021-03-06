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
    <script>
    $( function() {
        $( "#ta_tanggal" ).ta_tanggal();
    } );
    </script>
    <link rel="shortcut icon" href="img/favicon.ico">
    <!-- Tweaks for older IEs-->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
    <script src="sweetalert2/dist/sweetalert2.all.min.js"></script>
    <link rel="stylesheet" href="sweetalert2/dist/sweetalert2.min.css">
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
            <li><a href="#dropdownPegawai" aria-expanded="false" data-toggle="collapse"> <i class="fa fa-users"></i>Pegawai </a>
              <ul id="dropdownPegawai" class="collapse list-unstyled ">
                <li><a href="{{ url('/pgwInput') }}">Input</a></li>
                <li><a href="{{ url('/pgwEdit') }}">Edit</a></li>
                <li><a href="{{ url('/pgwTampil') }}">Tampil</a></li>
                <li><a href="{{ url('/pgwCari') }}">Cari</a></li>
              </ul>
            </li>
            <li><a href="#dropdownSpareparts" aria-expanded="false" data-toggle="collapse"> <i class="fa fa-briefcase"></i>Spareparts </a>
              <ul id="dropdownSpareparts" class="collapse list-unstyled ">
                <li><a href="{{ url('/sparepartInput') }}">Input</a></li>
                <li><a href="{{ url('/sparepartEdit') }}">Edit</a></li>
                <li><a href="{{ url('/sparepartTampil') }}">Tampil</a></li>
                <li><a href="{{ url('/sparepartCari') }}">Cari</a></li>
              </ul>
            </li>
            <li><a href="#dropdownJasa" aria-expanded="false" data-toggle="collapse"> <i class="fa fa-wrench"></i>Jasa </a>
              <ul id="dropdownJasa" class="collapse list-unstyled ">
                <li><a href="{{ url('/jasaInput') }}">Input</a></li>
                <li><a href="{{ url('/jasaEdit') }}">Edit</a></li>
                <li><a href="{{ url('/jasaTampil') }}">Tampil</a></li>
                <li><a href="{{ url('/jasaCari') }}">Cari</a></li>
              </ul>
            </li>
            <li><a href="#dropdownSupplier" aria-expanded="false" data-toggle="collapse"> <i class="fa fa-handshake-o"></i>Supplier </a>
              <ul id="dropdownSupplier" class="collapse list-unstyled ">
                <li><a href="{{ url('/supplierInput') }}">Input</a></li>
                <li><a href="{{ url('/supplierEdit') }}">Edit</a></li>
                <li><a href="{{ url('/supplierTampil') }}">Tampil</a></li>
                <li><a href="{{ url('/supplierCari') }}">Cari</a></li>
              </ul>
            </li>
            <li><a href="#dropdownMotor" aria-expanded="false" data-toggle="collapse"> <i class="fa fa-motorcycle"></i>Motor </a>
              <ul id="dropdownMotor" class="collapse list-unstyled ">
                <li><a href="{{ url('/mtrInput') }}">Input</a></li>
                <li><a href="{{ url('/mtrEdit') }}">Edit</a></li>
                <li><a href="{{ url('/mtrTampil') }}">Tampil</a></li>
                <li><a href="{{ url('/mtrCari') }}">Cari</a></li>
              </ul>
            </li>
            <li><a href="#dropdownCabang" aria-expanded="false" data-toggle="collapse"> <i class="fa fa-home"></i>Cabang </a>
              <ul id="dropdownCabang" class="collapse list-unstyled ">
                <li><a href="{{ url('/cabangInput') }}">Input</a></li>
                <li><a href="{{ url('/cabangEdit') }}">Edit</a></li>
                <li><a href="{{ url('/cabangTampil') }}">Tampil</a></li>
                <li><a href="{{ url('/cabangCari') }}">Cari</a></li>
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
                    <li class="breadcrumb-item active">Input Detail Motor </li>
                </ul>
            </div>
        </div>
        <section class="forms">
          <div class="container-fluid">
            <!-- Page Header-->
            <header>
                <h4>Input Detail Motor</h4>
            </header>
            <div class="row">
              <div class="col-lg-6">
                <div class="card">
                  <div class="card-body">
                    <form action="{{ url('penjualanInputMotor') }}" method="post" enctype="multipart/form-data" >
                {{ csrf_field() }}
                      <!-- <label>ID Transaksi</label>
                      <div class="form-row">
                          
                          <div class="col">
                              <input type="text"name="tj_jenis" class="form-control" placeholder="" value="SS" disable>
                          </div>
                          <div class="col">
                              <input type="date" name="tj_tanggal" class="form-control">
                          </div>
                          <div class="col">
                                <input type="text" name="tj_noTransaksi" class="form-control" placeholder="No Transaksi" required>
                          </div>
                      </div> -->

                      <div class="form-group">
                          <label>Transaksi ID</label>
                          <input type="text" id="tj_id" name="tj_id" value="{{Request()-> tj_id}}" class="form-control" readonly>
                      </div>
                      

                    
                      <div class="form-group">
                          <label>Plat Motor</label>
                          <input type="text" id="dm_plat" name="dm_plat" placeholder="Contoh:AB1234BA" class="form-control" required>
                      </div>
                      <div class="form-group">
                          <label>Status</label>
                          <select class="form-control" name="dm_status" required>
                          <option value=""> --Pilih-- </option>
                          <option value="No">Belum Ready</option>
                          <option value="Ready" disabled>Sudah Ready</option>
                          </select>                
                      </div>
                      <label>Tipe Motor</label>
                      <select name="mtr_id" id="mtr_id" class="form-control">
                        <option value="">-- Pilih --</option>
                          @foreach ($motors as $motor)
                          <option value="{{ $motor->mtr_id }}">{{ $motor->mtr_merk.' '.$motor->mtr_tipe }}</option>
                          @endforeach 
                      </select>
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
    <script src="https://cdn.jsdelivr.net/sweetalert2/6.4.2/sweetalert2.min/js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
    <script src="sweetalert2/dist/sweetalert2.all.min.js"></script> 

</body>
</html>