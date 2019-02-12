@extends('layouts.default')

@section('title')
أضافة خدمات
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
                <h3 style="float: right" class="box-title font"><b>أضافة خدمات

                    </b> </h3>
            </div>
        @include('alertMessages.alertMessages')
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" action="{{url('/serviceAdd')}}" method="post">

                {{ csrf_field() }}



                <div  class="form-group">
                    <label style="float: right;margin-top: 5px" for="exampleInputEmail1">القسم</label>

                    <select required  name="department"  class="form-control select2" data-placeholder=" يرجى أختيار القسم " style="float: right;text-align:right !important ; direction: rtl ;padding:0px  !important;">
                        <option selected disabled></option>
                        @foreach($departments as $department)
                            <option value="{{$department->id}}">{{$department->title}}</option>
                        @endforeach
                    </select>
                    @if($errors->first('department'))
                        <span style="float: left ;color: red"  class="help-block"> {{ $errors->first('department') }}<i class="fa fa-times-circle-o"></i></span>
                    @endif
                </div>

                <div  style="padding: 15px;margin-bottom: 25px !important" class="form-group">
                    <label style="float: right;" for="exampleInputEmail1">عنوان الخدمة</label>

                    <input type="text" required  placeholder="يرجى أدخال عنوان الخدمة" name="service"  value=" {{old('service')}}" class="form-control input-lg"  style="float: right;text-align:right !important ; direction: rtl ;margin-left: 90px !important;">

                    @if($errors->first('service'))
                        <span style="float: left ;color: red"  class="help-block"> {{ $errors->first('service') }}<i class="fa fa-times-circle-o input-lg"></i></span>
                    @endif
                </div>

                <div  style="padding: 15px;margin-bottom: 25px !important" class="form-group">

                    <input type="hidden" required  placeholder="يرجى أدخال سعر الخدمة" name="price"  value="0" class="form-control input-lg"  style="float: right;text-align:right !important ; direction: rtl ;margin-left: 90px !important;">

                    @if($errors->first('price'))
                        <span style="float: left ;color: red"  class="help-block"> {{ $errors->first('price') }}<i class="fa fa-times-circle-o input-lg"></i></span>
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

@section('js')
    <script>


        $(function () {
            //Initialize Select2 Elements
            $('.select2').select2()
        });

    </script>
    @endsection