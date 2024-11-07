@extends('layouts.admin')
@section('content')
<div class="card">
    <div class="row">
        <div class="col-md-12">
            <div class="card-body">
                <div class="card-header">
                    {{ trans('cruds.challan_list') }}
                </div>
                <div class="table-responsive">
                    <table class=" table table-bordered table-striped table-hover datatable datatable-User">
                        <thead>
                            <tr>
                                <th>
                                    {{ trans('cruds.tsrequisition_code') }}
                                </th>
                                <th>
                                    {{ trans('cruds.sl') }}
                                </th>
                                <th>
                                    {{ trans('cruds.challan_no') }}
                                </th>
                                <th>
                                    {{ trans('cruds.item') }}
                                </th>
                                <th>{{ __('cruds.unit') }}</th>
                                <th>{{ __('cruds.quantity') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $prev_requisition = '' ;
                            $curr_requisition = '' ;
                            $prev_challan = '' ;
                            $curr_challan = '' ;
                            $requisition_row = 0 ;
                            $challan_row = 0 ;
                            $sl = 0 ;
                            @endphp
                            @foreach($challans as $key => $challan)
                            @php
                            $curr_requisition = $challan->tsrequisition_id ;
                            $curr_challan = $challan->challan_id ;
                            if($prev_requisition != $curr_requisition){
                            $requisition_row = $challan->where('tsrequisition_id',$curr_requisition)->count() ;
                            }
                            if($prev_challan != $curr_challan){
                            $challan_row = $challan->where('challan_id',$curr_challan)->count() ;
                            }

                            @endphp
                            <tr data-entry-id="{{ $challan->id }}">
                                @if($prev_requisition != $curr_requisition)
                                <td rowspan="{{ $requisition_row }}">
                                    {{ $challan->tsrequisition_code ?? '' }}
                                </td>
                                @endif
                                @if($prev_challan != $curr_challan)
                                <td rowspan="{{ $challan_row }}">{{ (++$sl) }}</td>
                                <td rowspan="{{ $challan_row }}">
                                    <a href="{{ route('admin.tsrdelivery.show', $challan->challan_id) }}">
                                        {{ $challan->challan_code ?? '' }}
                                    </a>
                                </td>
                                @endif
                                <td>
                                    {{ $challan->item_name ?? '' }}
                                </td>
                                <td> {{ $challan->unit_name ?? '' }}</td>
                                <td>{{ $challan->delivered_quantity ?? '' }}</td>
                            </tr>
                            @php
                            $prev_requisition = $curr_requisition ;
                            $prev_challan = $curr_challan ;
                            @endphp
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


</script>
@endsection