@extends('layouts.admin')
@section('content')
<div class="card">
    <div class="row">
        <div class="col-md-12">
            <div class="card-body">
                <div class="card-header">
                    {{ trans('cruds.tsitemreturn_list') }}
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
                                    {{ trans('cruds.tsitemreturn_code') }}
                                </th>
                                <th>
                                    {{ trans('cruds.tsitemreturn_date') }}
                                </th>
                                
                                <th>
                                    {{ trans('cruds.section') }}
                                </th>
                                <th>
                                    {{ trans('cruds.card') }}
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($tsitemreturns as $key => $tsitemreturn)
                            <tr data-entry-id="{{ $tsitemreturn->id }}">
                                <td>

                                </td>
                                <td>
                                    @if(show())
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.tsitemreturn.show', $tsitemreturn->id) }}" data-placement="top" data-toggle="tooltip" title="View">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    @endif



                                    @if(delete())
                                    <form action="{{ route('admin.tsitemreturn.destroy', $tsitemreturn->id) }}" method="POST"
                                        onsubmit="return confirm('{{ trans('cruds.areYouSure') }}');"
                                        style="display: inline-block;">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <button type="submit" class="btn btn-xs btn-danger" data-placement="top" data-toggle="tooltip" title="Delete">
                                            <i class="fas fa-trash"></i></button>
                                    </form>
                                    @endif
                                </td>
                                
                                <td>
                                    {{ $tsitemreturn->tsitemreturn_code ?? '' }}
                                </td>
                                <td>
                                    {{ $tsitemreturn->tsitemreturn_date ?? '' }}
                                </td>
                                
                                <td>
                                    {{ isset($tsitemreturn->section)?$tsitemreturn->section->section_name:'' }}
                                </td>
                                <td>
                                    @php
                                        $user = isset($tsitemreturn->card)?isset($tsitemreturn->card->user)?$tsitemreturn->card->user->user_code.' - ' .$tsitemreturn->card->user->name:'':'';
                                    @endphp
                                    {{ isset($tsitemreturn->card)?$tsitemreturn->card->card_code .' - '.$user:'' }}
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
    let route = "{{ route('admin.tools_store_management.tsitemreturn.massDestroy') }}";
    let hasPermission = 0;
    <?php if (delete()) {?>
    hasPermission = 1;
    <?php }?>
    deleteSelected(route, hasPermission);
})
</script>
@endsection