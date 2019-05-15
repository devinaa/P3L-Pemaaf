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
                <li><a href="{{ url('/jasaEEdit') }}">Edit</a></li>
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
                <li><a href="{{ url('/motorInput') }}">Input</a></li>
                <li><a href="{{ url('/motorEdit') }}">Edit</a></li>
                <li><a href="{{ url('/motorTampil') }}">Tampil</a></li>
                <li><a href="{{ url('/motorCari') }}">Cari</a></li>
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
    </header>
    <!-- Breadcrumb-->
    <div class="breadcrumb-holder">
      <div class="container-fluid">
        <ul class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ url('') }}">Home</a></li>
          <li class="breadcrumb-item"><a href="{{ url('/penjualanTampil') }}">Penjualan Tampil</a></li>
          <li class="breadcrumb-item active">Tampil Detail Motor Konsumen</li>
        </ul>
      </div>
    </div>
    
    <section class="forms">
      <div class="container-fluid">
            <!-- Page Header-->
      <form action="{{ url('/penjualanInputMotor',Request()->tj_id) }}" >
          <input name="tambah" type="hidden" value="Tambah">
          <button class="btn btn-success" type="submit" style="margin-top:30px"> <i class="fa fa-plus-square"></i>Tambah</button>
        </form>
        <div class="row">
            <div class="col-lg-12">
              <div class="card">
              <br>
                <h4>&emsp;Tampil Detail Motor Konsumen</h4>
                <div class="card-body">
                    <div class="table-responsive">
                    <table class="table table-striped table-hover">
                      <thead>
                        <tr>
                          <th>ID Transaksi</th>
                          <th>Tipe Motor</th>
                          <th>Plat Motor</th>
                          <th>Status</th>
                          <th>Keterangan</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($detail_motors as $detail_motor)
                      <tr>
                        <td>{{ $detail_motor->tj_id }}</td>
                        <td>{{ $detail_motor->mtr_id }}</td>
                        <td>{{ $detail_motor->dm_plat }}</td>
                        <td>{{ $detail_motor->dm_status }}</td>
                        <td>
                        <form action="{{ url('penjualanEditMotor', [$detail_motor->dm_id ]) }}" method="post">
                          {{ method_field('GET') }}
                            @csrf
                            <input name="edit" type="hidden" value="EDIT">
                            <button class="btn btn-info" type="submit">Edit</button>
                          </form></td>
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

<script>
  function search() {
    window.location='/api/cabang/' + 
      encodeURIComponent(document.getElementById('cabangCari').value);
  }
  var tj_id = {{ Request()->tj_id}}

</script>