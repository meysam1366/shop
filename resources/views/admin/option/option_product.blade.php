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
                        <h1>اختصاص ویژگی به محصولا</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-left">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">خانه</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('option.index') }}">ویژگی ها</a></li>
                            <li class="breadcrumb-item active">اختصاص ویژگی به محصول</li>
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
                                <h3 class="card-title">اختصاص ویژگی به محصول</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                @include('errors.error')
                                {!! Form::open(['url' => route('option_product_store'),'enctype']) !!}

                                <div class="form-group row">
                                    {!! Form::label('option_id', 'ویژگی',['class' => 'col-form-label']) !!}
                                    <div class="col-sm-10">
                                        {!! Form::select('option_id',$options,null,['class' => 'form-control options']) !!}
                                    </div>
                                </div>

                                <div class="form-group row">
                                    {!! Form::label('product_id', 'محصول',['class' => 'col-form-label']) !!}
                                    <div class="col-sm-10">
                                        {!! Form::select('product_id',$products,null,['class' => 'form-control categories']) !!}
                                    </div>
                                </div>

                                <div class="form-group row">
                                    {!! Form::label('item_value', 'محتوای ویژگی',['class' => 'col-form-label']) !!}
                                    <div class="col-sm-10">
                                        <div class="item_value"></div>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    {!! Form::submit('اختصاص ویژگی به محصول',['class' => 'btn btn-primary']) !!}
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

            $('#option_id').change(function () {
                var option_id = $(this).val();
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    type: 'GET',
                    url: "{{ route('get_item_field') }}",
                    data: {option_id: option_id},
                    success: function (data) {
                        var field = data.field;
                        switch (field) {
                            case "text":
                                $('.item_value').html('<input type="text" name="item_value" class="form-control" />');
                            break;
                            case "textarea":
                                $('.item_value').html('<textarea col="5" row="30" name="item_value" class="form-control"></textarea>');
                            break;
                            case "checkbox":
                                $('.item_value').html('<input type="checkbox" name="item_value" value="1" class="form-check" />');
                                break;
                        }
                    }
                });

            });
        });
    </script>

@stop