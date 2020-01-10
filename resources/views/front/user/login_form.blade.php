@extends('front.layouts.app')

@section('content')
    <!-- Page Breadcrumb Start -->
    <div class="main-breadcrumb mb-100">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="breadcrumb-content text-center ptb-70">
                        <ul class="breadcrumb-list breadcrumb">
                            <li><a href="{{ route('/') }}">home</a></li>
                            <li><a href="{{ route('my_account') }}">account</a></li>
                            <li><a href="{{ route('login_user') }}">log in</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- Row End -->
        </div>
        <!-- Container End -->
    </div>
    <!-- Page Breadcrumb End -->
    <!-- LogIn Page Start -->
    <div class="log-in pb-100">
        <div class="container">
            <div class="row">
                <!-- New Customer Start -->
                <div class="col-sm-6">
                    <div class="well">
                        <div class="new-customer">
                            <h3>NEW CUSTOMER</h3>
                            <p class="mtb-10"><strong>Register</strong></p>
                            <p>By creating an account you will be able to shop faster, be up to date on an order's status, and keep track of the orders you have previously made</p>
                            <a class="customer-btn" href="{{ route('register_user') }}">continue</a>
                        </div>
                    </div>
                </div>
                <!-- New Customer End -->
                <!-- Returning Customer Start -->
                <div class="col-sm-6">
                    <div class="well">
                        <div class="return-customer">
                            <h3 class="mb-10">RETURNING CUSTOMER</h3>
                            <p class="mb-10"><strong>I am a returning customer</strong></p>
                            <form action="{{ route('login_user_post') }}" method="post">
                                @csrf

                                <div class="form-group">
                                    <label class="control-label">Enter you email address here...</label>
                                    <input type="text" name="email" placeholder="Enter you email address here..." id="input-email" class="form-control @error('email') is-invalid @enderror">
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Password</label>
                                    <input type="password" name="password" placeholder="Password" id="input-password" class="form-control @error('password') is-invalid @enderror">
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <p class="lost-password">
                                    @if (Route::has('password.request'))
                                        <a class="btn btn-link" href="{{ route('password.request.user') }}">
                                            فراموشی رمز عبور
                                        </a>
                                    @endif
                                </p>
                                <input type="submit" value="Login" class="return-customer-btn">
                            </form>
                        </div>
                    </div>
                </div>
                <!-- Returning Customer End -->
            </div>
            <!-- Row End -->
        </div>
        <!-- Container End -->
    </div>
    <!-- LogIn Page End -->
@stop