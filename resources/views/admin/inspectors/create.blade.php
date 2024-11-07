@extends('layouts.admin')
@section('content')
<div class="row row-sm">
    <div class="col-md-12 col-xl-12 col-xs-12 col-sm-12">
        <div class="card border custom-card">
            <div class="card-header custom-card-header">
                <h5 class="main-content-label mb-0">
                    {{ trans('cruds.create') }} {{ trans('cruds.inspector') }}
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
                <form action="{{ route("admin.inspector.store") }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group {{ $errors->has('inspector_code') ? 'has-error' : '' }}">
                                <p class="mg-b-10 tx-semibold">{{ trans('cruds.inspector_code') }} (<span
                                        class="required">*</span>)</p>
                                <input type="text" id="inspector_code" name="inspector_code" data-model="Inspector"
                                    data-prefix="IN" data-update_id="{{ isset($inspector) ? $inspector->id : 0 }}"
                                    class="form-control unique_code" placeholder="{{ trans('cruds.inspector_code') }}"
                                    value="{{ old('inspector_code', isset($inspector) ? $inspector->inspector_code : '') }}"
                                    required>
                                @if($errors->has('inspector_code'))
                                <em class="invalid-feedback">
                                    {{ $errors->first('inspector_code') }}
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
                            <div class="form-group">
                                <p class="mg-b-10 tx-semibold">{{__('cruds.section_name')}} (<span
                                        class="required">*</span>)
                                </p>
                                <select id="section_id" name="section_id" class="form-control select2" required>
                                    <?=options('sections', array(), array(), 'id', 'section_name', 'id', 'asc', trans('cruds.select'), isset($inspector) ? $inspector->section_id : 0)?>
                                </select>
                                @if($errors->has('section_id'))
                                <em class="invalid-feedback">
                                    {{ $errors->first('section_id') }}
                                </em>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group {{ $errors->has('inspector_name') ? 'has-error' : '' }}">
                                <p class="mg-b-10 tx-semibold">{{ trans('cruds.inspector_name') }} (<span
                                        class="required">*</span>)</p>
                                <input type="text" id="inspector_name" name="inspector_name" class="form-control"
                                    placeholder="{{ trans('cruds.inspector_name') }}"
                                    value="{{ old('inspector_name', isset($inspector) ? $inspector->inspector_name : '') }}"
                                    required>
                                @if($errors->has('inspector_name'))
                                <em class="invalid-feedback">
                                    {{ $errors->first('inspector_name') }}
                                </em>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group {{ $errors->has('contact_no') ? 'has-error' : '' }}">
                                <p class="mg-b-10 tx-semibold">{{ trans('cruds.contact_no') }}</p>
                                <input type="text" id="contact_no" name="contact_no" class="form-control"
                                    placeholder="{{ trans('cruds.contact_no') }}"
                                    value="{{ old('contact_no', isset($inspector) ? $inspector->contact_no : '') }}">
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
                                    value="{{ old('email', isset($inspector) ? $inspector->email : '') }}">
                                @if($errors->has('email'))
                                <em class="invalid-feedback">
                                    {{ $errors->first('email') }}
                                </em>
                                @endif
                            </div>
                        </div>

                        <div class="col-md-3">
                            <input type="hidden" name="update_id" id="update_id"
                                value="{{ isset($inspector)?$inspector->id:0 }}">
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