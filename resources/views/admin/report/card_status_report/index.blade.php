@extends('layouts.admin')
@section('content')
<div class="row row-sm">
    <div class="col-md-12 col-xl-12 col-xs-12 col-sm-12">
        <div class="card border custom-card">
            <div class="card-header custom-card-header">
                <h5 class="main-content-label mb-0">
                    {{ trans('cruds.card_status_report') }}
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
                <form action="/admin/report_management/report/generate-card-status-report" method="GET">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <p class="mg-b-10 tx-semibold">{{__('cruds.card')}}
                                </p>
                                <select id="card_id" name="card_id" class="form-control select2">
                                    <option></option>
                                    @foreach ($cards as $card)
                                    @php
                                    $selected = '';
                                    if(isset($card_id)){
                                    if($card_id == $card->card_id){
                                    $selected = 'selected';
                                    }else{
                                    $selected = '';
                                    }
                                    }else{
                                    $selected = '' ;
                                    }
                                    @endphp
                                    <option {{ $selected }} value="{{ $card->card_id }}">
                                        {{ $card->card_code.' - '. $card->epf_no.' - '.$card->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <p class="mg-b-10 tx-semibold">{{__('cruds.item_name')}}
                                </p>
                                <select id="item_id" name="item_id" class="form-control select2">
                                    <?=options('items', array(), array('item_code', 'item_name'), 'id', '', 'id', 'asc', trans('cruds.select'), isset($item_id) ? $item_id : 0)?>
                                </select>
                                @if($errors->has('item_id'))
                                <em class="invalid-feedback">
                                    {{ $errors->first('item_id') }}
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
                @if(isset($card_id))
                @php
                $card = \App\Card::where('id',$card_id)->first();
                $user = isset($card)?$card->user:null;
                $photo = isset($user)?$user->photo:'' ;

                if(checkExist($photo)){
                $photo = $photo ;
                }else{
                $photo = '/assets/images/no_image.png' ;
                }

                @endphp
                <div class="row">
                    <div class="col-md-12">
                        <table style="width: 100%">
                            <tbody>
                                <tr>
                                    <th><span>Name : </span> {{ isset($user)?$user->epf_no .' - '. $user->name:'' }}
                                    </th>
                                    <th rowspan="3" style="text-align:center;width:120px;">
                                        <img src="{{ $photo }}" style="width:100px;" class="img-thumbnail" alt="" srcset="">
                                    </th>
                                </tr>
                                <tr>
                                    <th><span>Designation :
                                            {{ isset($user)?isset($user->designation)?$user->designation->designation_name:'':'' }}</span>
                                    </th>
                                </tr>
                                <tr>
                                    <th><span>Section :
                                            {{ isset($user)?isset($user->section)?$user->section->section_name:'':'' }}</span>
                                    </th>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                @endif
                <div>
                    @php
                    $style = '' ;
                    if(isset($card_id)){
                    $style = 'style=display:none';
                    }else{
                    $style = '' ;
                    }
                    @endphp
                    <table class="table table-bordered">
                        <thead>
                            <th>SL </th>
                            <th {{ $style }}>Card </th>
                            <th>Item </th>
                            <th>Quantity </th>
                        </thead>
                        <tbody>
                            @if(isset($issueItems))
                            @foreach ($issueItems as $key=>$value)
                            @php
                            $where = [] ;
                            $where[] = ['tsitemreturns.card_id','=',$value->card_id] ;
                            $where[] = ['tsitemreturn_details.item_id','=',$value->item_id] ;
                            $return_quantity = \App\TSItemReturnDetails::leftJoin('tsitemreturns',
                            'tsitemreturn_details.tsitemreturn_id', '=', 'tsitemreturns.id')
                            ->where($where)->sum('return_quantity');
                            $issue_quantity = $value->issue_quantity;
                            $return_quantity = isset($return_quantity)?$return_quantity:0;
                            $balance = $issue_quantity - $return_quantity ;
                            @endphp

                            <?php if ($balance > 0) {?>
                            <tr>
                                <td>{{ ($key +1) }}</td>
                                <td {{ $style }}>{{ $value->card_code . ' - '. $value->epf_no. ' - ' . $value->employee_name }}</td>
                                <td>{{ $value->item_code . ' - ' . $value->item_name }}</td>
                                <td class="text-center">{{ $balance }}</td>
                            </tr>
                            <?php }?>
                            @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection