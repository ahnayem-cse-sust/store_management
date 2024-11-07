@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('cruds.language') }} {{ trans('cruds.list') }}
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-Role">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        @foreach(config('panel.available_languages') as $langLocale => $langName)
                        <th>
                            {{ $langName }}
                        </th>
                        @endforeach
                    </tr>
                </thead>
                <tbody>
                    @foreach($translations as $key => $translation)
                    <tr data-entry-id="<?php echo htmlentities($key, ENT_QUOTES, 'UTF-8', false) ?>">
                        <td>

                        </td>
                        @foreach ($locales as $key1=>$locale)
                        <?php $t = isset($translation[$key1]) ? $translation[$key1] : null?>
                        <td>
                            @if($locale != 'English')
                            <a onclick="setData(this)" data-bs-toggle="modal" href="#translatorModal"
                                class="editable status-<?php echo $t ? $t->status : 0 ?> locale-<?php echo $locale ?>"
                                data-locale="<?php echo $key1 ?>"
                                data-key="<?php echo htmlentities($key, ENT_QUOTES, 'UTF-8', false) ?>"
                                data-pk="<?php echo $t ? $t->id : 0 ?>"
                                data-title="Enter translation"><?php echo $t ? htmlentities($t->value, ENT_QUOTES, 'UTF-8', false) : '<span class="fa fa-edit"></span>' ?></a>
                            @else
                            <?php echo $t ? htmlentities($t->value, ENT_QUOTES, 'UTF-8', false) : '' ?>
                            @endif
                        </td>
                        @endforeach
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Modal  -->

        <div class="modal fade" id="translatorModal" style="display: none" aria-modal="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content modal-content-demo">
                    <div class="modal-header">
                        <h6 class="modal-title">Basic Modal</h6>
                        <button aria-label="Close" class="btn-close" data-bs-dismiss="modal" type="button"></button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <input type="hidden" id="pk">
                            <input type="hidden" id="key">
                            <input type="hidden" id="locale">
                            <textarea id="value" cols="12" rows="4" class="form-control"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn ripple btn-success" type="button" onclick="saveData()">Save changes</button>
                        <button class="btn ripple btn-danger" data-bs-dismiss="modal" type="button">Close</button>
                    </div>
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
    let route = "{{ route('admin.language.massDestroy') }}";
    let hasPermission = 0;
    <?php if (delete()) {?>
    hasPermission = 1;
    <?php }?>
    deleteSelected(route, hasPermission);
})

function setData($this) {
    var key, value, pk, locale;
    key = $($this).data('key');
    value = $($this).text();
    pk = $($this).data('pk');
    locale = $($this).data('locale');
    $('#key').val(key);
    $('#value').html(value);
    $('#pk').val(pk);
    $('#locale').val(locale);
}

function saveData($this) {
    var key, value, pk, locale;
    key = $('#key').val();
    value = $('#value').val();
    pk = $('#pk').val();
    locale = $('#locale').val();

    var formData = {
        key: key,
        value: value,
        pk: pk,
        locale: locale,
        "_token": '{{csrf_token()}}'
    };

    var formURL = "{{url('admin/language/updateLang')}}";
    $.ajax({
        url: formURL,
        type: "POST",
        dataType: "json",
        data: formData,
        success: function(data) {
            if (data) {
                if (data.status == '200') {
                    alert(data.msg);
                    //$('.modal-header button').trigger('click');
                    location.reload();
                } else {
                    alert(data.msg);
                }
            }
        }
    });
}
</script>
@endsection