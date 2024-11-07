<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CrudController extends Controller
{
    public function edit(Request $request)
    {
        $model = $request->table;
        $column = $request->column;
        $value = $request->value;
        $response = find($model, array($column => $value), $column, 'asc', 'first');
        return response()->json($response);
    }
    public function update(Request $request)
    {
        $model = $request->table;
        $column = $request->column;
        $value = $request->value;
        $data = $request->data;

        $row = find($model, array($column => $value), $column, 'asc', 'first');
        $row->update($data);
        $response = array(
            'msg' => trans('cruds.update_message'),
        );
        return response()->json($response);
    }
    public function save(Request $request)
    {
        $data = $request->except('table');
        $table = $request->table;
        $row = DB::table($table)->insert($data);
        $response = array(
            'row' => $row,
            'msg' => trans('cruds.insert_message'),
        );
        return response()->json($response);
    }
    public function get()
    {
        $where = request()->where;
        $model = request()->model;
        $return = request()->rtn;
        $with = request()->with;
        $response = find($model, $where, 'id', 'asc', $return, $with);
        return response()->json($response);
    }
    public function load(Request $request)
    {
        $where = $request->where;
        $model = $request->model;
        $data['valueColumn'] = $request->valueColumn;
        $data['displayColumns'] = $request->displayColumn;
        $data['values'] = find($model, $where, 'id', 'asc', 'get');
        $options = view('admin.common.options', $data);
        return $options;
    }
    public function loadData()
    {
        $where = request()->where;
        $model = request()->model;
        $orderBy = request()->orderBy;
        $serialize = request()->serialize;
        $returnType = request()->returnType;
        $data['values'] = find($model, $where, $orderBy, $serialize, $returnType);
        return response()->json($data);
    }
    public function getPage()
    {
        $where = request()->where;
        $model = request()->model;
        $page = request()->page;
        $data['values'] = find($model, $where, 'id', 'asc', 'get');
        $response = view($page, $data)->render();
        return $response;
    }
    public function remove(Request $request)
    {
        $model = $request->table;
        $column = $request->column;
        $value = $request->value;
        $model = 'App\\' . $model;
        $where = [];
        $where[] = [$column, '=', $value];
        $response = $model::where($where)->forceDelete();
        if ($response) {
            return 1;
        } else {
            return 0;
        }
    }
    public function delete()
    {
        $model = request()->model;
        $where = request()->where;
        $modelClass = 'App\\' . $model;
        $bool = $modelClass::where($where)->delete();
        if ($bool) {
            return 1;
        } else {
            return 0;
        }
    }
    public function test()
    {
        $opening = presentStock(1, 1, 1, 2, 1);
        return $opening;
        /* $digits = 4;
        $verification_code = str_pad(rand(0, pow(10, $digits) - 1), $digits, '0', STR_PAD_LEFT);
        $mobile_no = "+8801855996632";
        $content = "Your OTP is $verification_code. Don't share it.";
        $result = sendSmsBD($mobile_no, $content);
        return $result; */
        /* $mobile_no = "+966555509948";
        $content = "رمز التحقق هو $verification_code لا تشارك احد";
        $result = sendSms($mobile_no, $content);
        return $result; */

        $digits = 4;
        $verification_code = str_pad(rand(0, pow(10, $digits) - 1), $digits, '0', STR_PAD_LEFT);
        $mobile_no = "+8801855996632";
        $content = "Your OTP is $verification_code. Don't share it.";
        sendEmail('ebabulhossain@gmail.com', $content);

    }
    public function exist()
    {
        $table = request()->table;
        $where = request()->where;
        $data = findAll($table, $where, '', '');
        if (count($data)) {
            return 1;
        } else {
            return 0;
        }
    }
    public function generateCode()
    {
        $model = request()->model;
        $where = request()->where;
        $prefix = request()->prefix;
        $prefix = Str::upper($prefix);
        $field = request()->field;
        $model = 'App\\' . $model;
        $obj = $model::where($where)->orderBy('id', 'desc')->first();
        if (isset($obj)) {
            $count = $obj = $model::where($where)->count();
            $sl = PAD($count + 1);
            $unique_code = $prefix . $sl;
            return $unique_code;
        } else {
            return $prefix . "0001";
        }
    }
}
