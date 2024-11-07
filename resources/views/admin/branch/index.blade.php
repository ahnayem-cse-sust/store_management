@extends('layouts.admin')
@section('content')

<div class="row row-sm">
    <div class="col-md-4 col-xl-4 col-xs-12 col-sm-4">
        <div class="card border custom-card">
            <div class="card-header custom-card-header">
                <h5 class="main-content-label mb-0">{{ trans('cruds.create') }}
                    {{ trans('cruds.branch') }}</h5>
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
                <form action="{{ route('admin.branch.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <p class="mg-b-10 tx-semibold">{{__('cruds.branch_code')}} (<span
                                class="required">*</span>)
                        </p>
                        <input type="text"
                            class="form-control unique_code  {{ $errors->has('branch_code') ? 'is-invalid' : '' }}"
                            name="branch_code" id="branch_code"
                            placeholder="{{__('cruds.branch_code')}}"  data-model="Branch" data-prefix="BR" data-update_id="0" required>
                        @if($errors->has('branch_code'))
                        <em class="invalid-feedback">
                            {{ $errors->first('branch_code') }}
                        </em>
                        @endif
                    </div>
                    <div class="form-group">
                        <p class="mg-b-10 tx-semibold">{{__('cruds.branch_name')}} (<span
                                class="required">*</span>)
                        </p>
                        <input type="text"
                            class="form-control  {{ $errors->has('branch_name') ? 'is-invalid' : '' }}"
                            name="branch_name" id="branch_name"
                            placeholder="{{__('cruds.branch_name')}}" required>
                        @if($errors->has('branch_name'))
                        <em class="invalid-feedback">
                            {{ $errors->first('branch_name') }}
                        </em>
                        @endif
                    </div>
                    <div class="form-group">
                        <p class="mg-b-10 tx-semibold">{{__('cruds.short_name')}} (<span
                                class="required">*</span>)
                        </p>
                        <input type="text"
                            class="form-control  {{ $errors->has('short_name') ? 'is-invalid' : '' }}"
                            name="short_name" id="short_name"
                            placeholder="{{__('cruds.short_name')}}" required>
                        @if($errors->has('short_name'))
                        <em class="invalid-feedback">
                            {{ $errors->first('short_name') }}
                        </em>
                        @endif
                    </div>
                    <div class="form-group">
                        <p class="mg-b-10 tx-semibold">{{__('cruds.branch_address')}} (<span
                                class="required">*</span>)
                        </p>
                        <input type="text"
                            class="form-control  {{ $errors->has('branch_address') ? 'is-invalid' : '' }}"
                            name="branch_address" id="branch_address"
                            placeholder="{{__('cruds.branch_address')}}" required>
                        @if($errors->has('branch_address'))
                        <em class="invalid-feedback">
                            {{ $errors->first('branch_address') }}
                        </em>
                        @endif
                    </div>
                    <div class="form-group">
                        <p class="mg-b-10 tx-semibold">{{__('cruds.branch_head')}} )
                        </p>
                        <input type="text"
                            class="form-control  {{ $errors->has('branch_head') ? 'is-invalid' : '' }}"
                            name="branch_head" id="branch_head"
                            placeholder="{{__('cruds.branch_head')}}">
                        @if($errors->has('branch_head'))
                        <em class="invalid-feedback">
                            {{ $errors->first('branch_head') }}
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
                <h5 class="main-content-label mb-0">{{ trans('cruds.branch') }}
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
                                <th>
                                    {{ trans('cruds.actions') }}
                                </th>
                                <th>{{ trans('cruds.branch_code') }}</th>
                                <th>{{ trans('cruds.branch_name') }}</th>
                                <th>{{ trans('cruds.short_name') }}</th>
                                <th>{{ trans('cruds.branch_address') }}</th>
                                <th>{{ trans('cruds.branch_head') }}</th>
                                <th>{{ trans('cruds.contact_no') }}</th>
                                <th>{{ trans('cruds.email_address') }}</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($branchs as $key => $branch)
                            <tr data-entry-id="{{ $branch->id }}">
                                <td>

                                </td>
                                <td>
                                    @if(show())
                                    <a class="btn btn-xs btn-primary"
                                        href="{{ route('admin.branch.show', $branch->id) }}">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    @endif

                                    @if(edit())
                                    <a class="btn btn-xs btn-info editAction" href="javascript:void(0)"
                                        data-table="Branch" data-column="id" data-value="{{$branch->id}}">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    @endif

                                    <!--  @if(delete())
                                    <form action="{{ route('admin.branch.destroy', $branch->id) }}" method="POST"
                                        onsubmit="return confirm('{{ trans('cruds.areYouSure') }}');"
                                        style="display: inline-block;">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <button type="submit" class="btn btn-xs btn-danger">
                                            <i class="fas fa-trash"></i></button>
                                    </form>
                                    @endif -->
                                </td>
                                <td>{{ $branch->branch_code ?? '' }}</td>
                                <td>{{ $branch->branch_name ?? '' }}</td>
                                <td>{{ $branch->short_name ?? '' }}</td>
                                <td>{{ $branch->branch_address ?? '' }}</td>
                                <td>{{ $branch->branch_head ?? '' }}</td>
                                <td>{{ $branch->contact_no ?? '' }}</td>
                                <td>{{ $branch->email_address ?? '' }}</td>

                                
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
    let route = "{{ route('admin.general_settings.branch.massDestroy') }}";
    let hasPermission = 0;
    <?php if (delete()) {?>
    hasPermission = 1;
    <?php }?>
    deleteSelected(route, hasPermission);
}) */

$(document).on("click", ".editAction", function() {
    let response = editAction(this);
    $("#update_id").val(response.id);
    $("#branch_code").data('update_id',response.id);
    $("#branch_code").val(response.branch_code);
    $("#branch_name").val(response.branch_name);
    $("#short_name").val(response.short_name);
    $("#branch_address").val(response.branch_address);
    $("#branch_head").val(response.branch_head);
    $("#contact_no").val(response.contact_no);
    $("#email_address").val(response.email_address);
    changeSubmitButtonCaption();
})
</script>
@endsection