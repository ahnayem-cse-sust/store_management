<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\VisaTypeMassDestroyRequest;
use App\Http\Requests\VisaTypeStoreRequest;
use App\Http\Requests\VisaTypeUpdateRequest;
use App\VisaType;
use Illuminate\Http\Request;

class VisaTypeController extends Controller
{
    public function index()
    {
        access();

        $visa_types = VisaType::all();

        return view('admin.visa_type.index', compact('visa_types'));
    }

    public function create()
    {
        create();

        return view('admin.visa_type.create');
    }

    public function store(VisaTypeStoreRequest $request)
    {
        $input = $request->all();
        $type_name = $input['type_name'];
        $update_id = $request->update_id;
        $where = array();
        $where[] = ['type_name', '=', $type_name];
        if ($update_id == 0) {
            $row = find("VisaType", $where, "id", "asc", "first");
            if (isset($row)) {
                $message = 'info_' . trans('cruds.exist_message');
            } else {
                VisaType::create($input);
                $message = 'success_' . trans('cruds.insert_message');
            }
        } else {
            $where[] = ['id', '<>', $update_id];
            $row = find("VisaType", $where, "id", "asc", "first");
            if (isset($row)) {
                $message = 'info_' . trans('cruds.exist_message');
            } else {
                $visa_type = VisaType::find($update_id);
                $visa_type->update($input);
                $message = 'success_' . trans('cruds.update_message');
            }
        }
        return redirect()->route('admin.visa_type.index')->with("message", $message);
    }

    public function edit(VisaType $visa_type)
    {
        edit();

        return view('admin.visa_type.edit', compact('visa_type'));
    }

    public function update(VisaTypeUpdateRequest $request, VisaType $visa_type)
    {
        $visa_type->update($request->all());

        return redirect()->route('admin.visa_type.index');
    }

    public function show(VisaType $visa_type)
    {
        show();

        return view('admin.visa_type.show', compact('visa_type'));
    }

    public function destroy(VisaType $visa_type)
    {
        delete();

        $visa_type->delete();

        $message = 'danger_' . trans('cruds.delete_message');

        return back()->with('message', $message);
    }

    public function massDestroy(VisaTypeMassDestroyRequest $request)
    {
        delete();

        VisaType::whereIn('id', request('ids'))->delete();

        //return response(null, Response::HTTP_NO_CONTENT);

        $message = 'danger_' . trans('cruds.delete_message');

        return back()->with('message', $message);
    }
}