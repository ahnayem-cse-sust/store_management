<table class="table">
    <thead>
        <tr>
            <th>{{__('cruds.sl')}}</th>
            <th>{{__('cruds.item_name')}}</th>
            <th>{{__('cruds.opening_quantity')}}</th>
            <th>{{__('cruds.opening_price')}}</th>
            <th>{{__('cruds.actions')}}</th>
        </tr>
    </thead>
    <tbody>
        @if(isset($values))
        @foreach ($values as $key => $value)
        <tr>
            <td>{{ ($key+1) }}
                <input type="hidden" name="item_id[]" value="{{ $value->id }}">
            </td>
            <td>{{ $value->item_name }}</td>
            <td>
                <input type="number" name="opening_quantity[]" class="form-control"
                    placeholder="{{ trans('cruds.opening_quantity') }}"
                    value="{{ old('opening_quantity', isset($opening) ? $opening->opening_quantity : '') }}" required>
            </td>
            <td>
                <input type="number" name="opening_price[]" class="form-control"
                    placeholder="{{ trans('cruds.opening_price') }}"
                    value="{{ old('opening_price', isset($opening) ? $opening->opening_price : '') }}">
            </td>
            <td>
                <a href="javascript:void(0)" class="btn btn-warning btnSaveOrUpdate">
                    Save
                </a>
            </td>
        </tr>
        @endforeach
        @endif
    </tbody>
</table>
<div class="col-md-3" @if(!count($values)) style="display:none;" @endif>
    <input class="btn btn-danger" type="submit" value="{{ trans('cruds.save') }}">
</div>
<script>

</script>