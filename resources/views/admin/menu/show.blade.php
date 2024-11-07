@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
         {{ trans('cruds.office.title') }}
    </div>

    <div class="card-body">
        <div class="mb-2">
            <table class="table table-bordered table-striped">
                <tbody>
                <tr>
                        <th width="12%">
                            {{ trans('cruds.office.fields.office_type') }}
                        </th>
                        <td>
                            {{ officeType()[$office->office_type] }}
                        </td>
                    </tr>
                    <tr>
                        <th width="12%">
                            {{ trans('cruds.office.fields.office_name') }}
                        </th>
                        <td>
                            {{ $office->office_name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.office.fields.office_location') }}
                        </th>
                        <td>
                            {{ $office->office_location }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <a style="margin-top:20px;" class="btn btn-default" href="{{ url()->previous() }}">
                {{ trans('cruds.back_to_list') }}
            </a>
        </div>
    </div>
</div>
@endsection