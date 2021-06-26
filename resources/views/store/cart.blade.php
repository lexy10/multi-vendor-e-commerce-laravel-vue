@extends('store.storeLayout')
@section('content')
<script src="{{asset('js/lib/jquery.js')}}"></script>
<script src="{{asset('js/dist/jquery.validate.js')}}"></script>

<link type="text/css" rel="stylesheet" href="{{asset('css/style_for_quantity.css')}}" />
<style>
label.error {
  color: #a94442;
  background-color: #f2dede;
  border-color: #ebccd1;
  padding:1px 20px 1px 20px;
}

    .rTable {

    display: block;
    width:100%;

}
.rTableHeading, .rTableBody, .rTableFoot, .rTableRow{
    clear: both;
}
.rTableHead, .rTableFoot{
    background-color: #DDD;
    font-weight: bold;
}
.rTableCell, .rTableHead {

    float: left;
    overflow: hidden;
    padding: 3px 1.8%;
    width:20%;

}
.rTable:after {
    visibility: hidden;
    display: block;
    font-size: 0;
    content: " ";
    clear: both;
    height: 0;
}

</style>

<!-- SECTION -->
<div class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->

            <!-- Order Details -->
            <div class="col-md-5 order-details" style="width: 100%;">
                <div class="section-title text-center">
                    <h3 class="title">Your Order</h3>
                </div>
                @if(Auth::check())
                    <cart-summary :user="1" :userdata="{{ Auth::user() }}" :token="{{ csrf_token() }}"></cart-summary>
                @else
                    <cart-summary :user="0"></cart-summary>
                @endif
                 @if(!Auth::check())
        <div class="row">
        <div class="col-md-6">
            <form method="post" id="loginForm" action="{{ route('user.login') }}">
                {{csrf_field()}}
                    <div class="billing-details">
                        <div class="section-title">
                            <h3 class="title">User Login</h3>
                        </div>
                        <div class="form-group">
                            <input class="input" type="email" name="email" id="email" placeholder="Email" value="john@examle.com">
                        </div>
                        <div class="form-group">
                            <input class="input" type="password" name="password" id="pass" placeholder="Password" value="12345">
                        </div>
                        <input type="submit" class="primary-btn order-submit" value="Sign In"/>
                    </div>
            </form>
        </div>
            <div class="col-md-6">
                <form id="signupForm" method="post" action="{{ route('user.register') }}">
                    {{csrf_field()}}
                        <div class="billing-details">
                            <div class="section-title">
                                <h3 class="title">SIGN UP</h3>
                            </div>

                            <div class="form-group ">
                                <input class="input" type="text" name="name" id="name" placeholder="Full Name">
                            </div>
                            {!! $errors->first('name', '<label class="error">:message</label>') !!}

                            <div class="form-group">
                                <input class="input" type="email" name="email" id="email" placeholder="Email" onkeyup="myFunction()">
                            </div>
                            <div id="for_duplicate-email"></div>
                            {!! $errors->first('email', '<label class="error">:message</label>') !!}
                            <div class="form-group">
                                <input class="input" type="text" name="address" id="address" placeholder="Address">
                            </div>
                            {!! $errors->first('address', '<label class="error">:message</label>') !!}
                            <div class="form-group">
                                <input class="input" type="text" name="city" id="city" placeholder="City">
                            </div>
                            {!! $errors->first('city', '<label class="error">:message</label>') !!}
                            <div class="form-group">
                                <input class="input" type="text" name="zip" id="zip" placeholder="ZIP Code">
                            </div>
                            {!! $errors->first('zip', '<label class="error">:message</label>') !!}
                            <div class="form-group">
                                <input class="input" type="tel" name="tel" id="tel" placeholder="Telephone">
                            </div>
                            {!! $errors->first('tel', '<label class="error">:message</label>') !!}
                            <div class="form-group">
                                <input class="input" type="password" name="pass" id="pass" placeholder="Enter Your Password">
                            </div>
                            {!! $errors->first('pass', '<label class="error">:message</label>') !!}
                            <div class="form-group">
                                <input class="input" type="password" name="confirm_password" id="confirm_password" placeholder="Confirm Password">
                            </div>
                            {!! $errors->first('confirm_password', '<label class="error">:message</label>') !!}


                            <br>

                            <input type="submit"  name="signup" class="primary-btn order-submit" value="Sign Up"/>
                        </div>
                </form>
            </div>
               </div>

            @endif




            <!-- /Order Details -->

        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- /SECTION -->
@endsection
