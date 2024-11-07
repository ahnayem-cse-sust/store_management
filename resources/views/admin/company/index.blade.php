@extends('layouts.admin')
@section('content')

<style>
.dropify-wrapper {
    height: 60px !important;
}
</style>

<div class="row row-sm">
    <div class="col-md-12 col-xl-12 col-xs-12 col-sm-12">
        <div class="card border custom-card">
            <div class="card-header custom-card-header">
                <h5 class="main-content-label mb-0">{{ trans('cruds.create') }}
                    {{ trans('cruds.company') }}</h5>
                <div class="card-options">
                    <a href="javascript:;" class="card-options-collapse py-0" data-bs-toggle="card-collapse"><i
                            class="fe fe-chevron-up"></i></a>
                    <a href="javascript:;" class="card-options-fullscreen py-0" data-bs-toggle="card-fullscreen"><i
                            class="fe fe-maximize"></i></a>
                    <a href="javascript:;" class="card-options-remove py-0" data-bs-toggle="card-remove"><i
                            class="fe fe-x"></i></a>
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.company.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row row-sm">
                        <div class="col-md-4">
                            <div class="form-group">
                                <p class="mg-b-10 tx-semibold">{{__('cruds.company_name')}} (<span
                                        class="required">*</span>)
                                </p>
                                <input type="text"
                                    class="form-control  {{ $errors->has('company_name') ? 'is-invalid' : '' }}"
                                    name="company_name" id="company_name" placeholder="{{__('cruds.company_name')}}"
                                    value="{{isset($company)?$company->company_name:''}}" required>
                                @if($errors->has('company_name'))
                                <em class="invalid-feedback">
                                    {{ $errors->first('company_name') }}
                                </em>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <p class="mg-b-10 tx-semibold">{{__('cruds.email_address')}} (<span
                                        class="required">*</span>)
                                </p>
                                <input type="text"
                                    class="form-control  {{ $errors->has('email_address') ? 'is-invalid' : '' }}"
                                    name="email_address" id="email_address" placeholder="{{__('cruds.email_address')}}"
                                    value="{{isset($company)?$company->email_address:''}}" required>
                                @if($errors->has('email_address'))
                                <em class="invalid-feedback">
                                    {{ $errors->first('email_address') }}
                                </em>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <p class="mg-b-10 tx-semibold">{{__('cruds.website')}} (<span class="required">*</span>)
                                </p>
                                <input type="text"
                                    class="form-control  {{ $errors->has('website') ? 'is-invalid' : '' }}"
                                    name="website" id="website" placeholder="{{__('cruds.website')}}"
                                    value="{{isset($company)?$company->website:''}}" required>
                                @if($errors->has('website'))
                                <em class="invalid-feedback">
                                    {{ $errors->first('website') }}
                                </em>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="row row-sm">
                        <div class="col-md-4">
                            <div class="form-group">
                                <p class="mg-b-10 tx-semibold">{{__('cruds.company_address')}} (<span
                                        class="required">*</span>)
                                </p>
                                <input type="text"
                                    class="form-control  {{ $errors->has('company_address') ? 'is-invalid' : '' }}"
                                    name="company_address" id="company_address"
                                    placeholder="{{__('cruds.company_address')}}"
                                    value="{{isset($company)?$company->company_address:''}}" required>
                                @if($errors->has('company_address'))
                                <em class="invalid-feedback">
                                    {{ $errors->first('company_address') }}
                                </em>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <p class="mg-b-10 tx-semibold">{{__('cruds.company_logo')}} (<span
                                        class="required">*</span>)
                                </p>
                                <input type="file"
                                    class="dropify form-control  {{ $errors->has('company_logo') ? 'is-invalid' : '' }}"
                                    name="company_logo" id="company_logo" placeholder="{{__('cruds.company_logo')}}"
                                    value="{{isset($company)?$company->company_logo:''}}"
                                    data-default-file="{{asset($company->company_logo)}}">
                                @if($errors->has('company_logo'))
                                <em class="invalid-feedback">
                                    {{ $errors->first('company_logo') }}
                                </em>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <input type="hidden" name="update_id" id="update_id" value="{{isset($company)?$company->id:0}}">
                        <button class="btn ripple btn-warning update" type="submit">{{__('cruds.submit')}}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection