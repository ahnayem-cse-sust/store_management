<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\InspectorMassDestroyRequest;
use App\Http\Requests\InspectorStoreRequest;
use App\Http\Requests\InspectorUpdateRequest;
use App\Inspector;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class InspectorController extends Controller
{
    public function index()
    {
        access();

        $inspectors = Inspector::all();

        return view('admin.inspectors.index', compact('inspectors'));
    }

    public function create()
    {
        create();
        return view('admin.inspectors.create');
    }

    public function store(InspectorStoreRequest $request)
    {
        $input = $request->all();
        $update_id = $input['update_id'];
        $inspector_name = $input['inspector_name'];
        $where = array();
        $where[] = ['inspector_name', '=', $inspector_name];
        if ($update_id == 0) {
            $row = findById("inspectors", $where);
            if (isset($row)) {
                $message = 'info_' . trans('cruds.insert_message');
            } else {
                $inspector = Inspector::create($input);
                $message = 'success_' . trans('cruds.insert_message');
            }
        } else {
            $where[] = ['id', '<>', $update_id];
            $row = findById("inspectors", $where);
            if (isset($row)) {
                $message = 'info_' . trans('cruds.exist_message');
            } else {
                $inspector = Inspector::find($update_id);
                $inspector->update($input);
                $message = 'success_' . trans('cruds.update_message');
            }
        }
        return redirect()->route('admin.inspector.index');
    }

    public function edit(Inspector $inspector)
    {
        edit();

        return view('admin.inspectors.create', compact('inspector'));
    }

    public function update(InspectorUpdateRequest $request, Inspector $inspector)
    {
        $inspector->update($request->all());
        return redirect()->route('admin.inspectors.index');
    }

    public function show(Inspector $inspector)
    {
        show();

        return view('admin.inspectors.show', compact('inspector'));
    }

    public function destroy(Inspector $inspector)
    {
        delete();

        $inspector->delete();

        return back();
    }

    public function massDestroy(InspectorMassDestroyRequest $request)
    {
        delete();

        Inspector::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
