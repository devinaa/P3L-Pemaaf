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
            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
            <li class="breadcrumb-item active">Input Sparepart</li>
          </ul>
        </div>
      </div>
        <section class="forms">
            <div class="container-fluid">
                <!-- Page Header-->
                <header>
                    <h4>Input Spareparts</h4>
                </header>
                @if ($errors->any())
                        {{ implode('', $errors->all('<div>:message</div>')) }}
                @endif
                <div class="row">
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-body">
                                <form action="{{ url('/api/sparepart') }}" method="post" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label>Nama Sparepart</label>
                                        <input type="text" id="sp_nama"name="sp_nama" placeholder="" class="form-control" required>
                                        <!-- @if ($errors->has('sp_nama'))
                                            <div class="error">{{ $errors->first('sp_nama') }}</div>
                                        @endif -->
                                    </div>
                                    <div class="form-group">
                                        <label>Tipe Sparepart</label>
                                        <input type="text" id="sp_tipe"name="sp_tipe" placeholder="" class="form-control" required>
                                        <!-- @if ($errors->has('sp_tipe'))
                                            <div class="error">{{ $errors->first('sp_tipe') }}</div>
                                        @endif -->
                                    </div>
                                    <div class="form-group">
                                        <label>Harga Beli</label>
                                        <input type="number" id="sp_hargaBeli" name="sp_hargaBeli" placeholder="" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Harga Jual</label>
                                        <input type="number" id="sp_hargaJual" name="sp_hargaJual" placeholder="" class="form-control" required> 
                                    </div>
                                     <label>Merk</label>
                                     <div class="form-group">
                                        <select class="form-control" name="sp_merk" required>
                                        <option value="">-- Pilih --</option>
                                        <option value="Honda">Honda</option>
                                        <option value="Yamaha">Yamaha</option>
                                        <option value="Suzuki">Suzuki</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Upload Foto</label>
                                        <br>
                                        <!-- <img id="uploadFoto" src="https://healthnestuganda.org/wp-content/uploads/2015/11/placeholder-180x180.png" alt="your image" /> -->
                                        <input type='file' id="sp_gambar" name="sp_gambar"  required/>
                                    </div>
                                    <div class="form-group">
                                        <label>Jumlah Minimal Stok</label>
                                        <input type="number" id="sp_minStok" value="" name="sp_minStok" placeholder="" class="form-control" >
                                    </div>
                                    <div class="form-group">
                                        <label>Jumlah Stok</label>
                                        <input type="number" id="sp_stok" name="sp_stok" placeholder="" class="form-control" required>
                                    </div>
                                    <label>Peletakan Barang</label>
                                     <div class="form-group">
                                        <label>Letak</label>
                                        <select class="form-control" name="sp_letak" required>
                                        <option value="">Pilih</option>
                                        <option value="DPN">Depan</option>
                                        <option value="TGH">Tengah</option>
                                        <option value="BLK">Belakang</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Ruang</label>
                                        <select class="form-control" name="sp_ruang" required>
                                        <option value="">Pilih</option>
                                        <option value="KACA">Kaca</option>
                                        <option value="DUS">Dus</option>
                                        <option value="BAN">Ban</option>
                                        <option value="KAYU">Kayu</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>No Urut</label>
                                        <input type="number" placeholder="Nomor urut 2 digit " id="sp_noUrut" name="sp_noUrut" class="form-control" required>
                                    </div>
                                    <!-- <div class="form-group">
                                        <label>Supplier ID</label>
                                        <input type="text" placeholder="" id="su_id" name="su_id" class="form-control" required>
                                    </div>
                                   
                                    <div class="form-group">
                                        <label>Motor ID</label>
                                        <input type="text" placeholder="" id="mtr_id" name="mtr_id" class="form-control" required>
                                    </div> -->
                                    <label>Supplier ID</label>
                                    <select name="su_id" id="su_id" class="form-control">
                                      <option value="">-- Pilih --</option>
                                      @foreach ($suppliers as $supplier)
                                      <option value="{{ $supplier->su_id }}">{{ $supplier->su_nama }}</option>
                                      @endforeach 
                                    </select>
                                    
                                    <label>Motor ID</label>
                                    <select name="mtr_id" id="mtr_id" class="form-control">
                                      <option value="">-- Pilih --</option>
                                        @foreach ($motors as $motor)
                                        <option value="{{ $motor->mtr_id }}">{{ $motor->mtr_merk.' '.$motor->mtr_tipe }}</option>
                                        @endforeach 
                                    </select>

                                    <br>
                                    <br>
                                    <div class="form-group">
                                        <input type="submit" value="Simpan" class="btn btn-primary">
                                    </div>
                                </form>
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