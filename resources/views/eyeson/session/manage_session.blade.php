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
                <h3 style="float: right" class="box-title font"><b> أدارة الفواتير </b> </h3>
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
                            <th  style="text-align: center !important;"  ><font size="4">أسم القسم </font></th>
                            <th  style="text-align: center !important;"  ><font size="4">المبلغ الكلي </font></th>
                            <th  style="text-align: center !important;"  ><font size="4">المبلغ المدفوع </font></th>
                            <th  style="text-align: center !important;"  ><font size="4">المبلغ المتبقي </font></th>
                            <th  style="text-align: center !important;"  ><font size="4">أدارة</font></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($invoices as $invoice)
                        <tr >
                            <td align="right" ><font size="4">{{$invoice->id}}</font> </td>

                            <td align="right" ><font size="4">{{$invoice->session[0]->client->name}}</font> </td>

                            <td align="right" ><font size="4">{{$invoice->session[0]->department->title}}</font> </td>

                            <td align="right" ><font size="4">{{$invoice->total}}</font> </td>

                            <td align="right" ><font size="4">{{$invoice->paid}}</font> </td>

                            <td align="right" ><font size="4">{{$invoice->reminding}}</font> </td>

                            <td align="center" >



                                <div class="btn-group">
                                    <button style="margin-right: 5px" type="button" data-file-id="{{$invoice->id}}"  class="btn btn-danger btn-delete" >مسح </button>

                                   <a href="{{url('sessionEdit/'. $invoice->id)}}"> <button style="margin-right: 5px" type="button"class="btn btn-warning btn-edit" >تعديل </button>
                                   <a href="{{url('invoiceDetails/'. $invoice->id )}}"> <button style="margin-right: 5px" type="button"class="btn btn-primary btn-details" >تفاصيل الفاتورة </button></a>



                                </div>

                            </td>


                        </tr>
                       @endforeach


                    </table>
                </div>

    </div>
        </div>
        </div>
    </div>
            <div class="modal fade" id="myModalDelete" role="dialog">
                <div class="modal-dialog modal-sm">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 style="text-align: right" class="modal-title font">حذف الفواتير</h4>
                        </div>
                        <div class="modal-body">
                            <p style="text-align: right">هل انت متأكد من حذف هذه القاتورة؟</p>
                            <div style="margin-left: 70px">
                                <button type="button" class="btn btn-info btn-yes" data-dismiss="modal">نعم</button>
                                <button type="button" class="btn btn-danger" data-dismiss="modal">كلا</button>
                            </div>
                        </div>
                        <div class="modal-footer">

                        </div>
                    </div>
                </div>
            </div>






@endsection
@section('js')
    <script>
        $(document).ready(function(){



                $("#myTable").on('click','.btn-details',function (e){
                $('#myModalDetails').modal('toggle');



                var  title= $(this).attr('title');
                var  price= $(this).attr('price');
                var  department= $(this).attr('department');
                var  serviceId = $(this).attr('serviceId');

                $("#title").val(title);

                $("#price").val(price);

                $("#department").val(department);

                $("#serviceId").val(serviceId);



                $('.select2').select2(
                    {
                        allowClear: true,
                    }
                )


            });


            var url = "/invoiceDelete/";

                $("#myTable").on('click','.btn-delete',function (e){
                $('#myModalDelete').modal('show');
                url= url+ $(this).data('file-id')
            });


            $(".btn-yes").click(function (e) {

                window.location = url;
            });
        });

        $(function () {
            $('.select2').select2(
                {
                    allowClear: true,

                }
            )
        });



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
                'paging'      : true,
                'lengthChange': true,
                'searching'   : true,
                'ordering'    : true,
                'info'        : true,
                'autoWidth'   : true
            }
        );


    </script>



@endsection
