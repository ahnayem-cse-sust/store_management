@extends('layouts.admin')
@section('content')

<style>
    table tr td span{
    padding: 0 10px;
    border-top: 1px solid #000;
}
</style>

<div class="card">
    <div class="card-header">
        {{ trans('cruds.show') }} {{ trans('cruds.challan') }}
    </div>

    <div class="card-body">
        <div class="mb-2 bg-bisque">
            <br>
            <div>
                <h2 class="text-center">Bangladesh Industrial Technical Assistance Center (BITAC), Dhaka</h2>
                <h3 class="text-center">116 (Kha), Tejgoan Industrial Area, Dhaka-1208</h3>
                <h4 class="text-center"><u>Requisition Delivery</u></h4>
            </div>
            <div class="mb-3" style="width: 80%;margin:0 auto;">
                <table class="table1 table-bordered1 table-striped1" style="width:100%">
                    <tbody>
                        <tr>
                            <th>{{ __('cruds.challan_no') }} </th>
                            <td>: {{ $challan->challan_code }}</td>
                            <th style="width:150px;">{{ __('cruds.challan_date') }}</th>
                            <td>: {{ $challan->challan_date }}</td>
                        </tr>
                        <tr>
                            <th>{{ __('cruds.requisition_code') }}</th>
                            <td>: {{ isset($challan->requisition)?$challan->requisition->requisition_code:'' }}</td>
                            <th>{{ __('cruds.requisition_date') }}</th>
                            <td>: {{ isset( $challan->requisition)?$challan->requisition->requisition_date:'' }}</td>
                        </tr>
                        <tr>
                            <th>{{ __('cruds.delivery_man') }}</th>
                            <td>: {{ $challan->delivery_man }}</td>
                            <th>{{ __('cruds.delivery_place') }}</th>
                            <td>: {{ $challan->delivery_place }}</td>
                        </tr>
                        <tr>
                            <th>{{ __('cruds.branch') }}</th>
                            <td>: {{ isset($challan->branch)?$challan->branch->short_name:'' }}</td>
                            <th>{{ __('cruds.section') }}</th>
                            <td>: {{ isset($challan->section)?$challan->section->section_name:'' }}</td>
                        </tr>
                        <br>
                        <tr>
                            <th>{{ __('cruds.product_receive_by') }}</th>
                            <td>: {{ isset($challan->requisition)?$challan->requisition->receive_by:'' }}</td>
                            <th>{{ __('cruds.party') }}</th>
                            <td>: {{ isset($challan->party)?$challan->party->party_name:'' }}</td>
                        </tr>
                        <tr>
                            <th>{{ __('cruds.remarks') }}</th>
                            <td colspan="3">: {{ $challan->description }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <br>
            <br>
            <div>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>{{ trans('cruds.sl') }}</th>
                            <th>
                                {{ trans('cruds.item') }}
                            </th>
                            <th>{{ __('cruds.unit') }}</th>
                            <th>{{ __('cruds.quantity') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(isset($challan->challanDetails))
                        @foreach($challan->challanDetails as $key => $value)
                        <tr>
                            <td>{{ ($key + 1)}}
                            </td>
                            <td>{{ isset($value->item)?$value->item->item_name:'' }}</td>
                            <td>{{ isset($value->item)?isset($value->item->unit)?$value->item->unit->unit_name:'':'' }}
                            </td>
                            <td>{{$value->delivered_quantity}}
                            </td>
                        </tr>
                        @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
            <br>
            <br>
            <div>
                <table width="100%">
                    <tbody>
                        <tr>
                            <td style="width:20%;text-align:center;">{{ $challan->createdBy->name }}<br/><span>Created By</span><br></td>
                            <td style="width:20%;text-align:center;"><span>Received By</span></td>
                            <td style="width:20%;text-align:center;"><span>Store Keeper</span></td>
                            <td style="width:20%;text-align:center;"><span>Assistant Store Officer</span></td>
                            <td style="width:20%;text-align:center;"><span>Store Officer</span></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <br>

            <a class="btn btn-warning ripple" href="{{ route('admin.delivery.index') }}">
                {{ trans('cruds.back_to_list') }}
            </a>
        </div>

        <nav class="mb-3">
            <div class="nav nav-tabs">

            </div>
        </nav>
        <div class="tab-content">

        </div>
    </div>
</div>
@endsection