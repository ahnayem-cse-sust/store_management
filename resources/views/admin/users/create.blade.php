@extends('layouts.admin')
@section('content')
<div class="row row-sm">
    <div class="col-md-12 col-xl-12 col-xs-12 col-sm-12">
        <div class="card border custom-card">
            <div class="card-header custom-card-header">
                <h5 class="main-content-label mb-0">
                    {{ trans('cruds.create') }} {{ trans('cruds.user') }}
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
                <form action="{{ route("admin.users.store") }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group {{ $errors->has('user_code') ? 'has-error' : '' }}">
                                <label for="user_code">{{ trans('cruds.user_code') }} (<span
                                        class="required">*</span>)</label>
                                <input type="text" id="user_code" name="user_code"  data-model="User" data-prefix="EMP" data-update_id="{{ isset($user) ? $user->user_code : 0 }}"  class="form-control unique_code"
                                    value="{{ old('user_code', isset($user) ? $user->user_code : '') }}" required>
                                @if($errors->has('user_code'))
                                <em class="invalid-feedback">
                                    {{ $errors->first('user_code') }}
                                </em>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group {{ $errors->has('roles') ? 'has-error' : '' }}">
                                <label for="roles">{{ trans('cruds.user_role') }} (<span class="required">*</span>)
                                    
                                </label>
                                <select name="roles[]" id="roles" class="form-control select2" required>
                                    <option value="">--Select--</option>
                                    @foreach($roles as $id => $roles)
                                    <option value="{{ $id }}"
                                        {{ (in_array($id, old('roles', [])) || isset($user) && $user->roles->contains($id)) ? 'selected' : '' }}>
                                        {{ $roles }}
                                    </option>
                                    @endforeach
                                </select>
                                @if($errors->has('roles'))
                                <em class="invalid-feedback">
                                    {{ $errors->first('roles') }}
                                </em>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group {{ $errors->has('acl') ? 'has-error' : '' }}">
                                <label for="acl">{{ trans('cruds.acl') }} (<span
                                        class="required">*</span>)
                                    <span class="btn btn-info btn-xs select-all">{{ trans('cruds.select_all') }}</span>
                                    <span class="btn btn-info btn-xs deselect-all">{{ trans('cruds.deselect_all') }}</span>
                                </label>
                                <select id="acl" name="acl[]" class="form-control select2-multiple" multiple required>
                                    <?=options('branches', array(), array(), 'id', 'short_name', 'id', 'asc', '', isset($user)?$user->acl:[1])?>
                                </select>
                                @if($errors->has('acl'))
                                <em class="invalid-feedback">
                                    {{ $errors->first('acl') }}
                                </em>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group {{ $errors->has('office_id') ? 'has-error' : '' }}">
                                <label for="office_id">{{ trans('cruds.entry_office') }} (<span
                                        class="required">*</span>)
                                </label>
                                <select id="office_id" name="office_id" class="form-control select2" required>
                                    <?=options('branches', array(), array(), 'id', 'short_name', 'id', 'asc', '',1)?>
                                </select>
                                @if($errors->has('office_id'))
                                <em class="invalid-feedback">
                                    {{ $errors->first('office_id') }}
                                </em>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group {{ $errors->has('section_id') ? 'has-error' : '' }}">
                                <label for="section_id">{{ trans('cruds.section') }} (<span
                                        class="required">*</span>)
                                </label>
                                <select id="section_id" name="section_id" class="form-control select2" required>
                                    <?=options('sections', array(), array(), 'id', 'section_name', 'id', 'asc', trans('cruds.select'), isset($user) ? $user->section_id : '')?>
                                </select>
                                @if($errors->has('section_id'))
                                <em class="invalid-feedback">
                                    {{ $errors->first('section_id') }}
                                </em>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                                <label for="name">{{ trans('cruds.user_name') }} (<span
                                        class="required">*</span>)</label>
                                <input type="text" id="name" name="name" class="form-control"
                                    value="{{ old('name', isset($user) ? $user->name : '') }}" required>
                                @if($errors->has('name'))
                                <em class="invalid-feedback">
                                    {{ $errors->first('name') }}
                                </em>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group {{ $errors->has('designation_id') ? 'has-error' : '' }}">
                                <label for="designation_id">{{ trans('cruds.designation') }} (<span
                                        class="required">*</span>)
                                </label>
                                <select id="designation_id" name="designation_id" class="form-control select2" required>
                                    <?=options('designations', array(), array(), 'id', 'designation_name', 'id', 'asc', trans('cruds.select'), isset($user) ? $user->designation_id : '')?>
                                </select>
                                @if($errors->has('designation_id'))
                                <em class="invalid-feedback">
                                    {{ $errors->first('designation_id') }}
                                </em>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group {{ $errors->has('epf_no') ? 'has-error' : '' }}">
                                <label for="epf_no">{{ trans('cruds.epf_no') }} (<span
                                        class="required">*</span>)</label>
                                <input type="text" id="epf_no" name="epf_no" class="form-control"
                                    value="{{ old('epf_no', isset($user) ? $user->epf_no : '') }}" required>
                                @if($errors->has('epf_no'))
                                <em class="invalid-feedback">
                                    {{ $errors->first('epf_no') }}
                                </em>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group {{ $errors->has('mobile_no') ? 'has-error' : '' }}">
                                <label for="mobile_no">{{ trans('cruds.mobile_no') }} (<span
                                        class="required">*</span>)</label>
                                <input type="text" id="mobile_no" name="mobile_no" class="form-control mobile-number"
                                    value="{{ old('mobile_no', isset($user) ? $user->mobile_no : '') }}" required>
                                @if($errors->has('name'))
                                <em class="invalid-feedback">
                                    {{ $errors->first('mobile_no') }}
                                </em>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                                <label for="email">{{ trans('cruds.email') }} (<span class="required">*</span>)
                                </label>
                                <input type="email" id="email" name="email" class="form-control"
                                    value="{{ old('email', isset($user) ? $user->email : '') }}" required>
                                @if($errors->has('email'))
                                <em class="invalid-feedback">
                                    {{ $errors->first('email') }}
                                </em>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
                                <label for="password">{{ trans('cruds.password') }} (<span
                                        class="required">*</span>)</label>
                                <input type="password" id="password" name="password" value="{{ isset($user)?$user->human_password:'' }}" class="form-control" required>
                                @if($errors->has('password'))
                                <em class="invalid-feedback">
                                    {{ $errors->first('password') }}
                                </em>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group {{ $errors->has('signature') ? 'has-error' : '' }}">
                                <label for="signature">{{ trans('cruds.signature') }}</label>
                                <input type="file" name="signature" id="signature"
                                    class="form-control">
                                @if($errors->has('signature'))
                                <em class="invalid-feedback">
                                    {{ $errors->first('signature') }}
                                </em>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group {{ $errors->has('profile_photo') ? 'has-error' : '' }}">
                                <label for="profile_photo">{{ trans('cruds.profile_photo') }}</label>
                                <input type="file" name="profile_photo" id="profile_photo"
                                    class="form-control">
                                @if($errors->has('profile_photo'))
                                <em class="invalid-feedback">
                                    {{ $errors->first('profile_photo') }}
                                </em>
                                @endif
                            </div>
                        </div>
                        
                        <div class="col-md-4">
                            <input type="hidden" name="update_id" id="update_id" value="{{ isset($user)?$user->id:0 }}">
                            <input class="btn btn-danger float-start mt-4" type="submit" value="{{ trans('cruds.save') }}">
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
    $(document).on('change','#acl_country',function (params) {
        let acl_country,url ;
        acl_country = $(this).val();
        acl = $('#acl');
        url = '/admin/user_management/users/get_acl_office';
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
                if(response){
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