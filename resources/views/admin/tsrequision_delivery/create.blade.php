@extends('layouts.admin')
@section('content')
<div class="row row-sm">
    <div class="col-md-12 col-xl-12 col-xs-12 col-sm-12">
        <div class="card border custom-card">
            <div class="card-header custom-card-header">
                <h5 class="main-content-label mb-0">
                    {{ trans('cruds.tsrequisition_delivery') }}
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
                <form action="{{ route('admin.tsrdelivery.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row justify-content-center">
                        <div class="col-md-3">
                            <div class="form-group">
                                <p class="mg-b-10 tx-semibold">{{__('cruds.tsrequisition_no')}} (<span
                                        class="required">*</span>)
                                </p>
                                <select id="tsrequisition_id" name="tsrequisition_id" class="form-control select2" required>
                                    <?=options('tsrequisitions', [['status', '=', 'Approved']], array(), 'id', 'tsrequisition_code', 'id', 'desc', trans('cruds.select'), 0)?>
                                </select>
                                @if($errors->has('tsrequisition_id'))
                                <em class="invalid-feedback">
                                    {{ $errors->first('tsrequisition_id') }}
                                </em>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div id="content">

                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
@parent
<script>
$(document).on('change', '#tsrequisition_id', function() {
    let tsrequisition_id, url;
    tsrequisition_id = $(this).val();
    if (!tsrequisition_id) {
        $('#content').empty();
        return;
    }
    url = '/admin/tools_store_management/tsrdelivery/initialize';
    $.ajax({
            async: false,
            headers: {
                'x-csrf-token': _token
            },
            method: 'POST',
            url: url,
            data: {
                tsrequisition_id: tsrequisition_id
            }
        })
        .done(function(data) {
            $('#content').html(data);
        })
    /*     setTimeout(() => {
            GenerateCode();
        }, 1000); */
})
</script>
@endsection