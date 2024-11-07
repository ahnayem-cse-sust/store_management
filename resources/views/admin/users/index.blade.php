@extends('layouts.admin')
@section('content')
<div class="card">
    <div class="row">
        <div class="col-md-12">
            <div class="card-body">
                <div class="card-header">
                    {{ trans('cruds.user_list') }}
                </div>
                <div class="table-responsive">
                    <table class=" table table-bordered table-striped table-hover datatable datatable-User">
                        <thead>
                            <tr>
                                <th width="10">

                                </th>
                                <th>
                                    {{ trans('cruds.actions') }}
                                </th>
                                
                                <th>
                                    {{ trans('cruds.user_code') }}
                                </th>
                                <th>
                                    {{ trans('cruds.user_role') }}
                                </th>
                                <th>
                                    {{ trans('cruds.acl') }}
                                </th>
                                <th>
                                    {{ trans('cruds.entry_office') }}
                                </th>
                                <th>
                                    {{ trans('cruds.section') }}
                                </th>
                                <th>
                                    {{ trans('cruds.user_name') }}
                                </th>
                                <th>
                                    {{ trans('cruds.designation') }}
                                </th>
                                <th>
                                    {{ trans('cruds.epf_no') }}
                                </th>
                                <th>
                                    {{ trans('cruds.mobile_no') }}
                                </th>
                                <th>
                                    {{ trans('cruds.email') }}
                                </th>
                                <th>
                                    {{ trans('cruds.profile_photo') }}
                                </th>
                                <th>
                                    {{ trans('cruds.signature') }}
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $key => $user)
                            @php
                                $acl = explode(',',$user->acl);
                                $acls = \App\Branch::whereIn('id',$acl)->get();
                            @endphp
                            <tr data-entry-id="{{ $user->id }}">
                                <td>

                                </td>
                                <td>
                                    @if(show())
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.users.show', $user->id) }}">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    @endif
                                    @if(edit())
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.users.edit', $user->id) }}">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    @endif
                                    @if(delete())
                                    <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST"
                                        onsubmit="return confirm('{{ trans('cruds.areYouSure') }}');"
                                        style="display: inline-block;">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <button type="submit" class="btn btn-xs btn-danger">
                                            <i class="fas fa-trash"></i></button>
                                    </form>
                                    @endif
                                </td>
                                
                                <td>
                                    {{ $user->user_code ?? '' }}
                                </td>
                                <td>
                                    {{isset($user->role)?$user->role->title:''}}
                                </td>
                                <td>
                                   @foreach ($acls as $office)
                                       {{ $office->short_name }} <br>
                                   @endforeach
                                </td>
                                <td>
                                    {{isset($user->office)?$user->office->short_name:''}}
                                </td>
                                <td>
                                    {{isset($user->section)?$user->section->section_name:''}}
                                </td>
                                <td>
                                    {{ $user->name ?? '' }}
                                </td>
                                <td>
                                    {{isset($user->designation)?$user->designation->designation_name:''}}
                                </td>
                                <td>
                                    {{ $user->epf_no ?? '' }}
                                </td>
                                <td>
                                    {{ $user->mobile_no ?? '' }}
                                </td>
                                <td>
                                    {{ $user->email ?? '' }}
                                </td>
                                <td>
                                    @if (checkExist($user->photo))
                                    <img alt="Image" class="img-thumbnail" style="width: 90px;height:90px;"
                                    src="{{asset($user->photo)}}">
                                    @endif
                                </td>
                                <td>
                                    @if (checkExist($user->signature))
                                    <img alt="Image" class="img-thumbnail" style="width: 90px;height:90px;"
                                    src="{{asset($user->signature)}}">
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
@parent
<script>
$(function() {
    let route = "{{ route('admin.user_management.users.massDestroy') }}";
    let hasPermission = 0;
    <?php if (delete()) {?>
    hasPermission = 1;
    <?php }?>
    deleteSelected(route, hasPermission);
})

$(document).on("click", ".editAction", function() {
    let response = editAction(this);
    acl = response.acl;
    acl = acl.split(',');
    $("#update_id").val(response.id);
    $("#name").val(response.name);
    $("#email").val(response.email);
    $("#roles").val(response.role_id).trigger('change');
    
    $("#country_id").val(response.country_id).trigger('change');
    setTimeout(() => {
        $("#acl").val(acl).trigger('change');
        $("#office_id").val(response.office_id).trigger('change');
    }, 1000);
})
</script>
@endsection