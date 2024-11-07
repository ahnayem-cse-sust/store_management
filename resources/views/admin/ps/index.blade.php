@extends('layouts.admin')
@section('content')
<div class="card">
    <div class="row">
        <div class="col-md-12">
            <div class="card-body">
                <div class="card-header">
                    {{ trans('cruds.ps_list') }}
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
                                    {{ trans('cruds.ps_code') }}
                                </th>
                                <th>
                                    {{ trans('cruds.ps_date') }}
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
                            @foreach($pss as $key => $ps)
                            <tr data-entry-id="{{ $ps->id }}">
                                <td>

                                </td>
                                <td>
                                    @if(show())
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.ps.show', $ps->id) }}" data-placement="top" data-toggle="tooltip" title="View">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    @endif

                                    @if($ps->status == 'Pending')

                                    {{-- @if(edit())
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.ps.edit', $ps->id) }}" data-placement="top" data-toggle="tooltip" title="Edit">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    @endif --}}

                                    @if(edit())
                                    <a class="btn btn-xs btn-warning" href="/admin/main_warehouse_management/ps/approved/{{ $ps->id }}" data-placement="top" data-toggle="tooltip" title="Click to Approved PS">
                                        <i class="fas fa-refresh"></i>
                                    </a>
                                    @endif

                                    @if(delete())
                                    <form action="{{ route('admin.ps.destroy', $ps->id) }}" method="POST"
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
                                    {{ $ps->ps_code ?? '' }}
                                </td>
                                <td>
                                    {{ $ps->ps_date ?? '' }}
                                </td>
                                <td>
                                    {{ isset($ps->section)?$ps->section->section_name:'' }}
                                </td>
                                <td>
                                    {{ isset($ps->branch)?$ps->branch->branch_name:'' }}
                                </td>
                                <td>
                                    {{ $ps->status ?? '' }}
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
    let route = "{{ route('admin.main_warehouse_management.ps.massDestroy') }}";
    let hasPermission = 0;
    <?php if (delete()) {?>
    hasPermission = 1;
    <?php }?>
    deleteSelected(route, hasPermission);
})
</script>
@endsection