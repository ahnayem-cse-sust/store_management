@extends('layouts.admin')
@section('content')
<main>
    <form action="/admin/report_management/generate_balance_transfer" method="get" target="_blank">
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
                    <label for="office_id">{{ trans('cruds.office') }} (<span
                        class="required">*</span></label>
                    @php
                    $where = [];
                    //$where[] = ['region_type_id','=',2] ;
                    $offices = \App\Office::where($where)->whereIn('id',acl())->get();
                    @endphp
                    <select id="office_id" name="office_id" class="form-control select2" required>
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
                <div class="form-group">
                    <label>&nbsp;</label><br>
                    <button class="btn btn-success" type="submit">
                        <i class="fa fa-search"></i>{{__('cruds.generate')}}
                    </button>
                </div>
            </div>
        </div>
    </form>
</main>
@endsection