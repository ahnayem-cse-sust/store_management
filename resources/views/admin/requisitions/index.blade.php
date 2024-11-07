@extends('layouts.admin')
@section('content')
<div class="card">
    <div class="row">
        <div class="col-md-12">
            <div class="card-body">
                <div class="card-header">
                    {{ trans('cruds.requisition_list') }}
                </div>
                <div class="table-responsive">
                    <table class=" table table-bordered table-striped table-hover datatable datatable-User">
                        <thead>
                            <tr>
                                <th width="10">

                                </th>
                                <th>
                                    {{ trans('cruds.actions') }}
                                </th>
                                
                                <th>
                                    {{ trans('cruds.requisition_code') }}
                                </th>
                                <th>
                                    {{ trans('cruds.requisition_date') }}
                                </th>
                                <th>
                                    {{ trans('cruds.section') }}
                                </th>
                                <th>
                                    {{ trans('cruds.branch') }}
                                </th>
                                <th>
                                    {{ trans('cruds.status') }}
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($requisitions as $key => $requisition)
                            <tr data-entry-id="{{ $requisition->id }}">
                                <td>

                                </td>
                                <td>
                                    @if(show())
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.requisition.show', $requisition->id) }}" data-placement="top" data-toggle="tooltip" title="View">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    @endif

                                    @if($requisition->status == 'Pending')

                                    @if(edit())
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.requisition.edit', $requisition->id) }}" data-placement="top" data-toggle="tooltip" title="Edit">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    @endif

                                    @if(edit())
                                    <a class="btn btn-xs btn-warning" href="/admin/section_requisition_management/requisition/approved/{{ $requisition->id }}" data-placement="top" data-toggle="tooltip" title="Click to Approved Requisition">
                                        <i class="fas fa-refresh"></i>
                                    </a>
                                    @endif

                                    @if(delete())
                                    <form action="{{ route('admin.requisition.destroy', $requisition->id) }}" method="POST"
                                        onsubmit="return confirm('{{ trans('cruds.areYouSure') }}');"
                                        style="display: inline-block;">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <button type="submit" class="btn btn-xs btn-danger" data-placement="top" data-toggle="tooltip" title="Delete">
                                            <i class="fas fa-trash"></i></button>
                                    </form>
                                    @endif

                                    @endif
                                </td>
                                
                                <td>
                                    {{ $requisition->requisition_code ?? '' }}
                                </td>
                                <td>
                                    {{ $requisition->requisition_date ?? '' }}
                                </td>
                                <td>
                                    {{ isset($requisition->section)?$requisition->section->section_name:'' }}
                                </td>
                                <td>
                                    {{ isset($requisition->branch)?$requisition->branch->short_name:'' }}
                                </td>
                                <td>
                                    {{ $requisition->status ?? '' }}
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
    let route = "{{ route('admin.section_requisition_management.requisition.massDestroy') }}";
    let hasPermission = 0;
    <?php if (delete()) {?>
    hasPermission = 1;
    <?php }?>
    deleteSelected(route, hasPermission);
})
</script>
@endsection