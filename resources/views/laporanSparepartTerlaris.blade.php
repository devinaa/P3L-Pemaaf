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
                    <button type="button" class="btn btn-outline-info" style="margin-left:500px" onclick="printJS('laporanSp', 'html')">
                        Print Form
                    </button>
                </ul>
            </div>
        </div>
        <div class="laporan" id="laporanSp">
            <div class="col-lg-12">
                <p style="margin-left:300px;margin-right:0px"><img width=170 height=175  src="https://www.ukmriau.com/wp-content/uploads/2018/03/icon-kategori-ukm.png" align=left hspace=12><b></span></b></p>
                <div class="col-md-12" style="margin-left: 0px">
                    <p style="align:center"><strong>PEMAAF</strong></p>
                    <p style="align:center"><strong>MOTORCYCLE SPAREPARTS AND SERVICES</strong></p>
                    <p style="align:center"><strong>Jl. Babarsari No. 12 Yogyakarta 552181</strong></p>
                    <p style="align:center"><strong>Telp. (0274) 778899</strong></p>
                    <p style="align:center"><strong>http://pemaaf.com</strong></p>
                </div>
            </div> 
                <hr width="85%" size="20px" color="black">
                <div>
                    <p style="margin-top:5px;"><strong>LAPORAN SPAREPART TERLARIS</strong></p>
                </div>
                <div>
                    <p style="margin-top:5px;margin-left:120px"><strong>Tahun: {{Form::label('tj_id', date('Y') )}} </strong></p>
                </div>
                
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-hover" id="laporanSp" style="width:70%">
                                        <thead>
                                            <tr>
                                                <th >Bulan</th>
                                                <th >Nama Barang</th>
                                                <th >Tipe Barang</th>
                                                <th >Jumlah Penjualan</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($laporan as $detail_sparepart)
                                            <tr>
                                                <td >{{ $detail_sparepart->bulan }}</td>
                                                <td>{{ $detail_sparepart->nama_barang }}</td>
                                                <td>{{ $detail_sparepart->tipe }}</td>
                                                <td>{{ $detail_sparepart->jumlah_penjualan }}</td>
                                            </tr>
                                        </tbody>
                                            @endforeach
                                    </table>
                                    <p>dicetak tanggal {{ $tanggal }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
         </div>   
        <script src="https://printjs-4de6.kxcdn.com/print.min.js"></script>
        <script src="vendor/print/print.min.js"></script>
    </body>

</html>