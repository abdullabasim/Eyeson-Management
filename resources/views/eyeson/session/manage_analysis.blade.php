@extends('layouts.default')

@section('title')
    أدارة الفواتير
@endsection

@section('css')
    <style>
    ::-webkit-input-placeholder { text-align:right; }
    /* mozilla solution */
    input:-moz-placeholder { text-align:right; }
    </style>
    <link rel="stylesheet" href="{{url('website/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">
@endsection
@section('content')

    <style>
        .select2-selection__choice{
            background: #3c8dbc !important;
        }


        .select2-selection__rendered {
            line-height: 31px !important;
        }
        .select2-container .select2-selection--single {
            height: 35px !important;
        }
        .select2-selection__arrow {
            height: 34px !important;
        }

    </style>



    <div class="content-wrapper">
        <div style="padding: 30px" class="col-md-12 ">
        <!-- Content Header (Page header) -->
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 style="float: right" class="box-title font"><b> المبالغ الواردة الى المركز </b> </h3>
            </div>
        @include('alertMessages.alertMessages')
            <!-- /.box-header -->
            <!-- form start -->


            <div class="box">

                <!-- /.box-header -->
                <div class="box-body">
                     <span class="searchI" style="float: right;color: #1c7430;cursor: pointer;" >أضغط هنا للبحث عن طريق التأريخ</span>
                    <br>
                    <br>
                    <table dir="rtl"  id="myTable" class="table table-bordered table-striped ">
                        <thead>
                        <tr style="direction:rtl;">
                            <th style="text-align: center !important;"  ><font size="4"></font></th>
                            <th  style="text-align: center !important;"  ><font size="4"> المبلغ الكلي </font></th>
                            <th  style="text-align: center !important;"  ><font size="4">المبلغ المدفوع </font></th>
                            <th  style="text-align: center !important;"  ><font size="4">المبلغ المتبقي </font></th>

                        </tr>
                        </thead>
                        <tbody>

                        <tr >
                            <td align="right" ><font size="4">كل الاقسام</font> </td>

                            <td align="right" ><font size="4">{{$allTotal}} د.ع</font> </td>

                            <td align="right" ><font size="4">{{$allPaid}} د.ع</font> </td>

                            <td align="right" ><font size="4">{{$allReminding}} د.ع</font> </td>


                        </tr>


                        <tr >
                            <td align="right" ><font size="4">الصالون</font> </td>

                            <td align="right" ><font size="4">{{$salonTotal}}  د.ع  </font> </td>

                            <td align="right" ><font size="4">{{$salonPaid}} د.ع</font> </td>

                            <td align="right" ><font size="4">{{$salonReminding}} د.ع</font> </td>


                        </tr>

                        <tr >
                            <td align="right" ><font size="4">العيادة</font> </td>

                            <td align="right" ><font size="4">{{$clinicTotal}} د.ع</font> </td>

                            <td align="right" ><font size="4">{{$clinicPaid}} د.ع</font> </td>

                            <td align="right" ><font size="4">{{$clinicReminding}} د.ع</font> </td>


                        </tr>

                        <tr >
                            <td align="right" ><font size="4">الدكتور</font> </td>

                            <td align="right" ><font size="4">{{$doctorTotal}} د.ع</font> </td>

                            <td align="right" ><font size="4">{{$doctorPaid}} د.ع</font> </td>

                            <td align="right" ><font size="4">{{$doctorReminding}} د.ع</font> </td>


                        </tr>



                    </table>
                </div>

    </div>
        </div>
        </div>
    </div>


    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-header ">

                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                    <h4 class="modal-title font" id="myModalLabel">بحث متقدم</h4>
                    <div id ="form-errors"></div>
                </div>
                <div class="modal-body">
                    <form id="frmTasks" name="frmTasks" method="get" action="{{url('analysisSearch')}}" class="form-horizontal" novalidate="">
                        {{ csrf_field() }}
                        <div class="row prices">


                            <div  style="padding-left: 30px;padding-right: 30px;margin-bottom: 40px" class="form-group">
                                <label style="float: right;margin-top: 5px;" for="exampleInputEmail1"> تاريخ البداية</label>


                                <input type="date" id="paid" required     name="startDate"  class="form-control input-lg "  style="float: right;text-align:right !important ; direction: rtl ;margin-left: 90px !important;" placeholder=" ادخل المبلغ المدفوع">

                            </div>

                        </div>

                        <div class="row prices">


                            <div  style="padding-left: 30px;padding-right: 30px;margin-bottom: 40px" class="form-group">
                                <label style="float: right;margin-top: 5px;" for="exampleInputEmail1">  تاريخ النهاية</label>


                                <input type="date"  required     name="endDate"  class="form-control input-lg "  style="float: right;text-align:right !important ; direction: rtl ;margin-left: 90px !important;" placeholder=" ادخل المبلغ المدفوع">

                            </div>

                        </div>



                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary pull-right "  value="add">بحث</button>
                        </div>

                    </form>
                </div>


            </div>
        </div>
    </div>




@endsection

@section('js')
    <script>
        $(document).ready(function(){


            $('.searchI').click(function(){


                $('#myModal').modal('show');
            });

        });
    </script>
@endsection