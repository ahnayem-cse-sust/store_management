@extends('layouts.app')
@section('content')
<style>
    .custom-radio{
        display: inline!important;
        padding-right: 20px;
    }
</style>
<!-- ROW -->
<div class="row signpages text-center">
    <div class="col-md-12">
        <div class="card card-border">
            <div class="row row-sm">
                <div class="col-lg-6 col-xl-6 col-xs-12 col-sm-12 login_form rounded-start-11">
                    <div class="container-fluid">
                        <div class="row row-sm">
                            <div class="card-body mt-2 mb-2">
                                <div class="mobilelogo">
                                    <img src="/assets/images/bin_ameer_tour_group.png"
                                        class=" d-lg-none header-brand-img text-start float-start mb-4 dark-logo"
                                        alt="logo">
                                    <img src="/assets/images/bin_ameer_tour_group.png"
                                        class=" d-lg-none header-brand-img text-start float-start mb-4 light-logo"
                                        alt="logo">
                                </div>
                                <div class="clearfix"></div>
                                <form id="frmLogin" method="POST" action="{{ route('post-login') }}">
                                    {{ csrf_field() }}
                                    <h2 class="text-start mb-2">{{ trans('cruds.site_title') }}</h2>
                                    <p class="mb-4 text-muted tx-13 ms-0 text-start">Use your credentials to login into
                                        account.</p>
                                    <div class="panel desc-tabs border-0 p-0">
                                        <!-- <div class="tab-menu-heading">
                                            <div class="tabs-menu ">
                                                <ul class="nav panel-tabs">
                                                    <li class>
                                                        <a href="#tab01" class="active" data-bs-toggle="tab">Email</a>
                                                    </li>
                                                    <li>
                                                        <a href="#tab02" data-bs-toggle="tab">Mobile No</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div> -->
                                        <div class="panel-body tabs-menu-body mt-2">
                                            <div class="tab-content">
                                                <div class="tab-pane active" id="tab01">
                                                    <div class="form-group text-start otpDiv" style="display:none;">
                                                        <label class="tx-medium">{{ __('cruds.verification_code') }}</label>
                                                        <input type="text" name="your_otp" id="your_otp" class="form-control" >
                                                    </div>
                                                    <div class="form-group text-start" >
                                                        <label class="tx-medium">{{ __('cruds.email') }}</label>
                                                        <div class="input-group">
                                                            
                                                            <input
                                                                class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}"
                                                                placeholder="Enter your email" type="email" name="email" id="email"
                                                                autocomplete="email" required>
                                                            <div class="input-group-append" style="cursor: pointer;">
                                                                <button tabindex="100"
                                                                    class="btn btn-light" type="button">
                                                                    <i class="fa fa-envelope">

                                                                    </i></button>
                                                            </div>
                                                            @if($errors->has('email'))
                                                            <div class="invalid-feedback">
                                                                {{ $errors->first('email') }}
                                                            </div>
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <div class="form-group text-start">
                                                        <label class="tx-medium">{{ __('cruds.password') }}</label>
                                                        <div class="input-group">
                                                            <input
                                                                class="form-control border-end-0 {{ $errors->has('password') ? ' is-invalid' : '' }}"
                                                                placeholder="Enter your password" type="password"
                                                                name="password" id="password" autocomplete="password" required>
                                                            <div class="invalid-feedback">
                                                                {{ $errors->first('password') }}
                                                            </div>
                                                            <div class="input-group-append" style="cursor: pointer;">
                                                                <button tabindex="100"
                                                                    title="Click here to show/hide password"
                                                                    class="btn btn-light " type="button">
                                                                    <i  id="toggleBtn" class="fa fa-eye">

                                                                    </i></button>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <button type="submit" id="submit" class="btn btn-primary btn-block">{{ __('cruds.login') }}</button>
                                                </div>
                                                <div class="tab-pane" id="tab02">
                                                    <div id="mobile-num" class="validate-input input-group mb-2">
                                                        <a href="javascript:;"
                                                            class="input-group-text bg-light text-muted">
                                                            <span>+91</span>
                                                        </a>
                                                        <input class="form-control" type="number"
                                                            placeholder="Enter your mobile number">
                                                    </div>
                                                    <div id="login-otp" class="justify-content-around mb-4">
                                                        <input class="form-control text-center me-2" id="txt1"
                                                            maxlength="1">
                                                        <input class="form-control text-center me-2" id="txt2"
                                                            maxlength="1">
                                                        <input class="form-control text-center me-2" id="txt3"
                                                            maxlength="1">
                                                        <input class="form-control text-center" id="txt4" maxlength="1">
                                                    </div>
                                                    <span>Note : Login with registered mobile number to generate
                                                        OTP.</span>
                                                    <div class="mt-3 text-start">
                                                        <a href="javascript:;" class="btn btn-primary w-lg"
                                                            id="generate-otp">Proceed</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                <div class="text-start mt-4 ms-0 mb-3 d-none">
                                    <!--  <div class="mb-1"><a href="https://laravel8.spruko.com/dashplex/forgot">Forgot
                                            password?</a></div> -->
                                    <div>Don't have an account? <a href="/register/">Register Here</a>
                                    </div>
                                </div>
                                <!-- <div class="signin-or-title">
                                    <h5 class="fs-12 mb-1 title tx-normal">or</h5>
                                </div>
                                <div class="pb-1 pt-4">
                                    <div class="text-center socialicons">
                                        <a href="https://myaccount.google.com/" target="_blank"
                                            class="btn ripple btn-danger-transparent rounded-circle" role="button"><i
                                                class="mdi mdi-google"></i></a>
                                        <a href="https://www.facebook.com/" target="_blank"
                                            class="btn ripple btn-primary-transparent rounded-circle" role="button"><i
                                                class="mdi mdi-facebook"></i></a>
                                        <a href="https://twitter.com/" target="_blank"
                                            class="btn ripple btn-info-transparent rounded-circle" role="button"><i
                                                class="mdi mdi-twitter"></i></a>
                                    </div>
                                </div> -->
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-xl-6 d-none d-lg-block text-center bg-primary details rounded-end-11">
                    <div class="mt-4 pt-4 p-2 pos-relative">
                        @php
                            $company = \App\Company::where('id',1)->first();
                            $imgUrl = "/assets/images/logo-light.png";
                            if(checkExist($company->company_logo)){
                                $imgUrl = $company->company_logo ;
                            }
                        @endphp
                        <img src="{{ $imgUrl }}" class="header-brand-img mb-3 mt-3" style="border-radius:100%;width:100px;" alt="logo">
                        <div class="clearfix"></div>
                        <img src="/assets/images/user.png" class="ht-250 mb-0" alt="user">
                        <h2 class="mt-4 text-white tx-normal">Sign In Your Account</h2>
                        <span class="tx-white-6 tx-13 mb-5 mt-xl-0">Sign in to Create, Discover and Connect with
                            the cruds Community</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END ROW -->
@endsection
@section('scripts')
@parent
<script>
    function sendOTP() {
        let email,password,otp_type;
        email = $('#email').val();
        password = $('#password').val() ;
        otp_type = $('input[name="otp_type"]:checked').val();
        formUrl = "{{ route('send-otp') }}" ;
        formData = { email:email,password:password,otp_type:otp_type};
        $.ajax({
            headers: {
                'x-csrf-token': $('meta[name="csrf-token"]').attr('content')
            },
            method: 'POST',
            data: formData,
            dataType : 'json',
            url: formUrl
        }).done(function(response) {
                if(response.key !== 2){
                        Swal.fire({
                        title: response.msg,
                        icon: 'info',
                        showClass: {
                            popup: 'animate__animated animate__fadeInDown'
                        },
                        hideClass: {
                            popup: 'animate__animated animate__fadeOutUp'
                        }
                    })
             }else{
                $('.credentialDiv').hide(1000);
                $('#btnOtp').hide(1000);
                $('.otpDiv').show(1000);
                $('#submit').show(1000);
                $('#otp').val(response.msg);
            } 
        })

    }
    $(document).on('submit','#frmLogin',function (e) {
        e.preventDefault();
        let formUrl,formData;
        formUrl = $(this).attr('action');
        formData = $(this).serialize();
        $.ajax({
            headers: {
                'x-csrf-token': $('meta[name="csrf-token"]').attr('content')
            },
            method: 'POST',
            data: formData,
            dataType : 'json',
            url: formUrl
        }).done(function(response) {
            if(response.key !== 2){
                    Swal.fire({
                        title: response.msg,
                        icon: 'info',
                        showClass: {
                            popup: 'animate__animated animate__fadeInDown'
                        },
                        hideClass: {
                            popup: 'animate__animated animate__fadeOutUp'
                        }
                    })
             }else{
                location.reload();
            } 
        })
    })
</script>
@endsection