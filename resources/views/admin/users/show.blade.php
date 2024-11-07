@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('cruds.show') }} {{ trans('cruds.user') }}
    </div>

    <div class="card-body">
        @php
            $acl = explode(',',$user->acl);
            $acls = \App\Branch::whereIn('id',$acl)->get();
        @endphp
        <div class="mb-2">
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.user_code') }}
                        </th>
                        <td>
                            {{ $user->user_code }}
                        </td>
                    </tr>
                    <tr>
                        <th style="width:200px;">
                            {{ trans('cruds.user_role') }}
                        </th>
                        <td>
                            {{isset($user->role)?$user->role->title:''}}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.acl') }}
                        </th>
                        <td>
                            @foreach ($acls as $office)
                                {{ $office->short_name }} <br>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.entry_office') }}
                        </th>
                        <td>
                            {{isset($user->office)?$user->office->short_name:''}}
                         </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.section') }}
                        </th>
                        <td>
                            {{ isset($user->section)?$user->section->section_name:'' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.user_name') }}
                        </th>
                        <td>
                            {{ $user->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.designation') }}
                        </th>
                        <td>
                            {{ isset($user->designation)?$user->designation->designation_name:'' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.epf_no') }}
                        </th>
                        <td>
                            {{ $user->epf_no }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.mobile_no') }}
                        </th>
                        <td>
                            {{ $user->mobile_no }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.email') }}
                        </th>
                        <td>
                            {{ $user->email }}
                        </td>
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