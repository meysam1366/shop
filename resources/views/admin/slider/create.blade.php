@extends('admin.layouts.master')

@section('header')

    <!-- Select2 -->
    <link rel="stylesheet" href="/select2/select2.min.css">

@stop

@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>اسلایدر ها</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-left">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">خانه</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('slider.index') }}">اسلایدر ها</a></li>
                            <li class="breadcrumb-item active">ثبت اسلایدر جدید</li>
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
                                <h3 class="card-title">ثبت اسلایدر جدید</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                @include('errors.error')
                                {!! Form::open(['url' => route('slider.store'),'enctype' => 'multipart/form-data']) !!}

                                <div class="form-group row">
                                    {!! Form::label('title', 'عنوان اسلایدر',['class' => 'col-form-label']) !!}
                                    <div class="col-sm-10">
                                        {!! Form::text('title','',['class' => 'form-control']) !!}
                                    </div>
                                </div>

                                <div class="form-group row">
                                    {!! Form::label('subtitle', 'عنوان زیر اسلایدر',['class' => 'col-form-label']) !!}
                                    <div class="col-sm-10">
                                        {!! Form::text('subtitle','',['class' => 'form-control']) !!}
                                    </div>
                                </div>

                                <div class="form-group row">
                                    {!! Form::label('link', 'لینک اسلایدر',['class' => 'col-form-label']) !!}
                                    <div class="col-sm-10">
                                        {!! Form::text('link','',['class' => 'form-control']) !!}
                                    </div>
                                </div>

                                <div class="form-group row">
                                    {!! Form::label('image', 'فایل عکس',['class' => 'col-form-label']) !!}
                                    <div class="col-sm-10">
                                        {!! Form::file('image',[],['class' => 'form-control custom-file-input']) !!}
                                    </div>
                                </div>

                                <div class="form-group row">
                                    {!! Form::submit('ثبت اسلایدر',['class' => 'btn btn-primary']) !!}
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

    <!-- Select2 -->
    <script src="/select2/select2.full.min.js"></script>

    <script>
        $(document).ready(function () {
            //Initialize Select2 Elements
            $('.select2').select2();
        });
    </script>

@stop