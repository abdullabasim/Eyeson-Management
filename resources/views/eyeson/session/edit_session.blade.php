
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>تعديل فاتورة زبون</title>
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
    </style>

</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

@include('layouts.navbar')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">


        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <!-- left column -->
                <div class="col-md-8 col-md-offset-2">
                    <!-- general form elements -->
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 style="float: right" class=" font box-title">تعديل فاتورة</h3>
                        </div>
                        <!-- /.box-header -->
                        <!-- form start -->
                        @include('alertMessages.alertMessages')
                            <div class="box-body">
                                <form method="post" action="{{url('sessionEdit')}}">
                                    @csrf
                                    <!-- /.box-header -->
                                    <div class="box-body">




                                            <div class="row">

                                                <!-- /.col -->
                                                <div  style="padding: 15px;margin-bottom: 25px !important" class="form-group">
                                                    <label style="float: right;" for="exampleInputEmail1">أسم الزبون</label>

                                                    <select id="client" required  name="client" class="form-control select2 input-lg" data-placeholder="أدخل أسم الزبون" style="float: right;text-align:right !important ; direction: rtl ;margin-left: 90px !important;">

                                                        @foreach($clients as $client)
                                                            @if($invoice->session[0]->client_id == $client->id)
                                                            <option selected value="{{$client->id}}">{{$client->name}}</option>
                                                            @else
                                                                <option  value="{{$client->id}}">{{$client->name}}</option>
                                                            @endif
                                                        @endforeach
                                                    </select>
                                                    @if($errors->first('client'))
                                                        <span style="float: left ;color: red"  class="help-block"><i class="fa fa-times-circle-o"></i> {{ $errors->first('client') }}</span>
                                                    @endif
                                                </div>
                                                <!-- /.col -->
                                            </div>


                                            <div class="row">

                                                <!-- /.col -->
                                                <div  style="padding-left: 10px;padding-right: 10px;margin-top: -30px;margin-bottom: 40px" class="form-group">
                                                    <label style="float: right;margin-top: 5px;" for="exampleInputEmail1">القسم</label>

                                                    <select id="department" required   class="form-control select2 input-lg" data-placeholder="حدد القسم" style="float: right;text-align:right !important ; direction: rtl ;margin-left: 90px !important;">
                                                        <option selected="selected"></option>
                                                        @foreach($departments as $department)
                                                            @if($invoice->session[0]->department_id == $department->id)
                                                            <option selected value="{{$department->id}}">{{$department->title}}</option>
                                                            @else
                                                                <option  value="{{$department->id}}">{{$department->title}}</option>
                                                            @endif
                                                        @endforeach
                                                    </select>
                                                    @if($errors->first('department'))
                                                        <span style="float: left ;color: red"  class="help-block"><i class="fa fa-times-circle-o"></i> {{ $errors->first('department') }}</span>
                                                    @endif
                                                </div>
                                                <!-- /.col -->
                                            </div>

                                            <input type="hidden" id="dep" name="department" value="{{$invoice->session[0]->department_id }}" >
                                        <input type="hidden"  name="invoice" value="{{$invoice->id }}" >

                                        <br>

                                        <div class="row">

                                            <button id="add-btn" type="button" style="float: right ;margin-right: 10px;"  class="btn btn-primary " >أضافة خدمة</button>

                                        </div>

                                        <div id="list">

                                            @foreach($invoice->session as $sessions)

                                                                                      <div  style="padding:15px;border-style: solid;border-width: 1px;border-radius: 25px;;margin-top: 15px !important">

                                                                                       <div class="row">


                                                                                               <div  style="padding-left: 10px;padding-right: 10px;margin-bottom: 40px" class="form-group parent">
                                                                                                      <label style="float: right;margin-top: 5px;" for="exampleInputEmail1">الخدمات</label>

                                                                                                       <select id="service" required  name="service[]" class="form-control select2 input-lg service" data-placeholder="حدد الخدمة" style="float: right;text-align:right !important ; direction: rtl ;margin-left: 90px !important;">
                                                                                                              <option selected="selected"></option>
                                                                 @if($invoice->session[0]->department_id == 1)
                                                                @foreach($serviceSalons as $serviceSalon)
                                                                     @if($sessions->service_id ==  $serviceSalon->id)
                                                                       <option selected value="{{$serviceSalon->id}}">{{$serviceSalon->title}}</option>

                                                                    @else
                                                                  <option  value="{{$serviceSalon->id}}">{{$serviceSalon->title}}</option>
                                                                                                               @endif
                                                                @endforeach




                                                                                                           @elseif($invoice->session[0]->department_id == 2)
                                                                                                               @foreach($serviceClinics as $serviceSalon)
                                                                                                                   @if($sessions->service_id ==  $serviceSalon->id)
                                                                                                                       <option selected value="{{$serviceSalon->id}}">{{$serviceSalon->title}}</option>

                                                                                                                   @else
                                                                                                                       <option  value="{{$serviceSalon->id}}">{{$serviceSalon->title}}</option>
                                                                                                                   @endif
                                                                                                               @endforeach





                                                                                                           @elseif($invoice->session[0]->department_id == 3)
                                                                                                               @foreach($serviceDoctors as $serviceSalon)
                                                                                                                   @if($sessions->service_id ==  $serviceSalon->id)
                                                                                                                       <option selected value="{{$serviceSalon->id}}">{{$serviceSalon->title}}</option>

                                                                                                                   @else
                                                                                                                       <option  value="{{$serviceSalon->id}}">{{$serviceSalon->title}}</option>
                                                                                                                   @endif
                                                                                                               @endforeach



                                                                                                           @endif

                                                                                                       </select>
                                                            @if($errors->first('service'))
                                                                                                               <span style="float: left ;color: red"  class="help-block"><i class="fa fa-times-circle-o"></i> {{ $errors->first('service') }}</span>
                                                            @endif
                                                                                                   </div>

                                                                                           </div>

                                                                               <div class="row prices">


                                                                                                  <div   style="padding-left: 10px;padding-right: 10px;margin-top: -30px;margin-bottom: 40px" class="form-group">
                                                                                                    <label style="float: right;margin-top: 5px;" for="exampleInputEmail1">السعر</label>


                                                                                                          <input type="text"   name="price[]"  value="{{$sessions->price}}" class="form-control input-lg prices"  style="float: right;text-align:right !important ; direction: rtl ;margin-left: 90px !important;" placeholder="أدخل سعر الخدمة">
                                                                                                      <input type="hidden"   name="session[]"  value="{{$sessions->id}}"   >

                                                                                                  @if($errors->first('department'))
                                                                                                                  <span style="float: left ;color: red"  class="help-block"><i class="fa fa-times-circle-o"></i> {{ $errors->first('department') }}</span>
                                                            @endif
                                                                                                       </div>
                                                                                                <!-- /.col -->
                                                                                            </div>

                                                                                         </div>


                                            @endforeach







                                        </div>
                                        <br>
                                        <br> <br>

                                        <div class="row prices">


                                                                                  <div  style="padding-left: 10px;padding-right: 10px;margin-bottom: 40px" class="form-group">
                                                                                         <label style="float: right;margin-top: 5px;" for="exampleInputEmail1">  المبلغ الاجمالي </label>


                                                                                             <input type="text"   readonly  id="totalPrice" value="{{$invoice->total}}"  name="totalPrice"  class="form-control input-lg "  style="float: right;text-align:right !important ; direction: rtl ;margin-left: 90px !important;" placeholder="المبلغ الاجمالي">

                                                                                        </div>

                                                                                </div>

                                        <div class="row prices">


                                            <div  style="padding-left: 10px;padding-right: 10px;margin-bottom: 40px" class="form-group">
                                                <label style="float: right;margin-top: 5px;" for="exampleInputEmail1"> المبلغ المدفوع</label>


                                                <input type="text" id="paid" required  value="{{$invoice->paid}}"    name="paid"  class="form-control input-lg "  style="float: right;text-align:right !important ; direction: rtl ;margin-left: 90px !important;" placeholder=" ادخل المبلغ المدفوع">

                                            </div>

                                        </div>
                                        <div class="row prices">


                                            <div  style="padding-left: 10px;padding-right: 10px;margin-bottom: 40px" class="form-group">
                                                <label style="float: right;margin-top: 5px;" for="exampleInputEmail1">  المبلغ المتبقي</label>


                                                <input type="text" required   readonly  id=remindings" value="{{$invoice->reminding}}" name="reminding"  class="form-control input-lg reminding "  style="float: right;text-align:right !important ; direction: rtl ;margin-left: 90px !important;" placeholder="0" >

                                            </div>

                                        </div>


                                        <div class="row">

                                            <!-- /.col -->
                                            <div class="col-md-2  col-md-offset-5">
                                                <div class="form-group">
                                                    <button style="float: right ;margin-top: 30px" type="submit" class="btn btn-primary btn-lg">تحديث</button>
                                                </div>
                                                <!-- /.form-group -->

                                                <!-- /.form-group -->
                                            </div>
                                            <!-- /.col -->
                                        </div>
                                    </div>


                                </form>  <!-- /.box-body -->
                            </div>
                            <!-- /.box-body -->



                    </div>
                    <!-- /.box -->


                    <!-- /.box -->

                </div>
                <!--/.col (left) -->
                <!-- right column -->

                <!--/.col (right) -->
            </div>
            <!-- /.row -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <footer class="main-footer">
        <div dir="rtl" class="pull-right hidden-xs">

            <strong>جميع الحقوق محفوظة لشركة <a href="http://lamassu-iq.com/">  لاماسو العراق    </a> &copy; {{date('Y')}}</strong>
        </div>
        <b>الاصدار</b> 1.3

    </footer>

    <aside class="control-sidebar control-sidebar-dark">
        <!-- Create the tabs -->
        <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
        </ul>
        <!-- Tab panes -->
        <div class="tab-content">
            <!-- Home tab content -->
            <div class="tab-pane" id="control-sidebar-home-tab">

                <!-- /.control-sidebar-menu -->


                <!-- /.control-sidebar-menu -->

            </div>
            <!-- /.tab-pane -->
            <!-- Stats tab content -->

            <!-- /.tab-pane -->
            <!-- Settings tab content -->

            <!-- /.tab-pane -->
        </div>
    </aside>
    <!-- /.control-sidebar -->
    <!-- Add the sidebar's background. This div must be placed
         immediately after the control sidebar -->
    <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
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
    var counter =1;

    $("#department").change(function (e) {



        var department = $('#department :selected').val();




        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        e.preventDefault();
        var formData = {
            department:department ,

        }



        $.ajax({

            type: "get",
            url: "/serviceGet",
            data: formData,
            dataType    : 'json',
            success: function (data) {

                document.getElementById('service').options.length = 0;
                var select = document.getElementById("service");


                var el = document.createElement("option");
                el.textContent = "";
                el.value = "";
                select.appendChild(el);

                for(var i = 0; i < data.length; i++) {
                    var opt = data[i];
                    var el = document.createElement("option");
                    el.textContent = opt;
                    el.value = opt;
                    select.appendChild(el);
                }


            },
            error: function (data) {


                console.log(data);

            }
        });
    });


        $("#list").on('change','.service',function (e){


        var service = $(this).val();


        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        e.preventDefault();
        var formData = {
            service:service ,

        }



        $.ajax({

            type: "get",
            url: "/priceGet",
            data: formData,
            dataType    : 'json',
            success: function (data) {

             //   alert(data);

//                if($(this).parents().parents().parents().find('.pricesSet'))
//                    $(this).parents().parents().parents().find('.pricesSet').val("aaa");
//             $(this).parents().css( "background-color", "red" )

            },
            error: function (data) {


                console.log(data);

            }
        });
    });

    var items = $("#list");

    $("#add-btn").click(function (e) {

        if($('#department :selected').val() == "")
            alert("يرجى تحدد القسم قبل أضافة خدمات");
        else
        {

            $("#department").prop('disabled', true);


            $('#dep').val($('#department :selected').val());
        }





        if( $('#department :selected').val() == 1)

        {

            items.append(
               '                                        <div  style="padding:15px;border-style: solid;border-width: 1px;border-radius: 25px;;margin-top: 15px !important">\n' +
                '\n' +
                '                                        <div class="row">\n' +
                '\n' +
                '\n' +
                '                                            <div  style="padding-left: 10px;padding-right: 10px;margin-bottom: 40px" class="form-group parent">\n' +
                '                                                <label style="float: right;margin-top: 5px;" for="exampleInputEmail1">الخدمات</label>\n' +
                '\n' +
                '                                                <select id="service" required  name="service[]" class="form-control select2 input-lg service" data-placeholder="حدد الخدمة" style="float: right;text-align:right !important ; direction: rtl ;margin-left: 90px !important;">\n' +
                '                                                    <option selected="selected"></option>\n' +
                                                                   @foreach($serviceSalons as $serviceSalon)
                '                                                        <option value="{{$serviceSalon->id}}">{{$serviceSalon->title}}</option>\n' +
                                                                    @endforeach
                '                                                </select>\n' +
                                                               @if($errors->first('service'))
                '                                                    <span style="float: left ;color: red"  class="help-block"><i class="fa fa-times-circle-o"></i> {{ $errors->first('service') }}</span>\n' +
                                                               @endif
                '                                            </div>\n' +
                '\n' +
                '                                        </div>\n' +
                '\n' +
                '                                        <div class="row prices">\n' +
                '\n' +
                '                                            <!-- /.col -->\n' +
                '                                            <div   style="padding-left: 10px;padding-right: 10px;margin-top: -30px;margin-bottom: 40px" class="form-group">\n' +
                '                                                <label style="float: right;margin-top: 5px;" for="exampleInputEmail1">السعر</label>\n' +
                '\n' +
                '\n' +
                '                                                <input type="text"   name="price[]"  class="form-control input-lg prices"  style="float: right;text-align:right !important ; direction: rtl ;margin-left: 90px !important;" placeholder="أدخل سعر الخدمة">\n' +
                                                              @if($errors->first('department'))
                '                                                    <span style="float: left ;color: red"  class="help-block"><i class="fa fa-times-circle-o"></i> {{ $errors->first('department') }}</span>\n' +
                                                                @endif
                '                                            </div>\n' +
                '                                            <!-- /.col -->\n' +
                '                                        </div>\n' +
                '\n' +
                '                                        </div>\n'
            );
            counter = counter +1;

            $('.select2').select2();
        }
        else if($('#department :selected').val() == 2)
    {
        items.append(
            '                                        <div style="padding:15px;border-style: solid;border-width: 1px;border-radius: 25px;;margin-top: 15px !important">\n' +
            '\n' +
            '                                        <div class="row">\n' +
            '\n' +
            '\n' +
            '                                            <div  style="padding-left: 10px;padding-right: 10px;margin-bottom: 40px" class="form-group parent">\n' +
            '                                                <label style="float: right;margin-top: 5px;" for="exampleInputEmail1">الخدمات</label>\n' +
            '\n' +
            '                                                <select id="service" required  name="service[]" class="form-control select2 input-lg service" data-placeholder="حدد الخدمة" style="float: right;text-align:right !important ; direction: rtl ;margin-left: 90px !important;">\n' +
            '                                                    <option selected="selected"></option>\n' +
                @foreach($serviceClinics as $serviceSalon)
                    '                                                        <option value="{{$serviceSalon->id}}">{{$serviceSalon->title}}</option>\n' +
                @endforeach
                    '                                                </select>\n' +
                @if($errors->first('service'))
                    '                                                    <span style="float: left ;color: red"  class="help-block"><i class="fa fa-times-circle-o"></i> {{ $errors->first('service') }}</span>\n' +
                @endif
                    '                                            </div>\n' +
            '\n' +
            '                                        </div>\n' +
            '\n' +
            '                                        <div class="row prices">\n' +
            '\n' +
            '                                            <!-- /.col -->\n' +
            '                                            <div  style="padding-left: 10px;padding-right: 10px;margin-bottom: 40px" class="form-group">\n' +
            '                                                <label style="float: right;margin-top: 5px;" for="exampleInputEmail1">السعر</label>\n' +
            '\n' +
            '\n' +
            '                                                <input type="text"   name="price['+ counter +']"  class="form-control input-lg prices"  style="float: right;text-align:right !important ; direction: rtl ;margin-left: 90px !important;" placeholder="أدخل سعر الخدمة">\n' +
                @if($errors->first('department'))
                    '                                                    <span style="float: left ;color: red"  class="help-block"><i class="fa fa-times-circle-o"></i> {{ $errors->first('department') }}</span>\n' +
                @endif
                    '                                            </div>\n' +
            '                                            <!-- /.col -->\n' +
            '                                        </div>\n' +
            '\n' +
            '                                        </div>\n'
        );
    }

        else if($('#department :selected').val() == 3)
        {
            items.append(
                '                                        <div class="parent" style="padding:15px;border-style: solid;border-width: 1px;border-radius: 25px;;margin-top: 15px !important">\n' +
                '\n' +
                '                                        <div class="row">\n' +
                '\n' +
                '\n' +
                '                                            <div  style="padding-left: 10px;padding-right: 10px;margin-bottom: 40px" class="form-group parent">\n' +
                '                                                <label style="float: right;margin-top: 5px;" for="exampleInputEmail1">الخدمات</label>\n' +
                '\n' +
                '                                                <select id="service" required  name="service['+ counter +']" class="form-control select2 input-lg service" data-placeholder="حدد الخدمة" style="float: right;text-align:right !important ; direction: rtl ;margin-left: 90px !important;">\n' +
                '                                                    <option selected="selected"></option>\n' +
                    @foreach($serviceDoctors as $serviceSalon)
                        '                                                        <option value="{{$serviceSalon->id}}">{{$serviceSalon->title}}</option>\n' +
                    @endforeach
                        '                                                </select>\n' +
                    @if($errors->first('service'))
                        '                                                    <span style="float: left ;color: red"  class="help-block"><i class="fa fa-times-circle-o"></i> {{ $errors->first('service') }}</span>\n' +
                    @endif
                        '                                            </div>\n' +
                '\n' +
                '                                        </div>\n' +
                '\n' +
                '                                        <div class="row prices">\n' +
                '\n' +
                '                                            <!-- /.col -->\n' +
                '                                            <div  style="padding-left: 10px;padding-right: 10px;margin-bottom: 40px" class="form-group">\n' +
                '                                                <label style="float: right;margin-top: 5px;" for="exampleInputEmail1">السعر</label>\n' +
                '\n' +
                '\n' +
                '                                                <input type="text"   name="price['+ counter +']"  class="form-control input-lg prices"  style="float: right;text-align:right !important ; direction: rtl ;margin-left: 90px !important;" placeholder="أدخل سعر الخدمة">\n' +
                    @if($errors->first('department'))
                        '                                                    <span style="float: left ;color: red"  class="help-block"><i class="fa fa-times-circle-o"></i> {{ $errors->first('department') }}</span>\n' +
                    @endif
                        '                                            </div>\n' +
                '                                            <!-- /.col -->\n' +
                '                                        </div>\n' +
                '\n' +
                '                                        </div>\n'
            );
        }

    });


    $(items).on("change",".prices ", function(e){ //user click on remove text

        e.preventDefault();

        var sum = 0;
        var values = $('.prices').map(function() { return( this.value); }).get();


        var count = 0;
        for(var i =0 ;i< values.length;i++)
        {

            // alert();
           var value = parseFloat(values[i] ) ;

            if (!isNaN(Number(parseFloat(values[i]))))
                sum += value ;

        }

        $("#totalPrice").val(sum);

        var reminding =(parseFloat( $("#totalPrice").val()) - parseFloat( $('#paid').val()));

        if(reminding < 0)
        {
            alert("يوجد خطأ في المبلغ المدخل");
            $("#paid").val("");
            $('.reminding').val( "" );
        }
        else
        {
            $('.reminding').val( reminding );
        }

    });

    $("#paid,.prices").change(function (e){ //user click on remove text


       var reminding =(parseFloat( $("#totalPrice").val()) - parseFloat( $('#paid').val()));

       if(reminding < 0)
       {
           alert("يوجد خطأ في المبلغ المدخل");
           $("#paid").val("");
           $('.reminding').val( "" );
       }
       else
       {
           $('.reminding').val( reminding );
       }





    });



</script>

<script>


    $(function () {
        //Initialize Select2 Elements
        $('.select2').select2()
    });

</script>
</body>
</html>
