@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('cruds.create') }} {{ trans('cruds.role.title_singular') }}
    </div>
    <style>
    .form-check-label {
        text-transform: capitalize;
    }
    </style>

    <div class="card-body">
        <form action="{{ route("admin.roles.store") }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
                <label for="title">{{ trans('cruds.role.fields.title') }} (<span class="required">*</span>) </label>
                <input type="text" id="title" name="title" class="form-control"
                    value="{{ old('title', isset($role) ? $role->title : '') }}" required>
                <input type="hidden" name="update_id" id="update_id" value="{{isset($role)?$role->id:0}}">
                @if($errors->has('title'))
                <em class="invalid-feedback">
                    {{ $errors->first('title') }}
                </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.role.fields.title_helper') }}
                </p>
            </div>

            <div class="row">
                <div class="col-md-2">&nbsp;</div>
                <div class="col-md-2">{{__('cruds.access')}}</div>
                <div class="col-md-2">{{__('cruds.create')}}</div>
                <div class="col-md-2">{{__('cruds.edit')}}</div>
                <div class="col-md-2">{{__('cruds.delete')}}</div>
                <div class="col-md-2">{{__('cruds.show')}}</div>
            </div>
            @php
            $lang = session('language');
            if (!isset($lang) || empty($lang)) {
            $lang = 'en';
            }
            @endphp

            @foreach($permissions as $key=>$permission)
            <div class="row">
                @php $checked = '';
                if (isset($role)) {
                if (in_array($permission->p_id, $rolePermissions)) {
                $checked = 'checked';
                } else {
                $checked = '';
                }
                }
                @endphp
                <div class="col-md-12">
                    <div class="form-check">
                        <input {{$checked}} class="form-check-input root_parent_menu_{{$permission->menu_id}}"
                            data-menu_id="{{$permission->menu_id}}" data-menu_type="main_menu" type="checkbox"
                            value="{{$permission->p_id}}" name="permission_id[]" id="permissions_{{$permission->p_id}}">
                        <label class="form-check-label" for="permissions_{{$permission->p_id}}">
                            {{$permission->$lang}}
                        </label>
                    </div>
                </div>
            </div>
            @if(count($permission->sub_permissions))
            <div class="row" style="margin-left: 10px;">
                @foreach($permission->sub_permissions as $sub_permission)
                @php $checked = '';
                if (isset($role)) {
                if (in_array($sub_permission->p_id, $rolePermissions)) {
                $checked = 'checked';
                } else {
                $checked = '';
                }
                }
                @endphp
                <div class="col-md-2">
                    <div class="form-check">
                        <input {{$checked}}
                            class="form-check-input sub_menu_{{$sub_permission->menu_id}} main_menu_{{$permission->menu_id}} parent_menu_{{$permission->menu_id}}"
                            type="checkbox" data-menu_id="{{$sub_permission->menu_id}}" data-menu_type="sub_menu"
                            value="{{$sub_permission->p_id}}" name="permission_id[]"
                            id="permissions_{{$sub_permission->p_id}}">
                        <label class="form-check-label" for="permissions_{{$sub_permission->p_id}}">
                            {{$sub_permission->$lang}}
                        </label>
                    </div>
                </div>
                @foreach($sub_permission->sub_sub_permissions as $sub_sub_permission)
                @php $checked = '';
                if (isset($role)) {
                if (in_array($sub_sub_permission->id, $rolePermissions)) {
                $checked = 'checked';
                } else {
                $checked = '';
                }
                }
                @endphp
                <div class="col-md-2">
                    <div class="form-check">
                        <input {{$checked}}
                            class="form-check-input sub_menu_{{$sub_sub_permission->menu_id}} main_menu_{{$permission->menu_id}} parent_menu_{{$permission->menu_id}}"
                            type="checkbox" value="{{$sub_sub_permission->id}}" name="permission_id[]"
                            id="permissions_{{$sub_sub_permission->id}}">
                        <label class="form-check-label" for="permissions_{{$sub_sub_permission->id}}"
                            style="display:none;">
                            {{str_replace('_',' ',$sub_sub_permission->title)}}
                        </label>
                    </div>
                </div>
                @endforeach

                @endforeach
            </div>
            @endif

            @endforeach
            <div>
                <input class="btn btn-danger" type="submit" value="{{ trans('cruds.save') }}">
            </div>
        </form>
    </div>
</div>
@endsection
@section('scripts')
@parent
<script>
$(function() {
    $(document).on("click", "input[type=checkbox]", function() {
        let elm, idmenu_type, main_menu;
        elm = $(this);
        id = elm.data('menu_id');
        menu_type = elm.data('menu_type');
        if (menu_type) {
            $('.' + menu_type + '_' + id).not(this).prop('checked', this.checked);
        }
        main_menu = $(this).attr('class').split(' ')[3];
        // $('.root_' + main_menu).not(this).prop('checked', this.checked);
    })
})
</script>
@endsection