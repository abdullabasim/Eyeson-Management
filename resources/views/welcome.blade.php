@extends('layouts.app')

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
            height: 35px !important;
        }
        .select2-selection__arrow {
            height: 34px !important;
        }
    </style>



    <div class="content-wrapper">
        <div style="padding: 30px" class="col-md-6 col-md-offset-3">
        <!-- Content Header (Page header) -->
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 style="float: right" class="box-title"><b>أضافة مرحلة </b> </h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" action="" method="post">


                <div class="box-body">
                    <div  class="form-group">
                        <label style="float: right" for="exampleInputEmail1">المرحلة</label>
                        <input style="float: right;text-align:right !important ; direction: rtl" type="text" name="level" class="form-control input-lg"  placeholder="أدخل مرحلة جديدة">
                        @if($errors->first('level'))
                        <span style="float: left ;color: red"  class="help-block"><i class="fa fa-times-circle-o"></i> {{ $errors->first('level') }}</span>
                        @endif
                    </div>


        </div>
                <!-- /.box-body -->

                <div class="box-footer "  >
                    <button style="float: right" type="submit" class="btn btn-primary">تخزين</button>
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
@section('js')
    <script>

        $(function () {
            $('.select2').select2(
                {
                    allowClear: true,
                }
            )
        });

    </script>
@endsection
