<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\RequisitionForMassDestroyRequest;
use App\Http\Requests\RequisitionForStoreRequest;
use App\Http\Requests\RequisitionForUpdateRequest;
use App\RequisitionFor;
use Illuminate\Http\Request;

class RequisitionForController extends Controller
{
    public function index()
    {
        access();

        $requisitionfors = RequisitionFor::all();

        return view('admin.requisitionfor.index', compact('requisitionfors'));
    }

    public function create()
    {
        create();

        return view('admin.requisitionfor.create');
    }

    public function store(RequisitionForStoreRequest $request)
    {
        $input = $request->all();
        $requisitionfor_name = $input['requisitionfor_name'];
        $update_id = $request->update_id;
        $where = array();
        $where[] = ['requisitionfor_name', '=', $requisitionfor_name];
        if ($update_id == 0) {
            $row = find("RequisitionFor", $where, "id", "asc", "first");
            if (isset($row)) {
                $message = 'info_' . trans('cruds.exist_message');
            } else {
                RequisitionFor::create($input);
                $message = 'success_' . trans('cruds.insert_message');
            }
        } else {
            $where[] = ['id', '<>', $update_id];
            $row = find("RequisitionFor", $where, "id", "asc", "first");
            if (isset($row)) {
                $message = 'info_' . trans('cruds.exist_message');
            } else {
                $requisitionfor = RequisitionFor::find($update_id);
                $requisitionfor->update($input);
                $message = 'success_' . trans('cruds.update_message');
            }
        }
        return redirect()->route('admin.requisitionfor.index')->with("message", $message);
    }

    public function edit(RequisitionFor $requisitionfor)
    {
        edit();

        return view('admin.requisitionfor.edit', compact('requisitionfor'));
    }

    public function update(RequisitionForUpdateRequest $request, RequisitionFor $requisitionfor)
    {
        $requisitionfor->update($request->all());

        return redirect()->route('admin.requisitionfor.index');
    }

    public function show(RequisitionFor $requisitionfor)
    {
        show();

        return view('admin.requisitionfor.show', compact('requisitionfor'));
    }

    public function destroy(RequisitionFor $requisitionfor)
    {
        delete();

        $requisitionfor->delete();

        $message = 'danger_' . trans('cruds.delete_message');

        return back()->with('message', $message);
    }

    public function massDestroy(RequisitionForMassDestroyRequest $request)
    {
        delete();

        RequisitionFor::whereIn('id', request('ids'))->delete();

        //return response(null, Response::HTTP_NO_CONTENT);

        $message = 'danger_' . trans('cruds.delete_message');

        return back()->with('message', $message);
    }
}
