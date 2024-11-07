@extends('layouts.admin')
@section('content')

<div class="row row-sm">
    <div class="col-md-4 col-xl-4 col-xs-12 col-sm-4">
        <div class="card border custom-card">
            <div class="card-header custom-card-header">
                <h5 class="main-content-label mb-0">{{ trans('cruds.create') }}
                    {{ trans('cruds.manufacturer') }}</h5>
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
                <form action="{{ route('admin.manufacturer.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <p class="mg-b-10 tx-semibold">{{__('cruds.manufacturer_code')}} (<span
                                class="required">*</span>)
                        </p>
                        <input type="text"
                            class="form-control unique_code  {{ $errors->has('manufacturer_code') ? 'is-invalid' : '' }}"
                            name="manufacturer_code" id="manufacturer_code"
                            placeholder="{{__('cruds.manufacturer_code')}}" data-model="Manufacturer" data-prefix="MN" data-update_id="0"  required>
                        @if($errors->has('manufacturer_code'))
                        <em class="invalid-feedback">
                            {{ $errors->first('manufacturer_code') }}
                        </em>
                        @endif
                    </div>
                    <div class="form-group">
                        <p class="mg-b-10 tx-semibold">{{__('cruds.manufacturer_name')}} (<span
                                class="required">*</span>)
                        </p>
                        <input type="text"
                            class="form-control  {{ $errors->has('manufacturer_name') ? 'is-invalid' : '' }}"
                            name="manufacturer_name" id="manufacturer_name"
                            placeholder="{{__('cruds.manufacturer_name')}}" required>
                        @if($errors->has('manufacturer_name'))
                        <em class="invalid-feedback">
                            {{ $errors->first('manufacturer_name') }}
                        </em>
                        @endif
                    </div>
                    
                    <div class="form-group">
                        <p class="mg-b-10 tx-semibold">{{__('cruds.manufacturer_address')}} (<span
                                class="required">*</span>)
                        </p>
                        <input type="text"
                            class="form-control  {{ $errors->has('manufacturer_address') ? 'is-invalid' : '' }}"
                            name="manufacturer_address" id="manufacturer_address"
                            placeholder="{{__('cruds.manufacturer_address')}}" required>
                        @if($errors->has('manufacturer_address'))
                        <em class="invalid-feedback">
                            {{ $errors->first('manufacturer_address') }}
                        </em>
                        @endif
                    </div>
                    <div class="form-group">
                        <p class="mg-b-10 tx-semibold">{{__('cruds.country_of_origin')}} (<span
                                class="required">*</span>)
                        </p>
                        <input type="text"
                            class="form-control  {{ $errors->has('country_of_origin') ? 'is-invalid' : '' }}"
                            name="country_of_origin" id="country_of_origin"
                            placeholder="{{__('cruds.country_of_origin')}}" required>
                        @if($errors->has('country_of_origin'))
                        <em class="invalid-feedback">
                            {{ $errors->first('country_of_origin') }}
                        </em>
                        @endif
                    </div>
                    <div class="form-group">
                        <p class="mg-b-10 tx-semibold">{{__('cruds.contact_person')}} )
                        </p>
                        <input type="text"
                            class="form-control  {{ $errors->has('contact_person') ? 'is-invalid' : '' }}"
                            name="contact_person" id="contact_person"
                            placeholder="{{__('cruds.contact_person')}}">
                        @if($errors->has('contact_person'))
                        <em class="invalid-feedback">
                            {{ $errors->first('contact_person') }}
                        </em>
                        @endif
                    </div>
                    <div class="form-group">
                        <p class="mg-b-10 tx-semibold">{{__('cruds.contact_no')}} (<span
                                class="required">*</span>)
                        </p>
                        <input type="text"
                            class="form-control  {{ $errors->has('contact_no') ? 'is-invalid' : '' }}"
                            name="contact_no" id="contact_no"
                            placeholder="{{__('cruds.contact_no')}}" required>
                        @if($errors->has('contact_no'))
                        <em class="invalid-feedback">
                            {{ $errors->first('contact_no') }}
                        </em>
                        @endif
                    </div>
                    <div class="form-group">
                        <p class="mg-b-10 tx-semibold">{{__('cruds.email_address')}}
                        </p>
                        <input type="text"
                            class="form-control  {{ $errors->has('email_address') ? 'is-invalid' : '' }}"
                            name="email_address" id="email_address"
                            placeholder="{{__('cruds.email_address')}}">
                        @if($errors->has('email_address'))
                        <em class="invalid-feedback">
                            {{ $errors->first('email_address') }}
                        </em>
                        @endif
                    </div>
                    <div class="form-group">
                        <input type="hidden" name="update_id" id="update_id" value="0">
                        <button class="btn ripple btn-warning update" type="submit">{{__('cruds.submit')}}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="col-md-8 col-xl-8 col-xs-8 col-sm-8">
        <div class="card border custom-card">
            <div class="card-header custom-card-header">
                <h5 class="main-content-label mb-0">{{ trans('cruds.manufacturer') }}
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
                    <table class=" table table-bordered table-striped table-hover datatable datatable-Income">
                        <thead>
                            <tr>
                                <th width="10">

                                </th>
                                <th>{{ trans('cruds.actions') }}</th>
                                <th>{{ trans('cruds.manufacturer_code') }}</th>
                                <th>{{ trans('cruds.manufacturer_name') }}</th>
                                <th>{{ trans('cruds.country_of_origin') }}</th>
                                <th>{{ trans('cruds.manufacturer_address') }}</th>
                                <th>{{ trans('cruds.contact_person') }}</th>
                                <th>{{ trans('cruds.contact_no') }}</th>
                                <th>{{ trans('cruds.email_address') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($manufacturers as $key => $manufacturer)
                            <tr data-entry-id="{{ $manufacturer->id }}">
                                <td>

                                </td>
                                <td>
                                    @if(show())
                                    <a class="btn btn-xs btn-primary"
                                        href="{{ route('admin.manufacturer.show', $manufacturer->id) }}">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    @endif

                                    @if(edit())
                                    <a class="btn btn-xs btn-info editAction" href="javascript:void(0)"
                                        data-table="Manufacturer" data-column="id" data-value="{{$manufacturer->id}}">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    @endif

                                     @if(delete())
                                    <form action="{{ route('admin.manufacturer.destroy', $manufacturer->id) }}" method="POST"
                                        onsubmit="return confirm('{{ trans('cruds.areYouSure') }}');"
                                        style="display: inline-block;">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <button type="submit" class="btn btn-xs btn-danger">
                                            <i class="fas fa-trash"></i></button>
                                    </form>
                                    @endif
                                </td>
                                <td>{{ $manufacturer->manufacturer_code ?? '' }}</td>
                                <td>{{ $manufacturer->manufacturer_name ?? '' }}</td>
                                <td>{{ $manufacturer->country_of_origin ?? '' }}</td>
                                <td>{{ $manufacturer->manufacturer_address ?? '' }}</td>
                                <td>{{ $manufacturer->contact_person ?? '' }}</td>
                                <td>{{ $manufacturer->contact_no ?? '' }}</td>
                                <td>{{ $manufacturer->email_address ?? '' }}</td>

                                
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
/* $(function() {
    let route = "{{ route('admin.inventory_management.manufacturer.massDestroy') }}";
    let hasPermission = 0;
    <?php if (delete()) {?>
    hasPermission = 1;
    <?php }?>
    deleteSelected(route, hasPermission);
}) */

$(document).on("click", ".editAction", function() {
    let response = editAction(this);
    $("#update_id").val(response.id);
    $("#manufacturer_code").attr('data-update_id',response.id);
    $("#manufacturer_code").val(response.manufacturer_code);
    $("#manufacturer_name").val(response.manufacturer_name);
    $("#country_of_origin").val(response.country_of_origin);
    $("#manufacturer_address").val(response.manufacturer_address);
    $("#contact_person").val(response.contact_person);
    $("#contact_no").val(response.contact_no);
    $("#email_address").val(response.email_address);
    changeSubmitButtonCaption();
})
</script>
@endsection