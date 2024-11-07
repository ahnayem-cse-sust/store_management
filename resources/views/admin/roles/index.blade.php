@extends('layouts.admin')
@section('content')
@if(create())
<div style="margin-bottom: 10px;" class="row">
    <div class="col-lg-12">
        <a class="btn btn-success" href="{{ route("admin.roles.create") }}">
            {{ trans('cruds.add') }} {{ trans('cruds.role') }}
        </a>
    </div>
</div>
@endif
<div class="card">
    <div class="card-header">
        {{ trans('cruds.role') }} {{ trans('cruds.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-Role">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.sl') }}
                        </th>
                        <th>
                            {{ trans('cruds.role') }}
                        </th>
                        <!-- <th>
                            {{ trans('cruds.role.fields.permissions') }}
                        </th> -->
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($roles as $key => $role)
                    <tr data-entry-id="{{ $role->id }}">
                        <td>

                        </td>
                        <td>
                            {{ ($key + 1) }}
                        </td>
                        <td>
                            {{ $role->title ?? '' }}
                        </td>
                        <!--  <td>
                                @foreach($role->permissions as $key => $item)
                                    <span class="badge badge-info">{{ $item->title }}</span>
                                @endforeach
                            </td> -->
                        <td>
                            @if(show())
                            <a class="btn btn-xs btn-primary" href="{{ route('admin.roles.show', $role->id) }}">
                                {{ trans('cruds.view') }}
                            </a>
                            @endif

                            @if(edit())
                            <a class="btn btn-xs btn-info" href="{{ route('admin.roles.edit', $role->id) }}">
                                {{ trans('cruds.edit') }}
                            </a>
                            @endif

                            @if(delete())
                            <form action="{{ route('admin.roles.destroy', $role->id) }}" method="POST"
                                onsubmit="return confirm('{{ trans('cruds.areYouSure') }}');"
                                style="display: inline-block;">
                                <input type="hidden" name="_method" value="DELETE">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('cruds.delete') }}">
                            </form>
                            @endif

                        </td>

                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>


    </div>
</div>
@endsection
@section('scripts')
@parent
<script>
$(function() {
    let route = "{{ route('admin.user_management.roles.massDestroy') }}";
    let hasPermission = 0;
    <?php if (delete()) {?>
    hasPermission = 1;
    <?php }?>
    deleteSelected(route, hasPermission);
})
</script>
@endsection