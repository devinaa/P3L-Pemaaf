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
</style>

<head>

</head>
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
                <button type="button" class="btn btn-outline-info" style="margin-left:500px" onclick="printJS('laporanPT', 'html')">
                    Print Form
                </button>
            </ul>
        </div>
        </div>
        <div class="laporan" id="laporanPT">
            <div class="col-lg-10">
                <p style="margin-left:300px;margin-right:0px"><img width=170 height=175  src="https://www.ukmriau.com/wp-content/uploads/2018/03/icon-kategori-ukm.png" align=left hspace=12><b></span></b></p>
                <div class="" style="margin-left: 0px">
                    <p align="center"><strong>PEMAAF</strong></p>
                    <p align="center" style=""><strong>MOTORCYCLE SPAREPARTS AND SERVICES</strong></p>
                    <p align="center" style=""><strong>Jl. Babarsari No. 12 Yogyakarta 552181</strong></p>
                    <p align="center" style=""><strong>Telp. (0274) 778899</strong></p>
                    <p align="center" style=""><strong>http://pemaaf.com</strong></p>
                </div>
            </div> 
        <hr width="85%" size="20px" color="black">
        <div align="center" hspace=12>
            <p style="margin-top:5px;"><strong>LAPORAN PENDAPATAN TAHUNAN</strong></p>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive" align="center">
                            <table class="table table-striped table-hover" border="3" id="laporanPT" style="width:70%">
                                <thead>
                                    <tr>
                                        <th>Tahun</th>
                                        <th>Cabang</th>
                                        <th>Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($laporan as $transaksi_juals)
                                    <tr>
                                        <td>{{ $transaksi_juals->tahun }}</td>
                                        <td>{{ $transaksi_juals->cabang }}</td>
                                        <td>{{ $transaksi_juals->total }}</td>
                                    </tr>
                                    @endforeach
                                    <tr>
                                        <td colspan="2" align="right">Total</td>
                                        <td  align="right">{{ $transaksi_juals->totalSemua }}</td>
                                    </tr>
                                </tbody>
                                    
                            </table>
                                <p align="right">dicetak tanggal {{ $tanggal }}</p>
                        </div>
                    </div>
                </div>
            </div>
            <div style="width:600px; height:400px; align:center">
                <!-- <canvas id="canvas" height="280" width="600"></canvas> -->
                    <div class="col-lg-12">
                      <canvas id="barChart" width="800px" height="450px"></canvas> 
                    </div>
            </div>
        </div>
    </body>
</html>
<script src="https://printjs-4de6.kxcdn.com/print.min.js"></script>
        <script src="vendor/print/print.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
        <script type="text/javascript" src="http://code.jquery.com/jquery-1.7.1.min.js"></script>
        <script>
            var url = "{{url('/chartTahunan')}}";
            var tahun = new Array();
            var cabang = new Array();
            var total = new Array();

        $(document).ready(function(){
          $.get(url, function(response){
            response.forEach(function(data){
                cabang.push(data.cabang);
                tahun.push(data.tahun);
                total.push(data.total);
            });

            Chart.defaults.global.legend.position="bottom";
            var barCtx = document.getElementById("barChart");
            var myBarChart = new Chart(barCtx, {
                type: 'bar',
                data: {
                    labels: ["demangan", "Sewon", "Palembang", "Kalasan", "bantul", "Babarsari"],
                    datasets: [{
                        label: '2019',
                        data: [12, 19, 3, 5, 2, 3],
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.2)',
                            'rgba(54, 162, 235, 0.2)',
                            'rgba(255, 206, 86, 0.2)',
                            'rgba(75, 192, 192, 0.2)',
                            'rgba(153, 102, 255, 0.2)',
                            'rgba(255, 159, 64, 0.2)'
                        ],
                        borderColor: [
                            'rgba(255,99,132,1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(75, 192, 192, 1)',
                            'rgba(153, 102, 255, 1)',
                            'rgba(255, 159, 64, 1)'
                        ],
                        borderWidth: 2
                    }, {
                        label: '2020',          
                        data: [25, 13, 17, 12, 24, 5],
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.2)',
                            'rgba(54, 162, 235, 0.2)',
                            'rgba(255, 206, 86, 0.2)',
                            'rgba(75, 192, 192, 0.2)',
                            'rgba(153, 102, 255, 0.2)',
                            'rgba(255, 159, 64, 0.2)'
                        ],
                        borderColor: [
                            'rgba(255,99,132,1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(75, 192, 192, 1)',
                            'rgba(153, 102, 255, 1)',
                            'rgba(255, 159, 64, 1)'
                        ],
                        borderWidth: 2
                    },
                    {
                        label: '2021',          
                        data: [25, 13, 17, 12, 24, 5],
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.2)',
                            'rgba(54, 162, 235, 0.2)',
                            'rgba(255, 206, 86, 0.2)',
                            'rgba(75, 192, 192, 0.2)',
                            'rgba(153, 102, 255, 0.2)',
                            'rgba(255, 159, 64, 0.2)'
                        ],
                        borderColor: [
                            'rgba(255,99,132,1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(75, 192, 192, 1)',
                            'rgba(153, 102, 255, 1)',
                            'rgba(255, 159, 64, 1)'
                        ],
                        borderWidth: 2
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
            var ctx = document.getElementById("canvas").getContext('2d');
                var myChart = new Chart(ctx, {
                  type: 'bar',
                  data: {
                      labels:tahun,
                      datasets: [{
                            label: 'total',
                            backgroundColor: "grey",
                            data: total,
                            borderWidth: 1
                        }]
                  },
                  options: {
                      scales: {
                          
                          xAxes:[
                            {
                                id:'xAxis1',
                                type:"category",
                                ticks:{
                                    callback:function(label){
                                        return cabang;
                                    }
                                }
                            },
                            {
                                id:'xAxis2',
                                type:"category",
                                gridLines: {
                                    drawOnChartArea: false, // only want the grid lines for one axis to show up
                                },
                                ticks:{
                                    callback:function(label){
                                        return tahun;
                                    }
                                }
                            }],
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