<!DOCTYPE html>
<html>

<style>
    @font-face {
        font-family: "Cambria Math";
        panose-1: 2 4 5 3 5 4 6 3 2 4;
    }

    @font-face {
        font-family: Calibri;
        panose-1: 2 15 5 2 2 2 4 3 2 4;
    }

    @font-face {
        font-family: "Segoe UI";
        panose-1: 2 11 5 2 4 2 4 2 2 3;
    }

    p.MsoNormal,
    li.MsoNormal,
    div.MsoNormal {
        margin-top: 0cm;
        margin-right: 0cm;
        margin-bottom: 8.0pt;
        margin-left: 12cm;
        line-height: 107%;
        font-size: 15 pt;
        font-family: "Calibri", sans-serif;
        ;
    }

    p.MsoAcetate,
    li.MsoAcetate,
    div.MsoAcetate {
        mso-style-link: "Balloon Text Char";
        margin: 0cm;
        margin-bottom: .0001pt;
        font-size: 9.0pt;
        font-family: "Segoe UI", sans-serif;
    }

    span.BalloonTextChar {
        mso-style-name: "Balloon Text Char";
        mso-style-link: "Balloon Text";
        font-family: "Segoe UI", sans-serif;
    }

    .MsoChpDefault {
        font-family: "Calibri", sans-serif;
    }

    .MsoPapDefault {
        margin-bottom: 8.0pt;
        line-height: 107%;
    }

    @page WordSection1 {
        size: 595.3pt 841.9pt;
        margin: 72.0pt 72.0pt 72.0pt 72.0pt;
    }

    div.WordSection1 {
        page: WordSection1;
    }

    @media print{
    	#btnPrint{
            visibility: hidden;
            margin-left: 0px;
            margin-right:260px;
        }
        laporanPB{
            align: center;
        }
    }
    header nav, footer {
        display: none;
    }
</style>

<header>
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

    <link rel="stylesheet" href="  https://printjs-4de6.kxcdn.com/print.min.css" id="theme-stylesheet">
    

    
    <!-- Custom stylesheet - for your changes-->
    <!-- <link rel="stylesheet" href="css/custom.css"> -->
    <!-- Favicon-->
    <link rel="shortcut icon" href="img/favicon.ico">
</header>
    <body>
        <div class="breadcrumb-holder">
            <div class="container-fluid">
                <ul class="breadcrumb">
                    <button class="btn" type="submit" style="margin-top:2px;"> <i class="fa fa-caret-square-o-left"></i>Kembali</button>
                    <button id="btnPrint" class="btn btn-outline-info" style="margin-left:500px" onclick="window.print()">Print this page</button>
                </ul>
            </div>
        </div>
        <div class="print" id="laporanPB">
            <div class="col-lg-10">
                <p style="margin-left:300px;margin-right:0px"><img width=170 height=175  src="https://www.ukmriau.com/wp-content/uploads/2018/03/icon-kategori-ukm.png" align=left hspace=12><b></span></b></p>
                <div class="" style="margin-left: 0px;margin-right:260px">
                    <p align="center"><strong>PEMAAF</strong></p>
                    <p align="center" style=""><strong>MOTORCYCLE SPAREPARTS AND SERVICES</strong></p>
                    <p align="center" style=""><strong>Jl. Babarsari No. 12 Yogyakarta 552181</strong></p>
                    <p align="center" style=""><strong>Telp. (0274) 778899</strong></p>
                    <p align="center" style=""><strong>http://pemaaf.com</strong></p>
                </div>
            </div> 
            <hr width="85%" size="20px" color="black" style="margin-up:10px">
            <div align="center" hspace=12>
                <p style="margin-top:5px;"><strong>LAPORAN PENDAPATAN BULANAN</strong></p>
            </div>
            <div align="left" hspace=12>
                <p style="margin-top:5px;margin-left:120px"><strong>Tahun: {{Form::label('tj_id', date('Y') )}} </strong></p>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div align="center" class="table-responsive">
                                <table class="table table-striped table-hover" border="3"id="laporanPB" style="width:70%">
                                    <thead>
                                        <tr>
                                            <th>Bulan</th>
                                            <th>Service</th>
                                            <th>Sparepart</th>
                                            <th>Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($laporan as $transaksi_juals)
                                        <tr>
                                            <td>{{ $transaksi_juals->bulan }}</td>
                                            <td>{{ $transaksi_juals->spareparts }}</td>
                                            <td>{{ $transaksi_juals->service }}</td>
                                            <td>{{ $transaksi_juals->total }}</td>
                                        </tr>
                                        <tr>
                                            <td colspan="3" align="right">Total</td>
                                            <td  align="right">{{ $transaksi_juals->totalSemua }}</td>
                                        </tr>
                                    </tbody>
                                        @endforeach
                                </table>
                                <p align="right">dicetak tanggal {{ $tanggal }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
             <div class="panel-body">
                <canvas id="canvas" height="280" width="600"></canvas>
            </div>
        </div>
        <!-- graphs -->
       
    </body>

</html>
        <script src="https://printjs-4de6.kxcdn.com/print.min.js"></script>
        <script src="vendor/print/print.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
        <script type="text/javascript" src="http://code.jquery.com/jquery-1.7.1.min.js"></script>
        <script>
            var url = "{{url('/chartBulanan')}}";
            var tahun = ['Januari','Februari','Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
            var spareparts = new Array();
            var services = new Array();
            var total = new Array();

        $(document).ready(function(){
          $.get(url, function(response){
            response.forEach(function(data){
                spareparts.push(data.spareparts);
                services.push(data.service);
                total.push(data.total);
            });
            var ctx = document.getElementById("canvas").getContext('2d');
                var myChart = new Chart(ctx, {
                  type: 'bar',
                  data: {
                      labels:tahun,
                      datasets: [{
                            label: 'Service',
                            backgroundColor: "#2FAACE",
                            data: services,
                            borderWidth: 1
                        }, 
                        {
                            label: "Spareparts",
                            backgroundColor: "#FFBD82",
                            data: spareparts
                        }, 
                        {
                            label: "Total",
                            backgroundColor: "#74BAAC",
                            data: total
                        }]
                  },
                  options: {
                      scales: {
                          yAxes: [{
                              ticks: {
                                  beginAtZero:true
                              }
                          }]
                      }
                  }
              });
          });
        });
        </script>