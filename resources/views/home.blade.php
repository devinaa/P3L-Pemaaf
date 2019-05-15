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
    <link rel="shortcut icon" href="img/favicon.ico">
    <!-- Style Untuk Carousell -->
   <style>
    `* {box-sizing: border-box}
    body {font-family: Verdana, sans-serif; margin:0}
    .mySlides {display: none}
    img {vertical-align: middle;}

    /* Slideshow container */
    .slideshow-container {
    max-width: 1000px;
    position: relative;
    margin: auto;
    }

    /* Next & previous buttons */
    .prev, .next {
    cursor: pointer;
    position: absolute;
    top: 50%;
    width: auto;
    padding: 16px;
    margin-top: -22px;
    color: white;
    font-weight: bold;
    font-size: 18px;
    transition: 0.6s ease;
    border-radius: 0 3px 3px 0;
    user-select: none;
    }

    /* Position the "next button" to the right */
    .next {
    right: 0;
    border-radius: 3px 0 0 3px;
    }

    /* On hover, add a black background color with a little bit see-through */
    .prev:hover, .next:hover {
    background-color: rgba(0,0,0,0.8);
    }

    /* Caption text */
    .text {
    color: #f2f2f2;
    font-size: 15px;
    padding: 8px 12px;
    position: absolute;
    bottom: 8px;
    width: 100%;
    text-align: center;
    }

    /* Number text (1/3 etc) */
    .numbertext {
    color: #f2f2f2;
    font-size: 12px;
    padding: 8px 12px;
    position: absolute;
    top: 0;
    }

    /* The dots/bullets/indicators */
    .dot {
    cursor: pointer;
    height: 15px;
    width: 15px;
    margin: 0 2px;
    background-color: #bbb;
    border-radius: 50%;
    display: inline-block;
    /* transition: background-color 0.6s ease; */
    }

    .active, .dot:hover {
    background-color: #717171;
    }

    /* Fading animation */
    .fade {
    -webkit-animation-name: fade;
    -webkit-animation-duration: 1.5s;
    animation-name: fade;
    animation-duration: 1.5s;
    }

    @-webkit-keyframes fade {
    from {opacity: .4} 
    to {opacity: 1}
    }

    @keyframes fade {
    from {opacity: .4} 
    to {opacity: 1}
    }

    /* On smaller screens, decrease text size */
    @media only screen and (max-width: 300px) {
    .prev, .next,.text {font-size: 11px}
    }
    </style>
        
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
                    <li><a  href="{{ url('') }}">                    
                            <i class="fa fa-home"></i>Home </a></li>
                    <li><a  href="{{ url('/kostumerRiwayatCari') }}">
                            <i class="fa fa-search"></i>Riwayat Transaksi</a></li>
                    <li><a  href="{{ url('/kostumerSortir') }}">
                            <i class="fa fa-wrench"></i>Cek Spareparts</a></li>
                    <li><a  data-toggle="modal" data-target="#loginModal">
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
        <div class="container">
            <br>
            <div style="text-align:center">
                <div class="row">
                    <div class="column">
                        <h2>Bengkel Pemaaf</h2>
                        <div class="slideshow-container">
                        <div class="mySlides ">
                        <div class="numbertext">1 / 3</div>
                        <img src="img/bengkel4.jpg" style="width:100%">
                        <div class="text">Memberikan Pelayanan Terbaik</div>
                        </div>

                        <div class="mySlides ">
                        <div class="numbertext">2 / 3</div>
                        <img src="img/bengkel.jpg" style="width:100%">
                        <div class="text">Pekerja Yang Kompeten</div>
                        </div>

                        <div class="mySlides ">
                        <div class="numbertext">3 / 3</div>
                        <img src="img/bengkel7.jpg" style="width:100%">
                        <div class="text" style="text-color:black">Memuaskan</div>
                        </div>
<!-- 
                        <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
                        <a class="next" onclick="plusSlides(1)">&#10095;</a> -->

                        </div>
                        <br>

                        <div style="text-align:center">
                        <span class="dot" onclick="currentSlide(1)"></span> 
                        <span class="dot" onclick="currentSlide(2)"></span> 
                        <span class="dot" onclick="currentSlide(3)"></span> 
                    </div>
                    <!-- <img src="img/pemaaf.png" style="width:100px"> -->
                    <!-- <img src="img/mech2.jpg" alt="Trulli" width="500" height="333"> -->
                        <div style="text-align:center">
                        <br>
                        <h5 align="justify">Bengkel PEMAAF menyediakan jasa service dan penjualan spareparts yang berada di Kota Yogyakarta</h5>
                        <h5 style="text-align:left">Alamat: Jl. Seturan No 33 (Dalam Jwalk)</h5>
                        <h5 style="text-align:left">No Telepon: 085232777700</h5>
                        <h5 style="text-align:left">Web: www.pemaafnyaseturan.com</h5>
                        </div>
                    </div>
                </div>
            </div>
         </div>
        <div id="loginModal" class="modal fade" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4>Login</h4>
                        <button type="button" class="close" data-dismiss="modal"> &times;</button>
                    </div>
                    <div class="modal-body">
                        <form class="form-signin" action="{{ url('/kirimdata') }}" method="post">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label class="sr-only" for="pgw_username">Username</label>
                                <input type="text" class="form-control input-sm" placeholder="Username" id="pgw_username" name="pgw_username">
                            </div>
                            <div class="form-group">
                                <label class="sr-only" for="password">Password</label>
                                <input type="password" class="form-control input-sm" placeholder="Password" id="pgw_password" name="pgw_password">
                            </div>
                            <button type="submit" class="btn btn-success btn-ms" >Login</button>
                            <button type="button" class="btn btn-default btn-ms" data-dismiss="modal">Cancel</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
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
    <!-- Main File-->
    <script src="js/front.js"></script>
    <script>
        var slideIndex = 1;
        showSlides(slideIndex);

        function plusSlides(n) {
        showSlides(slideIndex += n);
        }

        function currentSlide(n) {
        showSlides(slideIndex = n);
        }

        function showSlides(n) {
        var i;
        var slides = document.getElementsByClassName("mySlides");
        var dots = document.getElementsByClassName("dot");
        if (n > slides.length) {slideIndex = 1}    
        if (n < 1) {slideIndex = slides.length}
        for (i = 0; i < slides.length; i++) {
            slides[i].style.display = "none";  
        }
        for (i = 0; i < dots.length; i++) {
            dots[i].className = dots[i].className.replace(" active", "");
        }
        slides[slideIndex-1].style.display = "block";  
        dots[slideIndex-1].className += " active";
        }
    </script>
    
</body>

</html>