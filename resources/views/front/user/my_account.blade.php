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
                        </ul>
                    </div>
                </div>
            </div>
            <!-- Row End -->
        </div>
        <!-- Container End -->
    </div>
    <!-- Page Breadcrumb End -->
    <!-- My Account Page Start Here -->
    <div class="my-account white-bg pb-100">
        <div class="container">
            <div class="account-dashboard">
                <div class="dashboard-upper-info">
                    <div class="row no-gutters align-items-center">
                        <div class="col-lg-3 col-md-3 col-sm-6">
                            <div class="d-single-info">
                                <p class="user-name">Hello <span>yourmail@info</span></p>
                                <p>(not yourmail@info? {!! Form::open(['route' => 'logout', 'method' => 'post']) !!}
                                    {!! Form::submit('Logout', ['class' => 'nav nav-default']) !!}
                                    {!! Form::close() !!})</p>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-3 col-sm-6">
                            <div class="d-single-info">
                                <p>Need Assistance? Customer service at.</p>
                                <p>admin@example.com.</p>
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-3 col-sm-6">
                            <div class="d-single-info">
                                <p>E-mail them at </p>
                                <p>support@example.com</p>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-2 col-sm-6">
                            <div class="d-single-info text-center">
                                <a class="view-cart" href="cart.html"><i class="fa fa-cart-plus" aria-hidden="true"></i>view cart</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-2 col-md-2">
                        <!-- Nav tabs -->
                        <ul class="nav flex-column dashboard-list" role="tablist">
                            <li class="active"><a data-toggle="tab" href="#dashboard">Dashboard</a></li>
                            <li><a data-toggle="tab" href="#orders">Orders</a></li>
                            <li><a data-toggle="tab" href="#downloads">Downloads</a></li>
                            <li><a data-toggle="tab" href="#address">Addresses</a></li>
                            <li><a data-toggle="tab" href="#account-details">Account details</a></li>
                            <li>
                                {!! Form::open(['route' => 'logout', 'method' => 'post']) !!}
                                	{!! Form::submit('Logout', ['class' => 'nav nav-default']) !!}
                                {!! Form::close() !!}
                            </li>
                        </ul>
                    </div>
                    <div class="col-lg-10 col-md-10">
                        <!-- Tab panes -->
                        <div class="tab-content dashboard-content mt-all-40">
                            <div id="dashboard" class="tab-pane fade in active">
                                <h3>Dashboard </h3>
                                <p>From your account dashboard. you can easily check & view your <a href="#">recent orders</a>, manage your <a href="#">shipping and billing addresses</a> and <a href="#">edit your password and account details.</a></p>
                            </div>
                            <div id="orders" class="tab-pane fade">
                                <h3>Orders</h3>
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                        <tr>
                                            <th>Order</th>
                                            <th>Date</th>
                                            <th>Status</th>
                                            <th>Total</th>
                                            <th>Actions</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>May 10, 2018</td>
                                            <td>Processing</td>
                                            <td>$25.00 for 1 item </td>
                                            <td><a class="view" href="cart.html">view</a></td>
                                        </tr>
                                        <tr>
                                            <td>2</td>
                                            <td>May 10, 2018</td>
                                            <td>Processing</td>
                                            <td>$17.00 for 1 item </td>
                                            <td><a class="view" href="cart.html">view</a></td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div id="downloads" class="tab-pane fade">
                                <h3>Downloads</h3>
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                        <tr>
                                            <th>Product</th>
                                            <th>Downloads</th>
                                            <th>Expires</th>
                                            <th>Download</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td>Haven - Free Real Estate PSD Template</td>
                                            <td>May 10, 2018</td>
                                            <td>never</td>
                                            <td><a class="view" href="#">Click Here To Download Your File</a></td>
                                        </tr>
                                        <tr>
                                            <td>Nevara - ecommerce html template</td>
                                            <td>Sep 11, 2018</td>
                                            <td>never</td>
                                            <td><a class="view" href="#">Click Here To Download Your File</a></td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div id="address" class="tab-pane">
                                <p>The following addresses will be used on the checkout page by default.</p>
                                <h4 class="billing-address">Billing address</h4>
                                <a class="view" href="#">edit</a>
                                <p>steven smith</p>
                                <p>Australia</p>
                            </div>
                            <div id="account-details" class="tab-pane fade">
                                <h3>Account details </h3>
                                <div class="register-form login-form clearfix">
                                    <form action="#">
                                        <div class="form-group row align-items-center">
                                            <label class="col-lg-3 col-md-4 col-form-label">Social title</label>
                                            <div class="col-lg-6 col-md-8">
                                                <span class="custom-radio"><input name="id_gender" value="1" type="radio"> Mr.</span>
                                                <span class="custom-radio"><input name="id_gender" value="1" type="radio"> Mrs.</span>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="f-name" class="col-lg-3 col-md-4 col-form-label">First Name</label>
                                            <div class="col-lg-6 col-md-8">
                                                <input type="text" class="form-control" id="f-name">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="l-name" class="col-lg-3 col-md-4 col-form-label">Last Name</label>
                                            <div class="col-lg-6 col-md-8">
                                                <input type="text" class="form-control" id="l-name">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="email" class="col-lg-3 col-md-4 col-form-label">Email address</label>
                                            <div class="col-lg-6 col-md-8">
                                                <input type="text" class="form-control" id="email">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputpassword" class="col-lg-3 col-md-4 col-form-label">Current password</label>
                                            <div class="col-lg-6 col-md-8">
                                                <input type="password" class="form-control" id="inputpassword">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="newpassword" class="col-lg-3 col-md-4 col-form-label">New password</label>
                                            <div class="col-lg-6 col-md-8">
                                                <input type="password" class="form-control" id="newpassword">
                                                <button class="btn show-btn" type="button">Show</button>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="v-password" class="col-lg-3 col-md-4 col-form-label">Confirm password</label>
                                            <div class="col-lg-6 col-md-8">
                                                <input type="password" class="form-control" id="c-password">
                                                <button class="btn show-btn" type="button">Show</button>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="birth" class="col-lg-3 col-md-4 col-form-label">Birthdate</label>
                                            <div class="col-lg-6 col-md-8">
                                                <input type="text" class="form-control" id="birth" placeholder="MM/DD/YYYY">
                                            </div>
                                        </div>
                                        <div class="form-check row p-0 mt-20">
                                            <div class="col-lg-6 col-lg-offset-3 col-md-8 col-md-offset-4">
                                                <input class="form-check-input" value="#" id="offer" type="checkbox">
                                                <label class="form-check-label" for="offer">Receive offers from our partners</label>
                                            </div>
                                        </div>
                                        <div class="form-check row p-0 mt-20">
                                            <div class="col-lg-6 col-lg-offset-3 col-md-8 col-md-offset-4">
                                                <input class="form-check-input" value="#" id="subscribe" type="checkbox">
                                                <label class="form-check-label" for="subscribe">Sign up for our newsletter<br>Subscribe to our newsletters now and stay up-to-date with new collections, the latest lookbooks and exclusive offers..</label>
                                            </div>
                                        </div>
                                        <div class="register-box mt-40">
                                            <button type="submit" class="return-customer-btn f-right">Save</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- My Account Page End Here -->

@stop