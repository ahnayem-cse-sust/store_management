@extends('layouts.admin')
@section('content')
<main>
    <form action="/admin/report_management/generate_agent_account" method="get">
        <div class="row row-sm">
            <div class="col-md-2">
                <div class="form-group {{ $errors->has('from_date') ? 'has-error' : '' }}">
                    <label for="from_date">{{ trans('cruds.from_date') }} </label>
                    <input type="text" id="from_date" name="from_date" class="form-control datepicker-date"
                        value="{{ isset($input)?$input->from_date:date('d-m-Y') }}" autocomplete="off">
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group {{ $errors->has('to_date') ? 'has-error' : '' }}">
                    <label for="to_date">{{ trans('cruds.to_date') }} </label>
                    <input type="text" id="to_date" name="to_date" class="form-control datepicker-date"
                        value="{{ isset($input)?$input->to_date:date('d-m-Y') }}" autocomplete="off">
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group {{ $errors->has('region_type_id') ? 'has-error' : '' }}">
                    <label for="region_type_id">{{ trans('cruds.region_type_id') }} </label>
                    @php
                    $where = [];
                    if(!empty(region_type_id())){
                    $where = [['id','=',region_type_id()]] ;
                    }
                    @endphp
                    <select id="region_type_id" name="region_type_id" class="form-control select2">
                        <?=options('region_types', $where, array(), 'id', 'region_type', 'id', 'asc', trans('cruds.select'), isset($input) ? $input->region_type_id : 0)?>
                    </select>
                    @if($errors->has('region_type_id'))
                    <em class="invalid-feedback">
                        {{ $errors->first('region_type_id') }}
                    </em>
                    @endif
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group {{ $errors->has('office_id') ? 'has-error' : '' }}">
                    <label for="office_id">{{ trans('cruds.office') }}</label>
                    @php
                    $where = [];
                    //$where[] = ['region_type_id','=',2] ;
                    $offices = \App\Office::where($where)->whereIn('id',acl())->get();
                    @endphp
                    <select id="office_id" name="office_id" class="form-control select2">
                        <option value=""></option>
                        @foreach ($offices as $office )
                        @php
                        $selected = "";
                        if(isset($input)){
                        if($office->id == $input->office_id){
                        $selected = 'selected';
                        }else{
                        $selected = '' ;
                        }
                        }else{
                        $selected = "";
                        }
                        @endphp
                        <option {{ $selected }} value="{{ $office->id }}">{{ $office->office_name }}</option>
                        @endforeach
                    </select>
                    @if($errors->has('office_id'))
                    <em class="invalid-feedback">
                        {{ $errors->first('office_id') }}
                    </em>
                    @endif
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group {{ $errors->has('agent_id') ? 'has-error' : '' }}">
                    <label for="agent_id">{{ trans('cruds.agent') }} </label>
                    @php
                    $where = [];
                    //$where[] = ['region_type_id','=',2] ;
                    $agents = \App\Agent::whereIn('office_id',acl())->get();
                    @endphp
                    <select id="agent_id" name="agent_id" class="form-control select2">
                        <option value=""></option>
                        @foreach ($agents as $agent )
                        @php
                        $selected = "";
                        if(isset($input)){
                        if($agent->id == $input->agent_id){
                        $selected = 'selected';
                        }else{
                        $selected = '' ;
                        }
                        }else{
                        $selected = "";
                        }
                        @endphp
                        <option {{ $selected }} value="{{ $agent->id }}">{{ $agent->agent_name }}</option>
                        @endforeach
                    </select>
                    @if($errors->has('agent_id'))
                    <em class="invalid-feedback">
                        {{ $errors->first('agent_id') }}
                    </em>
                    @endif
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group">
                    <label>&nbsp;</label><br>
                    <button class="btn btn-success" type="submit">
                        <i class="fa fa-search"></i>{{__('cruds.generate')}}
                    </button>
                </div>
            </div>
        </div>
    </form>
    @php
    $slug = slug();
    $current_receive = $slug."_current_receive";
    @endphp
    @if(isset($vAgents))
    <div class="row row-sm">
        <div class="col-md-12">
            <div class="card-body">
                <div class="table-responsive">
                    @foreach ($vAgents as $value)

                    <h2>{{ __('cruds.agent_name') }} : {{ $value->agent_name }}</h2>
                    <hr>
                    <table class=" table table-bordered table-striped table-hover datatable datatable-Income">
                        <thead>
                            <tr>
                                <th rowspan="2">{{ __('cruds.sl') }}</th>
                                <th rowspan="2">{{ __('cruds.passenger_service_name') }}</th>
                                <th rowspan="2">{{ __('cruds.passport_no') }}</th>
                                <th rowspan="2">{{ __('cruds.office_name') }}</th>
                                <th rowspan="2">{{ __('cruds.visa_type') }}</th>
                                <th colspan="3">{{ __('cruds.customer_transaction_details') }}</th>
                                <th rowspan="2">{{ __('cruds.total_receive') }}</th>
                                <th rowspan="2">{{ __('cruds.due_amount') }}</th>
                                <th rowspan="2">{{ __('cruds.total_payment') }}</th>
                            </tr>
                            <tr>
                                <th>{{ __('cruds.contact_amount') }}</th>
                                <th>{{ __('cruds.contact_expense') }}</th>
                                <th>{{ __('cruds.contact_profit') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(isset($value->passengers))
                            @php
                            $total_contact_amount = 0 ;
                            $total_expense_amount = 0 ;
                            $total_profit_amount = 0 ;
                            $total_received_amount = 0 ;
                            $total_dues_amount = 0 ;
                            $total_payment_amount = 0 ;
                            @endphp
                            @foreach ($value->passengers as $key => $passenger )
                            @php
                            $total_contact_amount += $passenger->contact_amount ;
                            $total_expense_amount += $passenger->contact_expense ;
                            $total_profit_amount += $passenger->contact_profit ;
                            $total_received_amount += $passenger->received_amount ;
                            $total_dues_amount += $passenger->dues_amount ;
                            $total_payment_amount += $passenger->payment_amount ;
                            @endphp

                            <tr>
                                <td>{{ ($key+1) }}</td>
                                <td>{{ $passenger->first_name }}<br>{{ $passenger->first_name_ar }}</td>
                                <td>{{ $passenger->passport_no }}</td>
                                <td>{{ isset($passenger->passenger_office)?$passenger->passenger_office->office_name :''}}<br>{{ isset($passenger->passenger_office)?$passenger->passenger_office->office_name_ar:'' }}
                                </td>
                                <td>{{ isset($passenger->visa_type)?$passenger->visa_type->type_name:'' }}</td>
                                <td class="tx-right">{{ $passenger->contact_amount }}</td>
                                <td class="tx-right">{{ $passenger->contact_expense }}</td>
                                <td class="tx-right">{{ $passenger->contact_profit }}</td>
                                <td class="tx-right">{{ $passenger->received_amount }}</td>
                                <td class="tx-right">{{ $passenger->dues_amount }}</td>
                                <td class="tx-right">{{ $passenger->payment_amount }}</td>
                            </tr>
                            @endforeach
                            @endif
                        </tbody>
                        <tfoot>
                            <tr>
                                <th colspan="5" class="tx-right">Total:</th>
                                <th class="tx-right">{{ $total_contact_amount }}/=</th>
                                <th class="tx-right">{{ $total_expense_amount }}/=</th>
                                <th class="tx-right">{{ $total_profit_amount }}/=</th>
                                <th class="tx-right">{{ $total_received_amount }}/=</th>
                                <th class="tx-right">{{ $total_dues_amount }}/=</th>
                                <th class="tx-right">{{ $total_payment_amount }}/=</th>
                            </tr>
                        </tfoot>
                    </table>

                    @endforeach


                </div>
            </div>
        </div>
    </div>
    @endif
</main>
@endsection