@extends('layouts.admin')
@section('content')
<div class="row row-sm">
    <div class="col-md-12 col-xl-12 col-xs-12 col-sm-12">
        <div class="card border custom-card">
            <div class="card-header custom-card-header">
                <h5 class="main-content-label mb-0">
                    {{ trans('cruds.tsitemreturn') }}
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
                <form action="{{ route('admin.tsitemreturn.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row justify-content-center">
                        <div class="col-md-3">
                            <div class="form-group">
                                <p class="mg-b-10 tx-semibold">{{__('cruds.issue_card_list')}}(<span
                                        class="required">*</span>)
                                </p>
                                <select id="tsitemissue_id" name="tsitemissue_id" class="form-control select2" required>
                                    <option></option>
                                    @isset($tsitemissues)
                                        @foreach ($tsitemissues as $key=>$value)
                                        @php
                                            $card = \App\Card::where('id',$value->card_id)->first();
                                            $card_code = isset($card)?$card->card_code:'' ;
                                            $user = \App\User::where('id',$card->user_id)->first();
                                            $user_code = isset($user)?$user->user_code:'' ;
                                            $epf_no = isset($user)?$user->epf_no:'' ;
                                            $name = isset($user)?$user->name:'' ;
                                        @endphp
                                            <option value="{{ $value->id }}">{{ $value->tsitemissue_code . ' - '. $card_code . ' - '. $epf_no. ' - '.$name }}</option>
                                        @endforeach
                                    @endisset
                                </select>
                                @if($errors->has('tsitemissue_id'))
                                <em class="invalid-feedback">
                                    {{ $errors->first('tsitemissue_id') }}
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
$(document).on('change', '#tsitemissue_id', function() {
    let tsitemissue_id, url;
    tsitemissue_id = $(this).val();
    if (!tsitemissue_id) {
        $('#content').empty();
        return;
    }
    url = '/admin/tools_store_management/tsitemreturn/initialize';
    $.ajax({
            async: false,
            headers: {
                'x-csrf-token': _token
            },
            method: 'POST',
            url: url,
            data: {
                tsitemissue_id: tsitemissue_id
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