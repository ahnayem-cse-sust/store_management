@extends('layouts.admin')
@section('content')
<div class="row row-sm">
    <div class="col-md-4 col-xl-4 col-xs-4 col-sm-4">
        <div class="card border custom-card">
            <div class="card-header custom-card-header">
                <h5 class="main-content-label mb-0">{{ trans('cruds.create') }}
                    {{ trans('cruds.menu') }}</h5>
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
                <form id="frmMenu" action="{{ route("admin.menu.store") }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="parent_id" value="{{$parent_id}}">

                    <div class="form-group {{ $errors->has('order_no') ? 'has-error' : '' }}">
                        <label for="order_no">{{ trans('cruds.order_no') }} (<span class="required">*</span>)</label>
                        <input type="number" id="order_no" name="order_no" class="form-control"
                            placeholder="{{ trans('cruds.order_no') }}"
                            value="{{ old('menu_name', isset($menu) ? $menu->menu_name : '') }}" required>
                        @if($errors->has('order_no'))
                        <em class="invalid-feedback">
                            {{ $errors->first('order_no') }}
                        </em>
                        @endif
                    </div>
                    <div class="form-group {{ $errors->has('en') ? 'has-error' : '' }}">
                        <label for="en">{{ trans('cruds.menu_name') }} (<span class="required">*</span>)-English</label>
                        <input type="text" id="en" name="en" class="form-control"
                            placeholder="{{ trans('cruds.menu_name') }}-English"
                            value="{{ old('en', isset($menu) ? $menu->en : '') }}" required>
                        @if($errors->has('en'))
                        <em class="invalid-feedback">
                            {{ $errors->first('en') }}
                        </em>
                        @endif
                    </div>
                    <div class="form-group {{ $errors->has('ar') ? 'has-error' : '' }}">
                        <label for="ar">{{ trans('cruds.menu_name') }} (<span class="required">*</span>)-Arabic</label>
                        <input type="text" id="ar" name="ar" class="form-control"
                            placeholder="{{ trans('cruds.menu_name') }}-Arabic"
                            value="{{ old('ar', isset($menu) ? $menu->ar : '') }}" required>
                        @if($errors->has('ar'))
                        <em class="invalid-feedback">
                            {{ $errors->first('ar') }}
                        </em>
                        @endif
                    </div>
                    <div class="form-group {{ $errors->has('bn') ? 'has-error' : '' }}">
                        <label for="bn">{{ trans('cruds.menu_name') }} (<span class="required">*</span>)-Bangla</label>
                        <input type="text" id="bn" name="bn" class="form-control"
                            placeholder="{{ trans('cruds.menu_name') }}-Bangla"
                            value="{{ old('bn', isset($menu) ? $menu->bn : '') }}" required>
                        @if($errors->has('bn'))
                        <em class="invalid-feedback">
                            {{ $errors->first('bn') }}
                        </em>
                        @endif
                    </div>
                    <div class="form-group {{ $errors->has('menu_link') ? 'has-error' : '' }}">
                        <label for="menu_link">{{ trans('cruds.menu_link') }} (<span class="required">*</span>)</label>
                        <input type="text" id="menu_link" name="menu_link" class="form-control"
                            placeholder="{{ trans('cruds.menu_link') }}"
                            value="{{ old('menu_name', isset($menu) ? $menu->menu_name : '') }}" required>
                        @if($errors->has('menu_link'))
                        <em class="invalid-feedback">
                            {{ $errors->first('menu_link') }}
                        </em>
                        @endif
                    </div>
                    <div class="form-group {{ $errors->has('menu_link') ? 'has-error' : '' }}">
                        <label for="menu_icon">{{ trans('cruds.menu_icon') }} (<span class="required">*</span>)</label>
                        <input type="text" id="menu_icon" name="menu_icon" class="form-control"
                            placeholder="{{ trans('cruds.menu_icon') }}"
                            value="{{ old('menu_name', isset($menu) ? $menu->menu_name : '') }}" required>
                        @if($errors->has('menu_link'))
                        <em class="invalid-feedback">
                            {{ $errors->first('menu_icon') }}
                        </em>
                        @endif
                    </div>
                    <div class="form-group {{ $errors->has('menu_link') ? 'has-error' : '' }}">
                        <label for="status">{{ trans('cruds.status') }} (<span class="required">*</span>)</label>
                        <select id="status" name="status" class="form-control" required>
                            <option value="Active">Active</option>
                            <option value="Inactive">Inactive</option>
                        </select>
                        @if($errors->has('status'))
                        <em class="invalid-feedback">
                            {{ $errors->first('status') }}
                        </em>
                        @endif
                    </div>
                    <div>
                        <input type="hidden" name="update_id" id="update_id" value="0">
                        <input class="btn btn-success update" type="submit" value="{{ trans('cruds.save') }}">
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="col-md-8 col-xl-8 col-xs-8 col-sm-8">
        <div class="card border custom-card">
            <div class="card-header custom-card-header">
                <h5 class="main-content-label mb-0">{{ trans('cruds.menu') }}
                    {{ trans('cruds.list') }}</h5>
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
                <div class="table-responsive">
                    <h4>
                        <u>{{$parent_menu}}</u>
                    </h4>
                    <table class="table table-bordered table-striped table-hover datatable datatable-Income">
                        <thead>
                            <tr>
                                <th width="10">
                                    {{ trans('cruds.sl') }}
                                </th>
                                <th>
                                    {{ trans('cruds.actions') }}
                                </th>
                                <th>
                                    English
                                </th>
                                <th>
                                    Arabic
                                </th>
                                <th>
                                    Bangla
                                </th>
                                <th>
                                    {{ trans('cruds.menu_link') }}
                                </th>
                                <th>
                                    {{ trans('cruds.menu_icon') }}
                                </th>
                                <th>
                                    {{ trans('cruds.order_no') }}
                                </th>
                                <th>
                                    {{ trans('cruds.status') }}
                                </th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach($menus as $key => $menu)
                            <tr data-entry-id="{{ $menu->id }}">
                                <td>
                                    {{($key+1)}}
                                </td>
                                <td>
                                    <a class="btn btn-xs btn-info editAction" href="javascript:void(0)"
                                        data-table="Menu" data-column="id" data-value="{{$menu->id}}">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    @if($menu->menu_link == '#')
                                    <a class="btn btn-xs btn-primary"
                                        href="{{ url('admin/menu?parent_id='.$menu->id) }}">
                                        Next Layer
                                    </a>
                                    @endif
                                </td>
                                <td>
                                    {{ $menu->en ?? '' }}
                                </td>
                                <td>
                                    {{ $menu->ar ?? '' }}
                                </td>
                                <td>
                                    {{ $menu->bn ?? '' }}
                                </td>
                                <td>
                                    {{ $menu->menu_link ?? '' }}
                                </td>
                                <td>
                                    {{ $menu->menu_icon ?? '' }}
                                </td>
                                <td>
                                    {{ $menu->order_no ?? '' }}
                                </td>
                                <td>
                                    {{ $menu->status ?? '' }}
                                </td>


                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
@parent
<script>
$('.datatable').dataTable();
$(document).on("click", ".editAction", function() {
    let response = editAction(this);
    //console.log(response);
    $("#update_id").val(response.id);
    $("#parent_id").val(response.parent_id);
    $("#order_no").val(response.order_no);
    $("#en").val(response.en);
    $("#ar").val(response.ar);
    $("#bn").val(response.bn);
    $("#menu_link").val(response.menu_link);
    $("#menu_icon").val(response.menu_icon);
    $("#status").val(response.status);
})
</script>
@endsection