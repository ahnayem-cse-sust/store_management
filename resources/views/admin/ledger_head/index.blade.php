@extends('layouts.admin')
@section('content')

<div class="row row-sm">
    <div class="col-md-4 col-xl-4 col-xs-12 col-sm-4">
        <div class="card border custom-card">
            <div class="card-header custom-card-header">
                <h5 class="main-content-label mb-0">{{ trans('cruds.create') }}
                    {{ trans('cruds.ledger_head') }}</h5>
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
                <form action="{{ route('admin.ledger_head.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <input type="hidden" id="url-load" value="{{route('admin.crud.load')}}">
                        <input type="hidden" id="valueColumn" value="id">
                        <input type="hidden" id="model" value="SubGroup">
                        <input type="hidden" id="displayColumn" value="subgroup_name">
                        <input type="hidden" id="targetHTML" value="ledger_subgroup_id">
                        <p class="mg-b-10 tx-semibold">{{__('cruds.ledger_group')}} (<span class="required">*</span>)
                        </p>
                        <select id="ledger_group_id" name="ledger_group_id" class="form-control options select2">
                            <?=options('ledger_groups', array(), array(), 'id', 'ledger_group_name', 'id', 'asc', trans('cruds.select'), 0)?>
                        </select>
                    </div>
                    <div class="form-group">
                        <p class="mg-b-10 tx-semibold">{{__('cruds.ledger_subgroup')}} (<span class="required">*</span>)
                        </p>
                        <select id="ledger_subgroup_id" name="ledger_subgroup_id" class="form-control select2">
                            <?=options('ledger_subgroups', array(), array(), 'id', 'ledger_subgroup_name', 'id', 'asc', trans('cruds.select'), 0)?>
                        </select>
                    </div>
                    <div class="form-group">
                        <p class="mg-b-10 tx-semibold">{{__('cruds.ledger_head_name')}} (<span
                                class="required">*</span>)
                        </p>
                        <input type="text"
                            class="form-control  {{ $errors->has('ledger_head_name') ? 'is-invalid' : '' }}"
                            name="ledger_head_name" id="ledger_head_name"
                            placeholder="{{__('cruds.ledger_head_name')}}">
                        @if($errors->has('ledger_head_name'))
                        <em class="invalid-feedback">
                            {{ $errors->first('ledger_head_name') }}
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
                <h5 class="main-content-label mb-0">{{ trans('cruds.ledger_head') }}
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
                                <th>{{ trans('cruds.ledger_group_name') }}</th>
                                <th>{{ trans('cruds.ledger_subgroup_name') }}</th>
                                <th>{{ trans('cruds.ledger_head_name') }}</th>
                                <th>
                                    {{ trans('cruds.actions') }}
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($ledger_heads as $key => $ledger_head)
                            <tr data-entry-id="{{ $ledger_head->id }}">
                                <td>

                                </td>
                                <td>{{isset($ledger_head->ledger_group)?$ledger_head->ledger_group->ledger_group_name:''}}
                                <td>{{isset($ledger_head->ledger_subgroup)?$ledger_head->ledger_subgroup->ledger_subgroup_name:''}}
                                </td>
                                <td>{{ $ledger_head->ledger_head_name ?? '' }}</td>
                                <td>
                                    @if(show())
                                    <a class="btn btn-xs btn-primary"
                                        href="{{ route('admin.ledger_head.show', $ledger_head->id) }}">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    @endif

                                    @if(edit())
                                    <a class="btn btn-xs btn-info editAction" href="javascript:void(0)"
                                        data-table="LedgerHead" data-column="id" data-value="{{$ledger_head->id}}">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    @endif

                                    @if(delete())
                                    <form action="{{ route('admin.ledger_head.destroy', $ledger_head->id) }}"
                                        method="POST" onsubmit="return confirm('{{ trans('cruds.areYouSure') }}');"
                                        style="display: inline-block;">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <button type="submit" class="btn btn-xs btn-danger">
                                            <i class="fas fa-trash"></i></button>
                                    </form>
                                    @endif
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
$(function() {
    let route = "{{ route('admin.account_management.ledger_head.massDestroy') }}";
    let hasPermission = 0;
    <?php if (delete()) {?>
    hasPermission = 1;
    <?php }?>
    deleteSelected(route, hasPermission);
})

$(document).on("click", ".editAction", function() {
    let response = editAction(this);
    $("#update_id").val(response.id);
    $("#ledger_group_id").val(response.ledger_group_id).trigger('change');
    setTimeout(() => {
        $("#ledger_subgroup_id").val(response.ledger_subgroup_id).trigger('change');
    }, 1000);
    $("#ledger_head_name").val(response.ledger_head_name);
    changeSubmitButtonCaption();
})
$(document).on('change', '#ledger_group_id', function() {
    let ledger_group_id, where = [],
        response;
    ledger_group_id = $(this).val();
    select = "{{__('cruds.select')}}";
    where.push(['ledger_group_id', '=', ledger_group_id]);
    console.log(where);
    response = getData('/crud/get', 'LedgerSubGroup', where, 'get', []);
    options = `<option value=''>${select}</option>`;
    if (response) {
        $.each(response, function(index, value) {
            options +=
                `<option value='${value.id}'>${value.ledger_subgroup_name}</option>`;
        })
    }
    $('#ledger_subgroup_id').html(options);

})
</script>
@endsection