@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('cruds.show') }} {{ trans('cruds.tsitemreturn') }}
    </div>

    <div class="card-body">
        <div class="mb-2  bg-bisque">
            <br>
            <div>
                <h2 class="text-center">Bangladesh Industrial Technical Assistance Center (BITAC), Dhaka</h2>
                <h3 class="text-center">Tejgoan, Industrial Area, Dhaka-1208</h3>
                <h4 class="text-center"><u>Tools Store Return Card</u></h4>
            </div>
            <br>
            <div style="width:80%;margin:0 auto;">
                <table style="width:100%" class="table1 table-bordered1 table-striped1">
                    <tbody>
                        <tr>
                            <th style="width:300px;">{{ __('cruds.card_no') }}</th>
                            <td>: 
                                @php
                                $user = isset($tsitemreturn->card)?isset($tsitemreturn->card->user)?$tsitemreturn->card->user:'':'';
                                $epf_no = isset($user)?$user->epf_no:'';
                                $name = isset($user)?$user->name:'';
                                $designation = isset($user)?isset($user->designation)?$user->designation->designation_name:'':'';
                                $section = isset($user)?isset($user->section)?$user->section->section_name:'':'';
                            @endphp
                            {{ isset($tsitemreturn->card)?$tsitemreturn->card->card_code.' - '.$epf_no.' - '.$name:'' }}
                        </tr>
                        <tr>
                            <th>{{ __('cruds.section') }}</th>
                            <td>:
                                {{ $section }}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <br>
            <div>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <tr>
                                <th>{{ __('cruds.sl') }}</th>
                                <th>{{ __('cruds.item') }}</th>
                                <th>{{ __('cruds.issued_qty') }}</th>
                                <th>{{ __('cruds.return_qty') }}</th>
                                <th>{{ __('cruds.issue_date') }}</th>
    
                                <th>Receiver Sign</th>
                                <th>Return Date</th>
                                <th>Store Sign</th>
                                <th>Condition</th>
                                <th>Remarks</th>
                            </tr>
                        </tr>
                    </thead>
                    <tbody>
                        @if(isset($tsitemreturn->tsitemreturnDetails))
                        @foreach($tsitemreturn->tsitemreturnDetails as $key => $value)
                        <tr>
                            <td>{{ ($key + 1)}}
                            </td>
                            <td>{{ isset($value->item)?$value->item->item_name:'' }}</td>
                            
                            <td style="text-align: right;">{{$value->order_quantity}}
                            </td>
                            <td style="text-align: right;">{{$value->return_quantity}}
                            </td>
                            <td>{{ isset($tsitemreturn->tsitemissue)?$tsitemreturn->tsitemissue->tsitemissue_date:'' }}</td>
                            <td></td>
                            <td>{{ $tsitemreturn->tsitemreturn_date }}</td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
            <br>
            <a class="btn btn-warning ripple" href="{{ url()->previous() }}">
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
