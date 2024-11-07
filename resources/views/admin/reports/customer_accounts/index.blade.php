@extends('layouts.admin')
@section('content')
<main>
    <form action="/admin/report_management/generate_customer_account" method="get">
        <div class="row row-sm">
            <div class="col-md-2">
                <div class="form-group {{ $errors->has('from_date') ? 'has-error' : '' }}">
                    <label for="from_date">{{ trans('cruds.from_date') }} </label>
                    <input type="text" id="from_date" name="from_date" class="form-control datepicker-date" value="{{ isset($input)?$input->from_date:date('d-m-Y') }}" autocomplete="off">
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group {{ $errors->has('to_date') ? 'has-error' : '' }}">
                    <label for="to_date">{{ trans('cruds.to_date') }} </label>
                    <input type="text" id="to_date" name="to_date" class="form-control datepicker-date" value="{{ isset($input)?$input->to_date:date('d-m-Y') }}" autocomplete="off">
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
            <div class="col-md-2 sponsor d-none">
                <div class="form-group {{ $errors->has('sponsor_id') ? 'has-error' : '' }}">
                    <label for="sponsor_id">{{ trans('cruds.sponsor') }} (<span
                            class="required">*</span>)</label>
                    <select id="sponsor_id" name="sponsor_id" class="form-control select2">
                        <option value=""></option>
                        <?=options('sponsors', array(), array(), 'id', 'sponsor_name', 'id', 'asc', '', isset($input) ? $input->sponsor_id : 0)?>
                    </select>
                    @if($errors->has('sponsor_id'))
                    <em class="invalid-feedback">
                        {{ $errors->first('sponsor_id') }}
                    </em>
                    @endif
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group {{ $errors->has('visa_type_id') ? 'has-error' : '' }}">
                    <label for="visa_type_id">{{ trans('cruds.visa_type') }} </label>
                    <select id="visa_type_id" name="visa_type_id" class="form-control select2">
                        <option value=""></option>
                        <?=options('visa_types', array(), array(), 'id', 'type_name', 'id', 'asc', '', isset($input) ? $input->visa_type_id : 0)?>
                    </select>
                    @if($errors->has('visa_type_id'))
                    <em class="invalid-feedback">
                        {{ $errors->first('visa_type_id') }}
                    </em>
                    @endif
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group {{ $errors->has('passenger_id') ? 'has-error' : '' }}">
                    <label for="passenger_id">{{ trans('cruds.passenger_service_name') }}
                    </label>
                    @php
                        $passengers = \App\Passenger::whereIn('passenger_office_id',acl())->orderBy('id','desc')->get();
                        $passenger_options = '<option value=""></option>';
                        foreach ($passengers as $key => $value) {
                            $selected = "" ;
                            if(isset($input)){
                                if($value->id == $input->passenger_id){
                                    $selected = "selected";
                                }else{
                                    $selected = "";
                                }
                            }
                            $passenger_id = $value->prefix . PAD($value->serial);
                            $passenger_options .= "<option $selected value='$value->id'> $passenger_id - $value->first_name $value->middle_name $value->last_name</option>";
                        }
                    @endphp
                    <select id="passenger_id" name="passenger_id" class="form-control select2">
                        <?=isset($passenger_options)?$passenger_options:''?>
                    </select>
                    @if($errors->has('passenger_id'))
                    <em class="invalid-feedback">
                        {{ $errors->first('passenger_id') }}
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
    @if(isset($vouchers))
    <div class="row row-sm">
        <div class="col-md-12">
            <div class="card-body">
                <div class="table-responsive">
                    <table class=" table table-bordered table-striped table-hover datatable datatable-Income">
                        <thead>
                            <tr>
                                <th rowspan="2">{{ __('cruds.sl') }}</th>
                                <th rowspan="2">{{ __('cruds.passenger_service_name') }}</th>
                                <th rowspan="2">{{ __('cruds.passport_no') }}</th>
                                <th rowspan="2">{{ __('cruds.office_name') }}</th>
                                <th rowspan="2">{{ __('cruds.visa_type') }}</th>
                                <th rowspan="2">{{ __('cruds.agent_name') }}</th>
                                <th rowspan="2">{{ __('cruds.sponsor_name') }}</th>
                                <th colspan="3">{{ __('cruds.customer_transaction_details') }}</th>
                                <th rowspan="2">{{ __('cruds.total_receive') }}</th>
                                <th rowspan="2">{{ __('cruds.total_dues') }}</th>
                                <th rowspan="2">{{ __('cruds.expense_amount') }}</th>
                                <th rowspan="2">{{ __('cruds.action') }}</th>
                            </tr>
                            <tr>
                                <th>{{ __('cruds.contact_amount') }}</th>
                                <th>{{ __('cruds.contact_expense') }}</th>
                                <th>{{ __('cruds.contact_profit') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $total_contact_amount = 0 ;
                                $total_expense_amount = 0 ;
                                $total_profit_amount = 0 ;
                                $total_received_amount = 0 ;
                                $total_dues_amount = 0 ;
                                $total_payment_amount = 0 ;
                            @endphp
                            @foreach ($vouchers as $key => $voucher )
                            @php
                                $where = [];
                                $where[] = ['passenger_id','=',$voucher->passenger_id];
                                $where[] = ['transaction_type','=','Cr'];
                                $total_transaction_received = \App\ReceiveVoucherDetails::where($where)->sum($current_receive);
                                $total_transaction_dues = $voucher->contact_amount - $total_transaction_received ;

                                $where = [];
                                $where[] = ['passenger_id','=',$voucher->passenger_id];
                                $where[] = ['transaction_type','=','Dr'];
                                $total_transaction_payment = \App\ReceiveVoucherDetails::where($where)->sum($current_receive);

                                $total_contact_amount += $voucher->contact_amount ;
                                $total_expense_amount += $voucher->expense_amount ;
                                $total_profit_amount += $voucher->profit_amount ;
                                $total_received_amount += $total_transaction_received ;
                                $total_dues_amount += $total_transaction_dues ;
                                $total_payment_amount += $total_transaction_payment ;

                            @endphp
                                <tr>
                                    <td>{{ ($key+1) }}</td>
                                    <td>{{ $voucher->first_name }}<br>{{ $voucher->first_name_ar }}</td>
                                    <td>{{ $voucher->passport_no }}</td>
                                    <td>{{ $voucher->office_name }}<br>{{ $voucher->office_name_ar }}</td>
                                    <td>{{ $voucher->type_name }}</td>
                                    <td>{{ $voucher->agent_name }}<br>{{ $voucher->agent_name_ar }}</td>
                                    <td>{{ $voucher->sponsor_name }}<br>{{ $voucher->sponsor_name_ar }}</td>
                                    <td class="tx-right">{{ $voucher->contact_amount }}</td>
                                    <td class="tx-right">{{ $voucher->expense_amount }}</td>
                                    <td class="tx-right">{{ $voucher->profit_amount }}</td>
                                    <td class="tx-right">{{ $total_transaction_received }}</td>
                                    <td class="tx-right">{{ $total_transaction_dues }}</td>
                                    <td class="tx-right">{{ $total_transaction_payment }}</td>
                                    <td>
                                        <a href="/admin/report_management/view_customer_account?passenger_id={{ $voucher->passenger_id }}" target="_blank" class="btn ripple btn-warning">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th colspan="7x" class="tx-right">Total : </th>
                                <th class="tx-right">{{ $total_contact_amount }}/=</th>
                                <th class="tx-right">{{ $total_expense_amount }}/=</th>
                                <th class="tx-right">{{ $total_profit_amount }}/=</th>
                                <th class="tx-right">{{ $total_received_amount }}/=</th>
                                <th class="tx-right">{{ $total_dues_amount }}/=</th>
                                <th class="tx-right">{{ $total_payment_amount }}/=</th>
                                <th>&nbsp;</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>    
        </div>
    </div>
    @endif
</main>
@endsection