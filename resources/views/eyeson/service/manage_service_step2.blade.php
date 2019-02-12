@extends('layouts.default')

@section('title')
    أدارة الخدمات
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
                <h3 style="float: right" class="box-title font"><b> أدارة الخدمات </b> </h3>
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
                            <th  style="text-align: center !important;"  ><font size="4"> القسم </font></th>
                            <th  style="text-align: center !important;"  ><font size="4">أسم الخدمة </font></th>

                            <th  style="text-align: center !important;"  ><font size="4">أدارة</font></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($services as $service)
                        <tr >
                            <td align="right" ><font size="4">{{$service->id}}</font> </td>

                            <td align="right" ><font size="4">{{$service->department->title}}</font> </td>

                            <td align="right" ><font size="4">{{$service->title}}</font> </td>




                            <td align="center" >



                                <div class="btn-group">
                                    <button style="margin-right: 5px" type="button" data-file-id="{{$service->id}}"  class="btn btn-danger btn-delete" >مسح </button>

                                    <button style="margin-right: 5px" type="button"


                                            serviceId="{{$service->id}}"
                                            title="{{$service->title}}"
                                            department="{{$service->department_id}}"
                                            price="{{$service->price}}"
                                            serviceId = "{{$service->id}}"
                                            class="btn btn-primary btn-edit" >تعديل </button>


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
                            <h4 style="text-align: right" class="modal-title font">حذف الخدمة</h4>
                        </div>
                        <div class="modal-body">
                            <p style="text-align: right">هل انت متأكد من حذف هذه الخدمة؟</p>
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

             <div id="myModalUpdate" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button style="float: left !important" type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4  style="float: right;margin-right: 5px" id="modelTitles"  class="modal-title font"> تحديث الخدمات </h4>
                </div>
                <div class="modal-body">

                    <form role="form" id="serviceEdit"  method="post" action="{{url('/serviceEdit')}}">
                        {{csrf_field()}}




                        <div  style="padding: 15px;margin-bottom: 25px !important" class="form-group">
                            <label style="float: right;" for="exampleInputEmail1">عنوان الخدمة</label>

                            <input type="text" required id="title" placeholder="يرجى أدخال عنوان الخدمة" name="title"  value=" {{old('service')}}" class="form-control input-lg"  style="float: right;text-align:right !important ; direction: rtl ;margin-left: 90px !important;">

                            @if($errors->first('service'))
                                <span style="float: left ;color: red"  class="help-block"> {{ $errors->first('service') }}<i class="fa fa-times-circle-o input-lg"></i></span>
                            @endif
                        </div>

                        <div  style="padding: 15px;margin-bottom: 25px !important" class="form-group">

                            <input type="hidden" required id="price" placeholder="يرجى أدخال سعر الخدمة" name="price"  value=" {{old('price')}}" class="form-control input-lg"  style="float: right;text-align:right !important ; direction: rtl ;margin-left: 90px !important;">

                            @if($errors->first('price'))
                                <span style="float: left ;color: red"  class="help-block"> {{ $errors->first('price') }}<i class="fa fa-times-circle-o input-lg"></i></span>
                            @endif
                        </div>

                            <input type="hidden" id="department" name="department" value="">

                        <input type="hidden" id="serviceId" name="serviceId" value="">


                        <br>
                            <div class="box-footer">
                                <button style="float: right ;margin-top: 30px !important;" type="submit" class="btn btn-primary">تحديث المعلومات</button>
                            </div>

                    </form>


                </div>
                <div class="modal-footer">
                    <button style="float: left !important" type="button" class="btn btn-default" data-dismiss="modal">أغلاق</button>
                </div>
            </div>

        </div>
    </div>




@endsection
@section('js')
    <script>
        $(document).ready(function(){




                $("#myTable").on('click','.btn-edit',function (e){
                $('#myModalUpdate').modal('toggle');



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

            var url = "/serviceDelete/";

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
