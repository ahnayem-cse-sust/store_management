@extends('layouts.admin')
@section('content')
<div class="row row-sm">
    <div class="col-md-12 col-xl-12 col-xs-12 col-sm-12">
        <div class="card border custom-card">
            <div class="card-header custom-card-header">
                <h5 class="main-content-label mb-0">
                    {{ trans('cruds.create') }} {{ trans('cruds.party') }}
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
                <form action="{{ route("admin.party.store") }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group {{ $errors->has('party_code') ? 'has-error' : '' }}">
                                <p class="mg-b-10 tx-semibold">{{ trans('cruds.party_code') }} (<span
                                        class="required">*</span>)</p>
                                <input type="text" id="party_code" name="party_code" data-model="Party" data-prefix="PR" data-update_id="{{ isset($party) ? $party->id : 0 }}" class="form-control unique_code"
                                    placeholder="{{ trans('cruds.party_code') }}"
                                    value="{{ old('party_code', isset($party) ? $party->party_code : '') }}" required>
                                @if($errors->has('party_code'))
                                <em class="invalid-feedback">
                                    {{ $errors->first('party_code') }}
                                </em>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group {{ $errors->has('party_name') ? 'has-error' : '' }}">
                                <p class="mg-b-10 tx-semibold">{{ trans('cruds.party_name') }} (<span
                                        class="required">*</span>)</p>
                                <input type="text" id="party_name" name="party_name" class="form-control"
                                    placeholder="{{ trans('cruds.party_name') }}"
                                    value="{{ old('party_name', isset($party) ? $party->party_name : '') }}" required>
                                @if($errors->has('party_name'))
                                <em class="invalid-feedback">
                                    {{ $errors->first('party_name') }}
                                </em>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group {{ $errors->has('address') ? 'has-error' : '' }}">
                                <p class="mg-b-10 tx-semibold">{{ trans('cruds.address') }}</p>
                                <input type="text" id="address" name="address" class="form-control"
                                    placeholder="{{ trans('cruds.address') }}"
                                    value="{{ old('address', isset($party) ? $party->address : '') }}">
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
                                    value="{{ old('contact_person', isset($party) ? $party->contact_person : '') }}">
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
                                    value="{{ old('contact_no', isset($party) ? $party->contact_no : '') }}">
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
                                    value="{{ old('email', isset($party) ? $party->email : '') }}">
                                @if($errors->has('email'))
                                <em class="invalid-feedback">
                                    {{ $errors->first('email') }}
                                </em>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-3">
                            <input type="hidden" name="update_id" id="update_id" value="{{ isset($party)?$party->id:0 }}">
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
$(document).on('change', '#acl_country', function(params) {
    let acl_country, url;
    acl_country = $(this).val();
    acl = $('#acl');
    url = '/admin/party_management/partys/get_acl_office';
    select = "{{ __('cruds.select') }}";
    officeOptions = `<option value=''>${select}</option>`;
    $.ajax({
            async: false,
            headers: {
                'x-csrf-token': _token
            },
            method: 'POST',
            url: url,
            data: {
                acl_country: acl_country,
            }
        })
        .done(function(response) {
            if (response) {
                $.each(response, function(index, value) {
                    officeOptions +=
                        `<option value='${value.id}'>${value.office_name} - ${value.office_name_ar}</option>`;
                })
                acl.html(officeOptions).trigger('change');
            }
        })
})
</script>
@endsection