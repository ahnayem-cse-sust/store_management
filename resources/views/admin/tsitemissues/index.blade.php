@extends('layouts.admin')
@section('content')
<div class="card">
    <div class="row">
        <div class="col-md-12">
            <div class="card-body">
                <div class="card-header">
                    {{ trans('cruds.tsitemissue_list') }}
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
                                    {{ trans('cruds.tsitemissue_code') }}
                                </th>
                                <th>
                                    {{ trans('cruds.tsitemissue_date') }}
                                </th>
                                <th>
                                    {{ trans('cruds.section') }}
                                </th>
                                <th>
                                    {{ trans('cruds.card') }}
                                </th>
                                <th>
                                    {{ trans('cruds.receive_by') }}
                                </th>

                                <th>
                                    {{ trans('cruds.status') }}
                                </th>
                                
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($tsitemissues as $key => $tsitemissue)
                            <tr data-entry-id="{{ $tsitemissue->id }}">
                                <td>

                                </td>
                                <td>
                                    @if(show())
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.tsitemissue.show', $tsitemissue->id) }}" data-placement="top" data-toggle="tooltip" title="View">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    @endif

                                    @if($tsitemissue->status == 'Pending')

                                    @if(edit())
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.tsitemissue.edit', $tsitemissue->id) }}" data-placement="top" data-toggle="tooltip" title="Edit">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    @endif

                                    @if(edit())
                                    <a class="btn btn-xs btn-warning" href="/admin/tools_store_management/tsitemissue/approved/{{ $tsitemissue->id }}" data-placement="top" data-toggle="tooltip" title="Click to Approved Requisition">
                                        <i class="fas fa-refresh"></i>
                                    </a>
                                    @endif

                                    @if(delete())
                                    <form action="{{ route('admin.tsitemissue.destroy', $tsitemissue->id) }}" method="POST"
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
                                    {{ $tsitemissue->tsitemissue_code ?? '' }}
                                </td>
                                <td>
                                    {{ $tsitemissue->tsitemissue_date ?? '' }}
                                </td>
                                
                                <td>
                                    {{ isset($tsitemissue->section)?$tsitemissue->section->section_name:'' }}
                                </td>
                                <td>
                                    {{ isset($tsitemissue->card)?$tsitemissue->card->card_code . ' - ' .$tsitemissue->card->card_name:'' }}
                                </td>
                                <td>
                                    {{ isset($tsitemissue->received_by)?$tsitemissue->received_by->name:'' }}
                                </td>
                                <td>
                                    {{ $tsitemissue->status ?? '' }}
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
    let route = "{{ route('admin.tools_store_management.tsitemissue.massDestroy') }}";
    let hasPermission = 0;
    <?php if (delete()) {?>
    hasPermission = 1;
    <?php }?>
    deleteSelected(route, hasPermission);
})
</script>
@endsection