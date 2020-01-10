@extends('admin.layouts.master')

@section('header')

    <!-- DataTables -->
    <link rel="stylesheet" href="/datatables/dataTables.bootstrap4.css">

@stop

@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>لیست کاربران</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-left">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">خانه</a></li>
                            <li class="breadcrumb-item active">کاربران</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">کاربران</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>نوع کاربر</th>
                                    <th>موبایل</th>
                                    <th>ایمیل</th>
                                    <th>وضعیت</th>
                                    <th>وضعیت تایید محصولات فروشنده</th>
                                    <th>عملیات</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($users as $user)
                                    <tr>
                                        <td>{{ $user->role }}</td>
                                        <td>{{ $user->mobile }} تومان </td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->status ? 'فعال' : 'غیر فعال' }}</td>
                                        <td>{{ $user->verifyForever ? 'فعال' : 'غیر فعال' }}</td>
                                        <td>
                                            <div class="form-group-sm">
                                                <a href="{{ route('user.edit',['user' => $user->id]) }}" class="btn btn-sm btn-warning">ویرایش</a>
                                                {!! Form::open(['route' => ['user.destroy','user' => $user->id],'method' => 'DELETE']) !!}
                                                {!! Form::submit('حذف',['class' => 'btn btn-sm btn-danger','onClick'=>'return confirm("آیا شما مطمئن هستید؟")']) !!}
                                                {!! Form::close() !!}
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>نوع کاربر</th>
                                    <th>موبایل</th>
                                    <th>ایمیل</th>
                                    <th>وضعیت</th>
                                    <th>وضعیت تایید محصولات فروشنده</th>
                                    <th>عملیات</th>
                                </tr>
                                </tfoot>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </section>
        <!-- /.content -->
    </div>

@stop

@section('footer')

    <!-- DataTables -->
    <script src="/datatables/jquery.dataTables.js"></script>
    <script src="/datatables/dataTables.bootstrap4.js"></script>
    <!-- SlimScroll -->
    <script src="/slimScroll/jquery.slimscroll.min.js"></script>
    <!-- FastClick -->
    <script src="/fastclick/fastclick.js"></script>

    <!-- page script -->
    <script>
        $(document).ready(function () {
            $('#example2').DataTable({
                "language": {
                    "paginate": {
                        "next": "بعدی",
                        "previous" : "قبلی"
                    }
                },
                "info" : false,
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "autoWidth": false
            });
        });
    </script>

@stop