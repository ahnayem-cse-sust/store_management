<?php

namespace App\Http\Controllers\Admin;

use App\Designation;
use App\Http\Controllers\Controller;
use App\Http\Requests\DesignationMassDestroyRequest;
use App\Http\Requests\DesignationStoreRequest;
use App\Http\Requests\DesignationUpdateRequest;
use Illuminate\Http\Request;

class DesignationController extends Controller
{
    public function index()
    {
        access();

        $designations = Designation::all();

        return view('admin.designation.index', compact('designations'));
    }

    public function create()
    {
        create();

        return view('admin.designation.create');
    }

    public function store(DesignationStoreRequest $request)
    {
        $input = $request->all();
        $designation_name = $input['designation_name'];
        $update_id = $request->update_id;
        $where = array();
        $where[] = ['designation_name', '=', $designation_name];
        if ($update_id == 0) {
            $row = find("Designation", $where, 'id', 'desc', 'first');
            if (isset($row)) {
                $message = 'info_' . trans('cruds.exist_message');
            } else {
                Designation::create($input);
                $message = 'success_' . trans('cruds.insert_message');
            }
        } else {
            $where[] = ['id', '<>', $update_id];
            $row = find("Designation", $where, 'id', 'desc', 'first');
            if (isset($row)) {
                $message = 'info_' . trans('cruds.exist_message');
            } else {
                $designation = Designation::find($update_id);
                $designation->update($input);
                $message = 'success_' . trans('cruds.update_message');
            }
        }
        return redirect()->route('admin.designation.index')->with("message", $message);
    }

    public function edit(Designation $designation)
    {
        edit();

        return view('admin.designation.edit', compact('designation'));
    }

    public function update(DesignationUpdateRequest $request, Designation $designation)
    {
        $designation->update($request->all());

        return redirect()->route('admin.designation.index');
    }

    public function show(Designation $designation)
    {
        show();

        return view('admin.designation.show', compact('designation'));
    }

    public function destroy(Designation $designation)
    {
        delete();

        $designation->delete();

        $message = 'danger_' . trans('cruds.delete_message');

        return back()->with('message', $message);
    }

    public function massDestroy(DesignationMassDestroyRequest $request)
    {

        Designation::whereIn('id', request('ids'))->delete();

        //return response(null, Response::HTTP_NO_CONTENT);

        $message = 'danger_' . trans('cruds.delete_message');

        return back()->with('message', $message);
    }
}
