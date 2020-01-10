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
                        <h1>برند ها</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-left">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">خانه</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('brand.index') }}">برند ها</a></li>
                            <li class="breadcrumb-item active">ثبت برند جدید</li>
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
                                <h3 class="card-title">ثبت برند جدید</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                @include('errors.error')
                                {!! Form::open(['url' => route('brand.store'),'enctype' => 'multipart/form-data']) !!}

                                <div class="form-group row">
                                    {!! Form::label('title', 'عنوان',['class' => 'col-form-label']) !!}
                                    <div class="col-sm-10">
                                        {!! Form::text('title','',['class' => 'form-control']) !!}
                                    </div>
                                </div>

                                <div class="form-group row">
                                    {!! Form::label('website', 'وب سایت',['class' => 'col-form-label']) !!}
                                    <div class="col-sm-10">
                                        {!! Form::text('website','',['class' => 'form-control']) !!}
                                    </div>
                                </div>

                                <div class="form-group row">
                                    {!! Form::label('description', 'توضیحات',['class' => 'col-form-label']) !!}
                                    <div class="col-sm-10">
                                        {!! Form::textarea('description','',['class' => 'form-control select2']) !!}
                                    </div>
                                </div>

                                <div class="form-group row">
                                    {!! Form::label('img-thumbnail', 'فایل عکس',['class' => 'col-form-label']) !!}
                                    <div class="col-sm-10">
                                        {!! Form::file('img-thumbnail',[],['class' => 'form-control custom-file-input']) !!}
                                    </div>
                                </div>

                                <div class="form-group row">
                                    {!! Form::label('width', 'عرض عکس',['class' => 'col-form-label']) !!}
                                    <div class="col-sm-4">
                                        {!! Form::text('width','',['class' => 'form-control']) !!}
                                    </div>
                                    {!! Form::label('height', 'طول عکس',['class' => 'col-form-label']) !!}
                                    <div class="col-sm-4">
                                        {!! Form::text('height','',['class' => 'form-control']) !!}
                                    </div>
                                </div>

                                <div class="form-group row">
                                    {!! Form::submit('ثبت برند',['class' => 'btn btn-primary']) !!}
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

    <!-- Ckeditor -->
    <script src="/ckeditor2/ckeditor.js"></script>
    <script>
        // Replace the <textarea id="editor1"> with a CKEditor
        // instance, using default configuration.
        CKEDITOR.replace( 'description' );
    </script>

@stop