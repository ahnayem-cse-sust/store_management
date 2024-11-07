@extends('layouts.app')
@section('content')

<style>
.switch-field {
    display: flex;
    overflow: hidden;
}

.switch-field input {
    position: absolute !important;
    clip: rect(0, 0, 0, 0);
    height: 1px;
    width: 1px;
    border: 0;
    overflow: hidden;
}

.switch-field label {
    background-color: #e4e4e4;
    color: rgba(0, 0, 0, 0.6);
    font-size: 14px;
    line-height: 1;
    text-align: center;
    padding: 8px 16px;
    margin-right: -1px;
    border: 1px solid rgba(0, 0, 0, 0.2);
    box-shadow: inset 0 1px 3px rgba(0, 0, 0, 0.3), 0 1px rgba(255, 255, 255, 0.1);
    transition: all 0.1s ease-in-out;
}

.switch-field label:hover {
    cursor: pointer;
}

.switch-field input:checked+label {
    background-color: #a5dc86;
    box-shadow: none;
}

.switch-field label:first-of-type {
    border-radius: 4px 0 0 4px;
}

.switch-field label:last-of-type {
    border-radius: 0 4px 4px 0;
}

/* This is just for CodePen. */
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
                                    <img src="/assets/images/logo.png"
                                        class=" d-lg-none header-brand-img text-start float-start mb-4 dark-logo"
                                        alt="logo">
                                    <img src="/assets/images/logo-light.png"
                                        class=" d-lg-none header-brand-img text-start float-start mb-4 light-logo"
                                        alt="logo">
                                </div>
                                <div class="clearfix"></div>
                                <h2 class="text-start mb-2">{{ trans('panel.site_title') }} Sign Up</h2>
                                <p class="mb-4 text-muted tx-13 ms-0 text-start">It's Free to Sign up and only takes a
                                    minute.</p>
                                <form method="POST" action="{{ route('register') }}">
                                    {{ csrf_field() }}
                                    <div class="form-group text-start">
                                        <div>
                                            <div class="switch-field">
                                                <input type="radio" id="radio-three" name="role_id" value="5" checked />
                                                <label for="radio-three">Student</label>
                                                <input type="radio" id="radio-one" name="role_id" value="3" />
                                                <label for="radio-one">Counsellor</label>
                                                <!-- <input type="radio" id="radio-two" name="role_id" value="4" />
                                                <label for="radio-two">Agent</label> -->
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group text-start">
                                        <input type="hidden" id="url-load" value="{{route('crud.load')}}">
                                        <input type="hidden" id="valueColumn" value="id">
                                        <input type="hidden" id="displayColumn" value="name">
                                        <input type="hidden" id="targetHTML" value="counsellor_id">

                                        <label class="tx-medium">Branch (<span class="required">*</span>)</label>
                                        <select name="branch_id" id="branch_id"
                                            class="form-control select2 options {{ $errors->has('email') ? ' is-invalid' : '' }}"
                                            autofocus>
                                            <?= options('branches', array(), array(), 'id', 'branch_name', 'id', 'asc', trans('cruds.select'), old('branch_id')) ?>
                                        </select>
                                        @if($errors->has('branch_id'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('branch_id') }}
                                        </div>
                                        @endif
                                    </div>
                                    <div class="form-group text-start">
                                        <label class="tx-medium">Counsellor (<span class="required">*</span>)</label>
                                        <select name="counsellor_id" id="counsellor_id"
                                            class="form-control select2 {{ $errors->has('email') ? ' is-invalid' : '' }}">
                                            <option value="">--Select--</option>
                                        </select>
                                        @if($errors->has('counsellor_id'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('counsellor_id') }}
                                        </div>
                                        @endif
                                    </div>
                                    <!--  <div class="form-group text-start">
                                        <label class="tx-medium">Name (<span class="required">*</span>)</label>
                                        <input name="name"
                                            class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}"
                                            type="text" required placeholder="{{ trans('cruds.user_name') }}"
                                            value="{{ old('name', null) }}">
                                        @if($errors->has('name'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('name') }}
                                        </div>
                                        @endif
                                    </div> -->
                                    <div class="form-group text-start">
                                        <label class="tx-medium">Email (<span class="required">*</span>)</label>
                                        <input name="email"
                                            class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}"
                                            placeholder="{{ trans('cruds.login_email') }}"
                                            value="{{ old('email', null) }}" type="email" autocomplete="username">
                                        @if($errors->has('email'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('email') }}
                                        </div>
                                        @endif
                                    </div>
                                    <div class="form-group text-start">
                                        <label class="tx-medium">Password (<span class="required">*</span>)</label>
                                        <input name="password"
                                            class="form-control border-end-0 {{ $errors->has('password') ? ' is-invalid' : '' }}"
                                            autocomplete="new-password" type="password" data-bs-toggle="password"
                                            placeholder="{{ trans('cruds.login_password') }}">
                                        @if($errors->has('password'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('password') }}
                                        </div>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <button class="btn btn-primary btn-block" type="submit">Create Account</button>
                                    </div>
                                </form>
                                <div class="text-start mt-4 ms-0 mb-3">
                                    <p class="mb-0">Already have an account? <a href="/login/">Sign In</a></p>
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
                    <div class="mt-4 pt-5 p-2 pos-relative">
                        <img src="/assets/images/logo-light.png" class="header-brand-img mb-3 mt-3" alt="logo">
                        <div class="clearfix"></div>
                        <img src="/assets/images/user.png" class="ht-250 mb-0" alt="user">
                        <h2 class="mt-4 text-white tx-normal">Create Your Account</h2>
                        <span class="tx-white-6 tx-13 mb-5 mt-xl-0">It's Free to Sign up and only takes a minute</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END ROW -->

@endsection