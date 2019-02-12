@extends('layouts.default')

@section('title')
    أدارة الزبائن
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
                <h3 style="float: right" class="box-title font"><b> أدارة الزبائن </b> </h3>
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
                            <th  style="text-align: center !important;"  ><font size="4"> ألاسم الكامل</font></th>
                            <th  style="text-align: center !important;"  ><font size="4">عنوان الزبون</font></th>
                            <th  style="text-align: center !important;"  ><font size="4">رقم الهاتف</font></th>
                            <th  style="text-align: center !important;"  ><font size="4">البريد ألالكتروني</font></th>
                            <th  style="text-align: center !important;"  ><font size="4">أدارة</font></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($clients as $client)
                        <tr >
                            <td align="right" ><font size="4">{{$client->id}}</font> </td>

                            <td align="right" ><font size="4">{{$client->name}}</font> </td>

                            <td align="right" ><font size="4">{{$client->address}}</font> </td>

                            <td align="right" ><font size="4">{{$client->mobile}}</font> </td>

                            <td align="right" ><font size="4">{{$client->email}}</font> </td>


                            <td align="center" >



                                <div class="btn-group">
                                    <button style="margin-right: 5px" type="button" data-file-id="{{$client->id}}"  class="btn btn-danger btn-delete" >مسح </button>

                                    <button style="margin-right: 5px" type="button" clientId="{{$client->id}}"

                                           name="{{$client->name}}"
                                            address="{{$client->address}}"
                                            email="{{$client->email}}"
                                            mobile="{{$client->mobile}}"
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
                            <h4 style="text-align: right" class="modal-title font">حذف الشعبة</h4>
                        </div>
                        <div class="modal-body">
                            <p style="text-align: right">هل انت متأكد من حذف هذا الزبون؟</p>
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
                    <h4  style="float: right;margin-right: 5px"  class="modal-title font"> تحديث معلومات الزبون</h4>
                </div>
                <div class="modal-body">

                    <form role="form" id="update" method="post" action="{{url('/clientEdit')}}">
                        {{csrf_field()}}
                        <div style="margin-top: 10px"  class="form-group">
                            <label style="float: right ;margin-top: 5px" for="exampleInputEmail1">الاسم الكامل</label>
                            <input style="float: right;text-align:right !important ; direction: rtl" type="text" id="name" name="name" class="form-control input-lg"  placeholder="أدخل الاسم الكامل">
                            @if($errors->first('name'))
                                <span style="float: left ;color: red"  class="help-block"><i class="fa fa-times-circle-o"></i> {{ $errors->first('name') }}</span>
                            @endif
                        </div>



                        <div  class="form-group">
                            <label style="float: right;margin-top: 5px" for="exampleInputEmail1">عنوان السكن</label>
                            <input style="float: right;text-align:right !important ; direction: rtl" type="text" id="address" name="address" class="form-control input-lg"  placeholder="أدخل عنوان الزبون">
                            @if($errors->first('address'))
                                <span style="float: left ;color: red"  class="help-block"><i class="fa fa-times-circle-o"></i> {{ $errors->first('address') }}</span>
                            @endif
                        </div>

                        <div  class="form-group">
                            <label style="float: right;margin-top: 5px" for="exampleInputEmail1">رقم الهاتف</label>
                            <input style="float: right;text-align:right !important ; direction: rtl" type="text" name="mobile" id="mobile" class="form-control input-lg"  placeholder="أدخل رقم الهاتف">
                            @if($errors->first('mobile'))
                                <span style="float: left ;color: red"  class="help-block"><i class="fa fa-times-circle-o"></i> {{ $errors->first('mobile') }}</span>
                            @endif
                        </div>





                        <div  class="form-group">
                            <label style="float: right;margin-top: 5px" for="exampleInputEmail1">البريد الالكتروني</label>
                            <input style="float: right;text-align:right !important ; direction: rtl" type="email" id="email" name="email" class="form-control input-lg"  placeholder="أدخل البريد الالكتروني">
                            @if($errors->first('email'))
                                <span style="float: left ;color: red"  class="help-block"><i class="fa fa-times-circle-o"></i> {{ $errors->first('email') }}</span>
                            @endif
                        </div>




                        <div  class="form-group">
                            <button style="float: right ;margin-top: 20px" type="submit" class="btn btn-primary btn-lg">تحديث</button>
                        </div>
                    </form>


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



                $("#myTable").on('click','.btn-edit',function (e){
                $('#myModalUpdate').modal('toggle');


                var id = $(this).attr('clientId');
                var  name= $(this).attr('name');
                var  email= $(this).attr('email');
                var  address= $(this).attr('address');
                var  mobile= $(this).attr('mobile');

                $("#name").val(name);



                $("#address").val(address);

                $("#email").val(email);

                $("#mobile").val(mobile);



                $("#update").attr('action', 'clientEdit/'+id)


            });


            var url = "/clientDelete/";

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
