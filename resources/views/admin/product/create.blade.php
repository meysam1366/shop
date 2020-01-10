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
                        <h1>محصولات</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-left">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">خانه</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('product.index') }}">محصولات</a></li>
                            <li class="breadcrumb-item active">ثبت محصول جدید</li>
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
                                <h3 class="card-title">ثبت محصول جدید</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                @include('errors.error')
                                {!! Form::open(['url' => route('product.store'),'enctype' => 'multipart/form-data']) !!}

                                <div class="form-group row">
                                    {!! Form::label('title', 'نام محصول',['class' => 'col-form-label']) !!}
                                    <div class="col-sm-10">
                                        {!! Form::text('title','',['class' => 'form-control']) !!}
                                    </div>
                                </div>

                                <div class="form-group row">
                                    {!! Form::label('slug', 'نام انگلیسی محصول',['class' => 'col-form-label']) !!}
                                    <div class="col-sm-10">
                                        {!! Form::text('slug','',['class' => 'form-control']) !!}
                                    </div>
                                </div>

                                <div class="form-group row">
                                    {!! Form::label('excerpt', 'خلاصه توضیح',['class' => 'col-form-label']) !!}
                                    <div class="col-sm-10">
                                        {!! Form::textarea('excerpt','',['class' => 'form-control excerpt']) !!}
                                    </div>
                                </div>

                                <div class="form-group row">
                                    {!! Form::label('details', 'توضیحات',['class' => 'col-form-label']) !!}
                                    <div class="col-sm-10">
                                        {!! Form::textarea('details','',['class' => 'form-control details']) !!}
                                    </div>
                                </div>

                                <div class="form-group row">
                                    {!! Form::label('category_id', 'دسته بندی',['class' => 'col-form-label']) !!}
                                    <div class="col-sm-10">
                                        {!! Form::select('category_id',$categories,null,['class' => 'form-control categories']) !!}
                                    </div>
                                </div>

                                <div class="form-group row">
                                    {!! Form::label('brand_id', 'برند',['class' => 'col-form-label']) !!}
                                    <div class="col-sm-10">
                                        {!! Form::select('brand_id',$brands,null,['class' => 'form-control categories']) !!}
                                    </div>
                                </div>

                                <div class="form-group row">
                                    {!! Form::label('price', 'قیمت محصول',['class' => 'col-form-label']) !!}
                                    <div class="col-sm-10">
                                        {!! Form::text('price','',['class' => 'form-control']) !!}
                                    </div>
                                </div>

                                <div class="form-group row">
                                    {!! Form::label('count', 'موجودی محصول',['class' => 'col-form-label']) !!}
                                    <div class="col-sm-10">
                                        {!! Form::text('count','',['class' => 'form-control']) !!}
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
                                    {!! Form::label('stat','وضعیت',['class' => 'col-form-label']) !!}
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="status" id="exampleRadios1" value="1" checked>
                                        <label class="form-check-label" for="exampleRadios1">
                                            فعال
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="status" id="exampleRadios2" value="0">
                                        <label class="form-check-label" for="exampleRadios2">
                                            غیرفعال
                                        </label>
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
    <script>
        $(document).ready(function () {
            //Initialize Select2 Elements
            $('.options').select2();
            $('.categories').select2();
            // Replace the <textarea id="editor1"> with a CKEditor
            // instance, using default configuration.
            CKEDITOR.replace( 'excerpt' );
            CKEDITOR.replace( 'details' );
        });
    </script>

@stop