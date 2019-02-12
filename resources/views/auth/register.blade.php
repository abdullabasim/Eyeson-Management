@extends('layouts.default')

@section('title')
    أضافة مستخدم
@endsection

@section('css')
    <style>
        ::-webkit-input-placeholder { text-align:right; }
        /* mozilla solution */
        input:-moz-placeholder { text-align:right; }
        .select2 {
            -webkit-appearance: menulist-button;
            height: 50px !important;
        }
    </style>
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
@endsection
@section('content')

    <div  class="content-wrapper">
        <div  >


                <section   class="content">
            <!-- Content Header (Page header) -->
            <div  style="margin-top: 50px ;margin-bottom: 100px !important;padding: 50px !important;"  class="box box-primary">
                <div class="box-header with-border">
                    <h3 style="float: right" class="box-title font"><b>  أضافة مستخدم </b> </h3>
                </div>
            @include('alertMessages.alertMessages')
            <!-- /.box-header -->
                <!-- form start -->
                <div class="box-body">
                <form role="form" action="{{ route('register') }}" method="post">

                    {{ csrf_field() }}



                        <div style="margin-top: 10px"  class="form-group">
                            <label style="float: right ;margin-top: 5px" for="exampleInputEmail1">الاسم الكامل</label>
                            <input style="float: right;text-align:right !important ; direction: rtl" type="text" name="name" class="form-control input-lg"  placeholder="أدخل الاسم الكامل">
                            @if($errors->first('name'))
                                <span style="float: left ;color: red"  class="help-block"><i class="fa fa-times-circle-o"></i> {{ $errors->first('name') }}</span>
                            @endif
                        </div>





                    <div  class="form-group">
                        <label style="float: right;margin-top: 5px" for="exampleInputEmail1">نوع المستخدم</label>

                        <select  name="permission" class="form-control select2" data-placeholder="أختار المرحلة" style="float: right;text-align:right !important ; direction: rtl ;margin-left: 90px !important;">
                            <option selected="selected"></option>

                                <option value="1">أدمن</option>
                            <option value="2">مدخل بيانات</option>

                        </select>
                        @if($errors->first('permission'))
                            <span style="float: left ;color: red"  class="help-block"><i class="fa fa-times-circle-o"></i> {{ $errors->first('permission') }}</span>
                        @endif
                    </div>


                        <div  class="form-group">
                                <label style="float: right;margin-top: 5px" for="exampleInputEmail1">البريد الالكتروني</label>
                                <input style="float: right;text-align:right !important ; direction: rtl" type="email" name="email" class="form-control input-lg"  placeholder="أدخل البريد الالكتروني">
                                @if($errors->first('email'))
                                    <span style="float: left ;color: red"  class="help-block"><i class="fa fa-times-circle-o"></i> {{ $errors->first('email') }}</span>
                                @endif
                            </div>


                        <div  class="form-group">
                                    <label style="float: right ;margin-top: 5px" for="exampleInputEmail1">كملة السر</label>
                                    <input style="float: right;text-align:right !important ; direction: rtl" type="password" name="password" class="form-control input-lg"  placeholder="أدخل كلمة السر" required>
                                    @if($errors->first('password'))
                                        <span style="float: left ;color: red"  class="help-block"><i class="fa fa-times-circle-o"></i> {{ $errors->first('password') }}</span>
                                    @endif
                                </div>

                        <div  class="form-group">
                            <label style="float: right;margin-top: 5px" for="exampleInputEmail1">تاكيد كملة السر</label>
                            <input style="float: right;text-align:right !important ; direction: rtl" id="password-confirm" type="password" name="password_confirmation" required class="form-control input-lg"  placeholder="أدخل تأكيد كلمة السر">
                            @if($errors->first('password'))
                                <span style="float: left ;color: red"  class="help-block"><i class="fa fa-times-circle-o"></i> {{ $errors->first('password') }}</span>
                            @endif
                        </div>


                    <!-- /.box-body -->


                    <div  class="form-group">
                        <button style="float: right ;margin-top: 20px" type="submit" class="btn btn-primary btn-lg">تخزين</button>
                    </div>



                </form>
                </div>






            </div>

                </section>
        </div>


    </div>
@endsection

<script>
    $(function () {
        $('.select2').select2(
            {
                allowClear: true,
            }
        )
    });
</script>