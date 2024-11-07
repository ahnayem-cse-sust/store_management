<option value="">{{trans('cruds.select')}}</option>
@foreach($values as $key=>$value)
<?php $attr = '';$display = '';
if (isset($dataColumns)) {
    foreach ($dataColumns as $key1 => $value1) {
        $attr .= ' data-' . $value1 . '=' . $value->$value1;
    }
}
if (isset($displayColumns)) {
    foreach ($displayColumns as $key2 => $value2) {
        $display .= $value->$value2.' - ';
    }
    $display = chop($display,' - ');
}
?>
<option value="{{$value->$valueColumn}}" {{$attr}}>{{$display}}</option>
@endforeach