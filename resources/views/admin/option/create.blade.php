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
                        <h1>ویژگی ها</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-left">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">خانه</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('option.index') }}">ویژگی ها</a></li>
                            <li class="breadcrumb-item active">ثبت ویژگی جدید</li>
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
                                <h3 class="card-title">ثبت ویژگی جدید</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                @include('errors.error')
                                {!! Form::open(['url' => route('option.store'),'enctype']) !!}

                                <div class="form-group row">
                                    {!! Form::label('item_key', 'عنوان مشخصه',['class' => 'col-form-label']) !!}
                                    <div class="col-sm-10">
                                        {!! Form::text('item_key','',['class' => 'form-control']) !!}
                                    </div>
                                </div>

                                <div class="form-group row">
                                    {!! Form::label('parent_id', 'زیر مجموعه',['class' => 'col-form-label']) !!}
                                    <div class="col-sm-10">
                                        {!! Form::select('parent_id',$options,null,['class' => 'form-control options']) !!}
                                    </div>
                                </div>

                                <div class="form-group row">
                                    {!! Form::label('category_id', 'دسته بندی',['class' => 'col-form-label']) !!}
                                    <div class="col-sm-10">
                                        {!! Form::select('category_id',$categories,null,['class' => 'form-control categories']) !!}
                                    </div>
                                </div>

                                <div class="form-group row">
                                    {!! Form::label('field', 'نوع فیلد',['class' => 'col-form-label']) !!}
                                    <div class="col-sm-10">
                                        {!! Form::select('field',$fields,null,['class' => 'form-control categories']) !!}
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
                                    {!! Form::submit('ثبت ویژگی',['class' => 'btn btn-primary']) !!}
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
            $('.options').select2();
            $('.categories').select2();
        });
    </script>

@stop