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
                <h3 style="float: right" class="box-title font"><b>أدارة الخدمات </b> </h3>
            </div>
        @include('alertMessages.alertMessages')
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" action="{{url('/serviceManageStep2')}}" method="get">

                {{ csrf_field() }}

                <div  style="padding-left: 10px;padding-right: 10px" class="form-group">
                    <label style="float: right;margin-top: 5px" for="exampleInputEmail1">القسم</label>

                    <select  name="department" class="form-control select2" data-placeholder="أختار القسم" style="float: right;text-align:right !important ; direction: rtl ;margin-left: 90px !important;">
                        <option selected="selected"></option>
                        @foreach($departments as $department)
                            <option value="{{$department->id}}">{{$department->title}}</option>
                        @endforeach
                    </select>
                    @if($errors->first('department'))
                        <span style="float: left ;color: red"  class="help-block"><i class="fa fa-times-circle-o"></i> {{ $errors->first('department') }}</span>
                    @endif
                </div>


                <!-- /.box-body -->

                <div class="box-footer "  >
                    <button style="float: right" type="submit" class="btn btn-primary btn-lg">عرض</button>
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