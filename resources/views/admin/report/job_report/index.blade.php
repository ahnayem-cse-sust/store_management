@extends('layouts.admin')
@section('content')
<div class="row row-sm">
    <div class="col-md-12 col-xl-12 col-xs-12 col-sm-12">
        <div class="card border custom-card">
            <div class="card-header custom-card-header">
                <h5 class="main-content-label mb-0">
                    {{ trans('cruds.job_no_report') }}
                </h5>
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
                <form action="/admin/report_management/report/generate-job-report" method="GET">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <p class="mg-b-10 tx-semibold">{{__('cruds.job')}}
                                </p>
                                <select id="job_id" name="job_id" class="form-control select2">
                                    <?=options('jobs', array(), array(), 'id', 'job_name', 'id', 'asc', trans('cruds.select'), !empty($job_id) ? $job_id : 0)?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <p class="mg-b-10 tx-semibold">{{__('cruds.date_from')}}
                                </p>
                                <input type="text" id="date_from" name="date_from" class="form-control datepicker-date"
                                    value="{{ !empty($date_from)?$date_from:date('Y-m-d') }}">
                                @if($errors->has('date_from'))
                                <em class="invalid-feedback">
                                    {{ $errors->first('date_from') }}
                                </em>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <p class="mg-b-10 tx-semibold">{{__('cruds.date_to')}}
                                </p>
                                <input type="text" id="date_to" name="date_to" class="form-control datepicker-date"
                                    value="{{ !empty($date_to)?$date_to:date('Y-m-d') }}">
                                @if($errors->has('date_to'))
                                <em class="invalid-feedback">
                                    {{ $errors->first('date_to') }}
                                </em>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <button type="submit" class="btn btn-warning mt-4">
                                    <i class="fas fa-search">Search</i>
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <br>
            <br>
            <div class="card-body">
                <div class="table-responsive">

                    @isset($values)
                    @foreach ($values as $job_id => $value)
                    @php
                    $job = \App\Job::where('id',$job_id)->first() ;
                    $requisition = \App\Requisition::where('job_id',$job_id)->first() ;

                    $receiveDetails = \App\MaterialReceiveDetails::where('job_id',$job_id)->get();
                    $deliveryDetails =
                    \App\ChallanDetails::leftJoin('challans','challans.id','=','challan_details.challan_id')
                    ->where('job_id',$job_id)->get();

                    @endphp
                    <table style="width:100%">
                        <tbody>
                            <td style="text-align:center">
                                <h2>{{ isset($job)?$job->job_name:'' }}</h2>
                                <h3>{{ isset($requisition)?isset($requisition->party)?$requisition->party->party_name:'':'' }}
                                </h3>
                            </td>
                        </tbody>
                    </table>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th colspan="4">Requisition Details </th>
                                <th colspan="2">PS Details</th>
                            </tr>
                            <tr>
                                <th>SL</th>
                                <th>Requisition No</th>
                                <th>Date</th>
                                <th>Section </th>
                                <th>PS No</th>
                                <th>PS Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($value as $k=>$v)
                            <tr>
                                <td>{{ ($k+1) }}</td>
                                <td>{{ isset($v->requisition)?$v->requisition->requisition_code:'' }}</td>
                                <td>{{ isset($v->requisition)?$v->requisition->requisition_date:'' }}</td>
                                <td>{{ isset($v->section)?$v->section->section_name:'' }}</td>
                                <td>{{ $v->ps_code }}</td>
                                <td>{{ $v->ps_date }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <div style="width:100%;height:10px"></div>
                    <table style="width:100%">
                        <tbody>
                            <tr>
                                <td>
                                    <h2 style="text-align:center;"><u>Receive Details</u></h2>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>SL</th>
                                <th>Products Description</th>
                                <th>Unit</th>
                                <th>Order Qty</th>
                                <th>Receive Qty</th>
                                <th>Unit Price</th>
                                <th>Total Price</th>
                                <th>Volume </th>
                                <th>Page</th>
                                <th>Remarks</th>
                            </tr>
                        </thead>
                        <tbody>
                            @isset($receiveDetails)
                            @foreach ($receiveDetails as $key_re=>$receive)
                            <tr>
                                <td>{{ ($key_re+1) }}</td>
                                <td>{{ isset($receive->item)?$receive->item->item_name:''}}</td>
                                <td>{{ isset($receive->item)?isset($receive->item->unit)?$receive->item->unit->unit_name:'':''}}
                                </td>
                                <td style="text-align:right;">{{ $receive->order_quantity }}</td>
                                <td style="text-align:right;">{{ $receive->receive_quantity }}</td>
                                <td style="text-align:right;">{{ $receive->sale_price }}</td>
                                <td style="text-align:right;">{{ $receive->total_price }}</td>
                                <td>{{ isset($receive->item)?$receive->item->volume_location:''}}</td>
                                <td>{{ isset($receive->item)?$receive->item->page_location:''}}</td>
                                <td>{{ isset($receive->item)?$receive->item->description:''}}</td>
                            </tr>
                            @endforeach
                            @endisset
                        </tbody>
                    </table>
                    <table style="width:100%">
                        <tbody>
                            <tr>
                                <td>
                                    <h2 style="text-align:center;"><u>Delivery Details</u></h2>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>SL </th>
                                <th>Req No</th>
                                <th>DeliveryNo</th>
                                <th>Delivery Date</th>
                                <th>Products Description </th>
                                <th>Unit </th>
                                <th>Order Qty</th>
                                <th>Deliver Qty</th>
                                <th>Section </th>
                                <th>Requisition For</th>
                            </tr>
                        </thead>
                        <tbody>
                            @isset($deliveryDetails)
                            @foreach ($deliveryDetails as $key_de=>$delivery)
                            @php
                            $requisition = \App\Requisition::where('id',$delivery->requisition_id)->first() ;
                            @endphp
                            <tr>
                                <td>{{ ($key_de+1) }}</td>
                                <td>{{ isset($requisition)?$requisition->requisition_code:''}}</td>
                                <td>{{$delivery->challan_code}}</td>
                                <td>{{$delivery->challan_date}}</td>
                                <td>{{ isset($delivery->item)?$delivery->item->item_name:''}}</td>
                                <td>{{ isset($delivery->item)?isset($delivery->item->unit)?$delivery->item->unit->unit_name:'':''}}
                                </td>
                                <td style="text-align:right">{{$delivery->order_quantity}}</td>
                                <td style="text-align:right">{{$delivery->delivered_quantity}}</td>
                                <td>{{ isset($requisition)?isset($requisition->section)?$requisition->section->section_name:'':''}}
                                <td>{{ isset($requisition)?isset($requisition->requisition_for)?$requisition->requisition_for->requisitionfor_name:'':''}}
                                </td>
                            </tr>
                            @endforeach
                            @endisset
                        </tbody>
                    </table>

                    <hr>


                    @endforeach
                    @endisset
                </div>
            </div>
        </div>
    </div>
</div>
@endsection