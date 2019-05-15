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
        @include('_partial.flash_message')
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4>Tampil Pegawai</h4>
                </div>
                <div class="card-body">
                  @include('_partial.flash_message')
                    <div class="table-responsive">
                        <table class="table table-striped table-hover">
                            <thead>
                                <tr>
                                  <th>ID Pegawai</th>
                                  <th>Nama</th>
                                  <th>Alamat</th>
                                  <th>No Telepon</th>
                                  <th>Gaji</th>
                                  <th>Jabatan</th>
                                  <th>Username</th>
                                  <th>Password</th>
                                  <th>Cabang</th>
                                </tr>
                            </thead>
                            <tbody>
                             <!-- @php
                              $no = 1; 
                            @endphp -->
                              @foreach($pegawais as $pegawai)
                                <tr>
                                  <td>{{ $pegawai->pgw_id }}</td>
                                  <td>{{ $pegawai->pgw_nama }}</td>
                                  <td>{{ $pegawai->pgw_alamat }}</td>
                                  <td>{{ $pegawai->pgw_telepon }}</td>
                                  <td>{{ $pegawai->pgw_gaji }}</td>
                                  <td>{{ $pegawai->pgw_jabatan }}</td>
                                  <td>{{ $pegawai->pgw_username }}</td>
                                  <td>{{ $pegawai->pgw_password }}</td>
                                  <td>{{ $pegawai->cab_id }}</td>
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
    <script> src="public/js/bootbox.min"</script>
    <script> src="{{ asset('js/laravelapp.js') }}" </script>
</body>
</html>