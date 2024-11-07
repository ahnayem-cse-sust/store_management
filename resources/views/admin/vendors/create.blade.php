@extends('layouts.admin')
@section('content')
<div class="row row-sm">
    <div class="col-md-12 col-xl-12 col-xs-12 col-sm-12">
        <div class="card border custom-card">
            <div class="card-header custom-card-header">
                <h5 class="main-content-label mb-0">
                    {{ trans('cruds.create') }} {{ trans('cruds.vendor') }}
                </h5>
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
                <form action="{{ route("admin.vendor.store") }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group {{ $errors->has('vendor_code') ? 'has-error' : '' }}">
                                <p class="mg-b-10 tx-semibold">{{ trans('cruds.vendor_code') }} (<span
                                        class="required">*</span>)</p>
                                <input type="text" id="vendor_code" name="vendor_code" data-model="Vendor" data-prefix="SP" data-update_id="{{ isset($vendor) ? $vendor->id : 0 }}" class="form-control unique_code"
                                    placeholder="{{ trans('cruds.vendor_code') }}"
                                    value="{{ old('vendor_code', isset($vendor) ? $vendor->vendor_code : '') }}" required>
                                @if($errors->has('vendor_code'))
                                <em class="invalid-feedback">
                                    {{ $errors->first('vendor_code') }}
                                </em>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group {{ $errors->has('vendor_name') ? 'has-error' : '' }}">
                                <p class="mg-b-10 tx-semibold">{{ trans('cruds.vendor_name') }} (<span
                                        class="required">*</span>)</p>
                                <input type="text" id="vendor_name" name="vendor_name" class="form-control"
                                    placeholder="{{ trans('cruds.vendor_name') }}"
                                    value="{{ old('vendor_name', isset($vendor) ? $vendor->vendor_name : '') }}" required>
                                @if($errors->has('vendor_name'))
                                <em class="invalid-feedback">
                                    {{ $errors->first('vendor_name') }}
                                </em>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group {{ $errors->has('address') ? 'has-error' : '' }}">
                                <p class="mg-b-10 tx-semibold">{{ trans('cruds.address') }}</p>
                                <input type="text" id="address" name="address" class="form-control"
                                    placeholder="{{ trans('cruds.address') }}"
                                    value="{{ old('address', isset($vendor) ? $vendor->address : '') }}">
                                @if($errors->has('address'))
                                <em class="invalid-feedback">
                                    {{ $errors->first('address') }}
                                </em>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group {{ $errors->has('contact_person') ? 'has-error' : '' }}">
                                <p class="mg-b-10 tx-semibold">{{ trans('cruds.contact_person') }}</p>
                                <input type="text" id="contact_person" name="contact_person" class="form-control"
                                    placeholder="{{ trans('cruds.contact_person') }}"
                                    value="{{ old('contact_person', isset($vendor) ? $vendor->contact_person : '') }}">
                                @if($errors->has('contact_person'))
                                <em class="invalid-feedback">
                                    {{ $errors->first('contact_person') }}
                                </em>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group {{ $errors->has('contact_no') ? 'has-error' : '' }}">
                                <p class="mg-b-10 tx-semibold">{{ trans('cruds.contact_no') }}</p>
                                <input type="text" id="contact_no" name="contact_no" class="form-control"
                                    placeholder="{{ trans('cruds.contact_no') }}"
                                    value="{{ old('contact_no', isset($vendor) ? $vendor->contact_no : '') }}">
                                @if($errors->has('contact_no'))
                                <em class="invalid-feedback">
                                    {{ $errors->first('contact_no') }}
                                </em>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                                <p class="mg-b-10 tx-semibold">{{ trans('cruds.email') }}</p>
                                <input type="text" id="email" name="email" class="form-control"
                                    placeholder="{{ trans('cruds.email') }}"
                                    value="{{ old('email', isset($vendor) ? $vendor->email : '') }}">
                                @if($errors->has('email'))
                                <em class="invalid-feedback">
                                    {{ $errors->first('email') }}
                                </em>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-3">
                        <div class="form-group">
                            <p class="mg-b-10 tx-semibold">{{__('cruds.branch_name')}} (<span
                                    class="required">*</span>)
                            </p>
                            <select id="branch_id" name="branch_id" class="form-control select2" required>
                                <?=options('branches', array(), array(), 'id', 'short_name', 'id', 'asc', trans('cruds.select'), 1)?>
                            </select>
                            @if($errors->has('branch_id'))
                            <em class="invalid-feedback">
                                {{ $errors->first('branch_id') }}
                            </em>
                            @endif
                        </div>
                        </div>
                        <div class="col-md-3">
                            <input type="hidden" name="update_id" id="update_id" value="{{ isset($vendor)?$vendor->id:0 }}">
                            <input class="btn btn-danger mt-4" type="submit" value="{{ trans('cruds.save') }}">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
@parent
<script>

</script>
@endsection