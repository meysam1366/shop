@extends('front.layouts.app')

@section('content')
    <!-- Page Breadcrumb Start -->
    <div class="main-breadcrumb mb-100">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="breadcrumb-content text-center ptb-70">
                        <ul class="breadcrumb-list breadcrumb">
                            <li><a href="{{ route('/') }}">صفحه اصلی</a></li>
                            <li><a href="{{ route('my_account') }}">صفحه کاربری</a></li>
                            <li><a href="{{ route('register_user') }}">عضویت</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- Row End -->
        </div>
        <!-- Container End -->
    </div>
    <!-- Page Breadcrumb End -->
    <!-- Register Account Start -->
    <div class="register-account">
        <div class="container">
            <div class="row">
                <div class="register-title">
                    <h3 class="mb-10">REGISTER ACCOUNT</h3>
                    <p class="mb-10">If you already have an account with us, please login at the login page.</p>
                </div>
            </div>
            <!-- Row End -->
            <div class="row">
                <form class="form-horizontal pb-100" method="post" action="{{ route('register_user_post') }}">
                    @csrf
                    <fieldset>
                        <legend>Your Personal Details</legend>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="email"><span class="require">*</span>Enter you email address here...</label>
                            <div class="col-sm-10">
                                <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="Enter you email address here...">
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="pwd"><span class="require">*</span>Password:</label>
                            <div class="col-sm-10">
                                <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="pwd" placeholder="Password">
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="pwd-confirm"><span class="require">*</span>Confirm Password</label>
                            <div class="col-sm-10">
                                <input type="password" name="password_confirmation" class="form-control" id="pwd-confirm" placeholder="Confirm password">
                            </div>
                        </div>
                        <div class="form-group">
                            <input type="submit" value="Continue" class="newsletter-btn">
                        </div>
                    </fieldset>
                </form>
            </div>
            <!-- Row End -->
        </div>
        <!-- Container End -->
    </div>
    <!-- Register Account End -->
@stop