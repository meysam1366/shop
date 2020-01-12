@extends('admin.layouts.master')

@section('header')

    <!-- Select2 -->
    <link rel="stylesheet" href="/select2/select2.min.css">
    <!-- Persian Data Picker -->
    <link rel="stylesheet" href="/css/persian-datepicker.min.css">

@stop

@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>محصولات ویژه</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-left">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">خانه</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('product.index') }}">محصولات ویژه</a></li>
                            <li class="breadcrumb-item active">ثبت محصول ویژه</li>
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
                    <div class="col-md-8">
                        <!-- general form elements -->
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">ثبت محصول ویژه</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                @include('errors.error')
                                {!! Form::open(['url' => route('special.store'),'enctype' => 'multipart/form-data']) !!}

                                <div class="form-group row">
                                    {!! Form::label('product_id', 'نام محصول',['class' => 'col-form-label']) !!}
                                    <div class="col-sm-10">
                                        {!! Form::select('product_id',$products,null,['class' => 'form-control products']) !!}
                                    </div>
                                </div>

                                <div class="form-group row">
                                    {!! Form::label('start_time', 'تاریخ شروع',['class' => 'col-form-label']) !!}
                                    <div class="col-sm-10">
                                        {!! Form::text('start_time','',['class' => 'form-control start_time']) !!}
                                    </div>
                                </div>

                                <div class="form-group row">
                                    {!! Form::label('end_time', 'تاریخ پایان',['class' => 'col-form-label']) !!}
                                    <div class="col-sm-10">
                                        {!! Form::text('end_time','',['class' => 'form-control end_time']) !!}
                                    </div>
                                </div>

                                <div class="form-group row">
                                    {!! Form::label('discount', 'تخفیف',['class' => 'col-form-label']) !!}
                                    <div class="col-sm-10">
                                        {!! Form::text('discount','',['class' => 'form-control']) !!}
                                    </div>
                                </div>

                                <div class="form-group row">
                                    {!! Form::submit('ثبت محصول',['class' => 'btn btn-primary']) !!}
                                </div>

                                {!! Form::close() !!}
                            </div>
                        </div>
                        <!-- /.card -->
                    </div>
                    <!--/.col (left) -->
                    <!--/.col (right) -->
                    <div class="col-md-4">
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
    <!-- Ckeditor -->
    <script src="/ckeditor2/ckeditor.js"></script>
    <!-- Persian Data Picker -->
    <script src="/js/persian-date.min.js"></script>
    <script src="/js/persian-datepicker.min.js"></script>
    <script>
        $(document).ready(function () {
            //Initialize Select2 Elements
            $('.products').select2();
            // Replace the <textarea id="editor1"> with a CKEditor
            // instance, using default configuration.
            CKEDITOR.replace( 'excerpt' );
            CKEDITOR.replace( 'details' );

            $('.start_time').persianDatepicker({
                format: 'YYYY-MM-DD',
                autoClose: true,
                minDate: new persianDate().unix()
            });
            $('.end_time').persianDatepicker({
                format: 'YYYY-MM-DD',
                autoClose: true,
                minDate: new persianDate().unix()
            });
        });
    </script>

@stop