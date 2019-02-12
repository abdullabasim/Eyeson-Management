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
                <h3 style="float: right" class="box-title font"><b>  تفاصيل فاتورة </b> </h3>
            </div>
        @include('alertMessages.alertMessages')
            <!-- /.box-header -->
            <!-- form start -->


            <div class="box">

                <!-- /.box-header -->
                <div class="box-body">



                    <table dir="rtl"  id="myTable" class="table table-bordered table-striped ">
                        <thead>
                        <tr style="direction:rtl;">
                            <th style="text-align: center !important;"  ><font size="4">#الرقم</font></th>
                            <th  style="text-align: center !important;"  ><font size="4"> أسم الزبون </font></th>
                            <th  style="text-align: center !important;"  ><font size="4"> أسم القسم </font></th>
                            <th  style="text-align: center !important;"  ><font size="4"> أسم الخدمة </font></th>
                            <th  style="text-align: center !important;"  ><font size="4">السعر </font></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($invoice->session as $session)
                        <tr >
                            <td align="right" ><font size="4">{{$session->id}}</font> </td>

                            <td align="right" ><font size="4">{{$session->client->name}}</font> </td>

                            <td align="right" ><font size="4">{{$session->department->title}}</font> </td>

                            <td align="right" ><font size="4">{{$session->service->title}}</font> </td>

                            <td align="right" ><font size="4">{{$session->price}}</font> </td>






                        </tr>
                       @endforeach


                    </table>
                    <span class="font" style="float: right ; margin-top: 25px">
                        <font size="2">{{$invoice->total}}</font>   <span><font size="3">: المبلغ الكلي </font></span>
                        <br>
                        <font size="2">{{$invoice->paid}}</font>   <span><font size="3">:المبلغ المدفوع </font></span>
                        <br>
                        <font size="2">{{$invoice->reminding}}</font>   <span><font size="3">: المبلغ المتبقي  </font></span>
                    </span>
                </div>

    </div>
        </div>
        </div>
    </div>







@endsection
@section('js')
    <script>






        $('#myTable').DataTable(
            {
                "language": {
                    "sProcessing":   "جارٍ التحميل...",
                    "sLengthMenu":   "أظهر _MENU_ مدخلات",
                    "sZeroRecords":  "لم يعثر على أية سجلات",
                    "sInfo":         "إظهار _START_ إلى _END_ من أصل _TOTAL_ مدخل",
                    "sInfoEmpty":    "يعرض 0 إلى 0 من أصل 0 سجل",
                    "sInfoFiltered": "(منتقاة من مجموع _MAX_ مُدخل)",
                    "sInfoPostFix":  "",
                    "sSearch":       "ابحث:",
                    "sUrl":          "",
                    "oPaginate": {
                        "sFirst":    "الأول",
                        "sPrevious": "السابق",
                        "sNext":     "التالي",
                        "sLast":     "الأخير"
                    }
                },
                'paging'      : false,
                'lengthChange': f(),
                'searching'   : true,
                'ordering'    : true,
                'info'        : true,
                'autoWidth'   : true
            }
        );


    </script>



@endsection
