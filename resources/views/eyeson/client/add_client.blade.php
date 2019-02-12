@extends('layouts.default')

@section('title')
أضافة زبون جديد
@endsection

@section('css')
    <style>
    ::-webkit-input-placeholder { text-align:right; }
    /* mozilla solution */
    input:-moz-placeholder { text-align:right; }
    </style>
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
            height: 34px !important;
        }
        .select2-selection__arrow {
            height: 34px !important;
        }
        /*select { padding-top: 2px !important; }*/
    </style>



    <div class="content-wrapper">
        <div style="padding: 30px" class="col-md-6 col-md-offset-3">
        <!-- Content Header (Page header) -->
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 style="float: right" class="box-title font"><b>أضافة زبون جديد
                    </b> </h3>
            </div>
        @include('alertMessages.alertMessages')
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" action="{{url('/clientAdd')}}" method="post">

                {{ csrf_field() }}



                <div  style="padding: 15px;margin-bottom: 25px !important" class="form-group">
                    <label style="float: right;" for="exampleInputEmail1">الأسم الكامل</label>

                    <input type="text" required  placeholder="يرجى أدخال أسم الزبون الكامل" name="name"  value=" {{old('name')}}" class="form-control input-lg"  style="float: right;text-align:right !important ; direction: rtl ;margin-left: 90px !important;">

                    @if($errors->first('name'))
                        <span style="float: left ;color: red"  class="help-block"> {{ $errors->first('name') }}<i class="fa fa-times-circle-o input-lg"></i></span>
                    @endif
                </div>

                <div  style="padding: 15px;margin-bottom: 25px !important" class="form-group">
                    <label style="float: right;" for="exampleInputEmail1">العنوان</label>

                    <input type="text" required  placeholder="يرجى أدخال عنوان الزبون" name="address"  value=" {{old('address')}}" class="form-control input-lg"  style="float: right;text-align:right !important ; direction: rtl ;margin-left: 90px !important;">

                    @if($errors->first('address'))
                        <span style="float: left ;color: red"  class="help-block"> {{ $errors->first('address') }}<i class="fa fa-times-circle-o input-lg"></i></span>
                    @endif
                </div>

                <div  style="padding: 15px;margin-bottom: 25px !important" class="form-group">
                    <label style="float: right;" for="exampleInputEmail1">رقم الهاتف</label>

                    <input type="text"   placeholder="يرجى أدخال رقم هاتف الزبون" name="mobile"  value=" {{old('mobile')}}" class="form-control input-lg"  style="float: right;text-align:right !important ; direction: rtl ;margin-left: 90px !important;">

                    @if($errors->first('mobile'))
                        <span style="float: left ;color: red"  class="help-block"> {{ $errors->first('mobile') }}<i class="fa fa-times-circle-o input-lg"></i></span>
                    @endif
                </div>

                <div  style="padding: 15px;margin-bottom: 25px !important" class="form-group">
                    <label style="float: right;" for="exampleInputEmail1"> البريد الاكلتروني</label>

                    <input type="text"   placeholder="يرجى أدخال البريد الالكتروني للزبون" name="email"  value=" {{old('email')}}" class="form-control input-lg"  style="float: right;text-align:right !important ; direction: rtl ;margin-left: 90px !important;">

                    @if($errors->first('email'))
                        <span style="float: left ;color: red"  class="help-block"> {{ $errors->first('email') }}</span>
                    @endif
                </div>

                <div class="box-footer "  >
                    <button style="float: right ;margin-top: 30px" type="submit" class="btn btn-primary btn-lg">تخزين</button>
                </div>
            </form>

        </div>
        <!-- Main content -->
        <section class="content">


        </section>
        <!-- /.content -->
    </div>
        </div>
@endsection

