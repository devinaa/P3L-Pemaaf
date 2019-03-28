<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>PEMAAF</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">
    <!-- Bootstrap CSS-->
    <link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome CSS-->
    <link rel="stylesheet" href="vendor/font-awesome/css/font-awesome.min.css">
    <!-- Fontastic Custom icon font-->
    <link rel="stylesheet" href="css/fontastic.css">
    <!-- Google fonts - Roboto -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700">
    <!-- jQuery Circle-->
    <link rel="stylesheet" href="css/grasp_mobile_progress_circle-1.0.0.min.css">
    <!-- Custom Scrollbar-->
    <link rel="stylesheet" href="vendor/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.css">
    <!-- theme stylesheet-->
    <link rel="stylesheet" href="css/style.default.css" id="theme-stylesheet">
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
    <!-- Side Navbar -->
    <nav class="side-navbar" role="navigation">
        <div class="side-navbar-wrapper">
            <!-- Sidebar Header    -->
            <div class="sidenav-header d-flex align-items-center justify-content-center">
                <!-- Small Brand information, appears on minimized sidebar-->
                <div class="sidenav-header-logo"><a href="index.html" class="brand-small text-center">
                        <strong>MAAF</strong><strong class="text-primary"></strong></a></div>
            </div>
            <!-- Sidebar Navigation Menus-->
            <div class="main-menu">
                <h5 class="sidenav-heading">Menu</h5>
                <ul id="side-main-menu" class="side-menu list-unstyled">
                    <li><a href="home.html">
                            <i class="fa fa-home"></i>Home </a></li>
                    <li><a href="home.html">
                            <i class="fa fa-search"></i>Riwayat Transaksi</a>
                    </li>
                    
                    <li><a data-toggle="modal" data-target="#loginModal">
                        <i class="fa fa-id-badge"></i>Login </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="page">
        <!-- navbar-->
        <header class="header">
            <nav class="navbar">
                <div class="container-fluid">
                    <div class="navbar-holder d-flex align-items-center justify-content-between">
                        <div class="navbar-header"><a id="toggle-btn" href="#" class="menu-btn"><i class="icon-bars">
                                </i></a><a href="index.html" class="navbar-brand">
                                <div class="brand-text d-none d-md-inline-block"><strong
                                        class="text-primary">PEMAAF</strong></div>
                            </a></div>

                    </div>
                </div>
            </nav>
        </header>
        <div id="loginModal" class="modal fade" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4>Login</h4>
                        <button type="button" class="close" data-dismiss="modal"> &times;</button>
                        
                    </div>
                    <div class="modal-body">
                        <form class="form-signin" action="/kirimdata" method="post">
                        {{ csrf_field() }}
                            <div class="form-group">
                                <label class="sr-only" for="pgw_username">Username</label><input type="text" class="form-control input-sm"
                                    placeholder="Username" id="pgw_username" name="pgw_username">
                            </div>
                            <div class="form-group">
                                <label class="sr-only" for="password">Password</label>
                                <input type="password" class="form-control input-sm" placeholder="Password" id="pgw_password" name="pgw_password"></div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success btn-ms" onclick="get_login()">Login</button>
                        <button type="button" class="btn btn-default btn-ms" data-dismiss="modal">Cancel</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <footer class="main-footer">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <p>PEMAAF &copy; 2019</p>
                </div>
            </div>
        </div>
    </footer>
    <!-- JavaScript files-->
    <script src="{{asset(vendor/jquery/jquery.min.js)}}"></script>
    <script src="{{asset(vendor/popper.js/umd/popper.min.js)}}"> </script>
    <script src="{{asset(vendor/bootstrap/js/bootstrap.min.js)}}"></script>
    <script src="{{asset(js/grasp_mobile_progress_circle-1.0.0.min.js)}}"></script>
    <script src="{{asset(vendor/jquery.cookie/jquery.cookie.js")}}> </script>
    <script src="{{asset(vendor/chart.js/Chart.min.js)}}"></script>
    <script src="{{asset(vendor/jquery-validation/jquery.validate.min.js)}}"></script>
    <script src="{{asset(vendor/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js)}}"></script>
    <script src="{{asset(js/charts-home.js)}}"></script>
     <script src="{{asset('js/login.js')}}"></script>
    <!-- Main File-->
    <script src="{{asset(js/front.js)}}"></script>
</body>

</html>