@extends('store.storeLayout')
@section('content')
<script src="{{asset('js/lib/jquery.js')}}"></script>
<script src="{{asset('js/dist/jquery.validate.js')}}"></script>

<style>
label.error {
  color: #a94442;
  background-color: #f2dede;
  border-color: #ebccd1;
  padding:1px 20px 1px 20px;
}</style>
<!-- SECTION -->
<div class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
        <form method="post" id="loginForm" action="{{ route('user.login') }}">
            {{csrf_field()}}
            <div class="col-md-6" style="float: none;">
                <!-- Billing Details -->
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
            </div>
                </form>

                @if(session('message'))


                <tr>
                    <td>
                        <li> {{session('message')}}</li>
                    </td>
                </tr>


                @endif

                @if($errors->any())

                                    <ul>
                                        @foreach($errors->all() as $err)
                                        <tr>
                                            <td>
                                                <li>{{$err}}</li>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </ul>
                                    @endif

                </div>
                <!-- /Billing Details -->
            </div>

        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!--/JQUERY Validation-->
<!-- /SECTION -->
@endsection
