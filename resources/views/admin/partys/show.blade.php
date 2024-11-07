@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('cruds.show') }} {{ trans('cruds.party') }}
    </div>

    <div class="card-body">
        <div class="mb-2">
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th style="width: 150px;">{{ __('cruds.party_code') }}</th>
                        <td>{{ $party->party_code }}</td>
                    </tr>
                    <tr>
                        <th>{{ __('cruds.party_name') }}</th>
                        <td>{{ $party->party_name }}</td>
                    </tr>
                    <tr>
                        <th>{{ __('cruds.address') }}</th>
                        <td>{{ $party->address }}</td>
                    </tr>
                    <tr>
                        <th>{{ __('cruds.contact_person') }}</th>
                        <td>{{ $party->contact_person }}</td>
                    </tr>
                    <tr>
                        <th>{{ __('cruds.contact_no') }}</th>
                        <td>{{ $party->contact_no }}</td>
                    </tr>
                    <tr>
                        <th>{{ __('cruds.email') }}</th>
                        <td>{{ $party->email }}</td>
                    </tr>
                </tbody>
            </table>
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