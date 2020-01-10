@extends('admin.layouts.master')

@section('header')

    <!-- Bootstrap Color Picker -->
    <link rel="stylesheet" href="/colorpicker/bootstrap-colorpicker.min.css">

@stop

@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>برند ها</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-left">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">خانه</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('color.index') }}">رنگ ها</a></li>
                            <li class="breadcrumb-item active">ثبت رنگ جدید</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <!-- left column -->
                    <div class="col-md-6">
                        <!-- general form elements -->
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">ثبت رنگ جدید</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                @include('errors.error')
                                {!! Form::open(['url' => route('color.store')]) !!}

                                <div class="form-group row">
                                    {!! Form::label('title', 'نام رنگ',['class' => 'col-form-label']) !!}
                                    <div class="col-sm-10">
                                        {!! Form::text('title','',['class' => 'form-control']) !!}
                                    </div>
                                </div>

                                <div class="form-group row">
                                    {!! Form::label('palette', 'کد رنگ',['class' => 'col-form-label']) !!}
                                    <div class="col-sm-10">
                                        {!! Form::text('palette','',['class' => 'form-control my-colorpicker1']) !!}
                                    </div>
                                </div>

                                <div class="form-group row">
                                    {!! Form::submit('ثبت رنگ',['class' => 'btn btn-primary']) !!}
                                </div>

                                {!! Form::close() !!}
                            </div>
                        </div>
                        <!-- /.card -->
                    </div>
                    <!--/.col (left) -->
                    <!--/.col (right) -->
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header">
                                توضیحات
                            </div>
                            <div class="card-body">

                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

@stop

@section('footer')

    <!-- bootstrap color picker -->
    <script src="/colorpicker/bootstrap-colorpicker.min.js"></script>
    <script>
        //Colorpicker
        $('.my-colorpicker1').colorpicker()
    </script>

@stop