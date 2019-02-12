
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>أضافة فاتورة زبون</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="{{asset('bower_components/bootstrap/dist/css/bootstrap.min.css')}}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('bower_components/font-awesome/css/font-awesome.min.css')}}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="{{asset('bower_components/Ionicons/css/ionicons.min.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('dist/css/AdminLTE.min.css')}}">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="{{asset('dist/css/skins/_all-skins.min.css')}}">
    <!-- Morris chart -->
    <link rel="stylesheet" href="{{asset('bower_components/morris.js/morris.css')}}">
    <!-- jvectormap -->
    <link rel="stylesheet" href="{{asset('bower_components/jvectormap/jquery-jvectormap.css')}}">
    <!-- Date Picker -->
    <link rel="stylesheet" href="{{asset('bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css')}}">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{asset('bower_components/bootstrap-daterangepicker/daterangepicker.css')}}">
    <!-- bootstrap wysihtml5 - text editor -->
    <link rel="stylesheet" href="{{asset('plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css')}}">

    <link rel="stylesheet" href="{{asset('bower_components/select2/dist/css/select2.min.css')}}">

    <link rel="stylesheet" href="{{asset('bower_components/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css')}}">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
{{--{{asset('plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css')}}--}}
<!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">


    <!-- Theme style -->
    <link rel="stylesheet" href="../../dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="{{url('bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">

    <style>
        @font-face {
            font-family: 'AraJozoor-Regular';
            src: url({{ url('font/AraJozoor-Regular.eot')}});
            src: local('☺'), url('{{ url('font/AraJozoor-Regular.woff')}}') format('woff'), url('{{ url('font/AraJozoor-Regular.ttf')}}') format('truetype'), url('{{ url('font/AraJozoor-Regular.svg')}}') format('svg');
            font-weight: normal;
            font-style: normal;
        }
        .font,body {
            font-family: 'AraJozoor-Regular',Sans-Serif !important;
        }
        select[name=myTable_length] {
            height: 40px !important;
        }
        input[type=search] {
            height: 40px !important;
        }
        #myTable_paginate{
            float: right;
        }
        html,body{
            height:297mm;
            width:210mm;
        }
    </style>

</head>
<body  >
<div class="container body font">
    <div >




        <!-- page content -->
        <div class="right_col" role="main">


            <div class="clearfix"></div>

            <div >
                <div class="col-md-12">
                    <div style=" height:297mm;
      width:210mm;" >

                        <div class="x_content">

                            <section class="content invoice">
                                <!-- title row -->
                                <div >
                                    <div class="row" style="text-align: center !important;">
                                        <img  width="300px" height="300px" src="{!! asset('eyeson.jpg') !!}" />

                                    </div>
                                    <div class="row ">
                                        <div class="col-md-6 col-xs-6">
                                            <h2 style="margin-top: 50px;float: left"><i class="  font"></i> Eyeson Beauty Center.</h2>
                                        </div>
                                        <div   class="col-md-6  col-xs-6 pull-right">
                                            <h2 style="margin-top: 50px; float: right" class="font"><i class="  font"></i> مركز أيسون للتجميل</h2>
                                        </div>
                                    </div>
                                    <!-- /.col -->
                                </div>
                                <!-- info row -->

                               <hr>
                                <div class="row ">
                                <div class="col-md-6 col-xs-6">
                                </div>
                                <div   class="col-md-6  col-xs-6 pull-right">
                                    <h4 style=" float: right;margin-bottom:15px; " class="font"><i class="fa  font"></i> أسم الموظف : {{$invoice->user->name}}</h4>
                                </div>
                                <br>   <br>
                                <hr>

                                    <div class="row ">
                                        <div class="col-md-6 col-xs-6">
                                        </div>
                                        <div   class="col-md-6  col-xs-6 pull-right">
                                            <h4 style=" float: right; " class="font"><i class="fa  font"></i>أسم الزبون :{{Carbon\Carbon::parse($invoice->date_issue)->format('d/m/Y')}}</h4><br><br>
                                            <h4 style=" float: right !important; " class="font"><i class="fa  font"></i>أسم الزبون : {{$invoice->session[0]->client->name}}  </h4>

                                        </div>
                                        <br>   <br> <br>
                                        <hr>
                                <div class="row">
                                    <div class="col-xs-12 table">
                                        <table dir="rtl" class="table table-striped">
                                            <thead>
                                            <tr style="direction:rtl;">
                                                <th  style="text-align: right !important;"  ><font size="5"> نوع الخدمة </font></th>
                                                <th  style="text-align: right !important;"  ><font size="5">السعر </font></th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($invoice->session as $sessions)
                                            <tr>
                                            <td align="right" ><font size="4">{{$sessions->service->title}} </font> </td>
                                            <td align="right" ><font size="4">{{$sessions->price}}</font> </td>
                                            </tr>
                                            @endforeach

                                            </tbody>
                                        </table>
                                    </div>
                                    <!-- /.col -->
                                </div>
                                <!-- /.row -->

                                <div class="row">
                                    <!-- accepted payments column -->
                                    <div class="col-xs-6">
                                        {{--<p class="lead">Payment Methods:</p>--}}

                                        {{--<p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">--}}
                                        {{--Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles, weebly ning heekya handango imeem plugg dopplr jibjab, movity jajah plickers sifteo edmodo ifttt zimbra.--}}
                                        {{--</p>--}}
                                    </div>
                                    <!-- /.col -->
                                    <div class="col-xs-6">
                                        {{--<p class="lead">Amount Due {{date('Y/m/d')}}</p>--}}
                                        <div class="table-responsive">
                                            <table dir="rtl" class="table">
                                                <tbody>
                                                <tr>
                                                    <th style="width:50%">الاجمالي :</th>
                                                    <td>{{$invoice->total}}</td>
                                                </tr>
                                                <tr>
                                                    <th style="width:50%">المتبقي  :</th>
                                                    <td>{{$invoice->reminding}}</td>
                                                </tr>


                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <!-- /.col -->
                                </div>
                                <!-- /.row -->

                                <!-- this row will not appear when printing -->
                                <div class="row no-print">
                                    <div  class="col-xs-12 ">
                                        {{--<button  id="printPageButton" onClick="window.print();" class="btn btn-default " ><i class="fa fa-print"></i> Print</button>--}}

                                    </div>
                                </div>
                            </section>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /page content -->


</div>
</div>
<script src="{{asset('bower_components/jquery/dist/jquery.min.js')}}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{asset('bower_components/jquery-ui/jquery-ui.min.js')}}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="{{asset('bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>

<!-- Sparkline -->
<script src="{{asset('bower_components/jquery-sparkline/dist/jquery.sparkline.min.js')}}"></script>

<script src="{{asset('plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js')}}"></script>
<!-- Slimscroll -->
<script src="{{asset('bower_components/jquery-slimscroll/jquery.slimscroll.min.js')}}"></script>
<!-- FastClick -->
<script src="{{asset('bower_components/fastclick/lib/fastclick.js')}}"></script>

<script src="{{asset('dist/js/adminlte.min.js')}}"></script>

<script src="{{asset('dist/js/pages/dashboard.js')}}"></script>

<script src="{{asset('dist/js/demo.js')}}"></script>
<script src="{{asset('bower_components/select2/dist/js/select2.full.min.js')}}"></script>

<script src="{{url('bower_components/datatables.net/js/jquery.dataTables.min.js')}}"></script>
<script src="{{url('bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>

<script>
    $(window).bind("load", function() {
        window.print();
        window.location = '/sessionAdd';

    });
</script>
</body>
</html>
