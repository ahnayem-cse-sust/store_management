<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UnitMassDestroyRequest;
use App\Http\Requests\UnitStoreRequest;
use App\Http\Requests\UnitUpdateRequest;
use App\Unit;
use Illuminate\Http\Request;

class UnitController extends Controller
{
    public function index()
    {
        access();

        $units = Unit::all();

        return view('admin.unit.index', compact('units'));
    }

    public function create()
    {
        create();

        return view('admin.unit.create');
    }

    public function store(UnitStoreRequest $request)
    {
        $input = $request->all();
        $unit_name = $input['unit_name'];
        $update_id = $request->update_id;
        $where = array();
        $where[] = ['unit_name', '=', $unit_name];
        if ($update_id == 0) {
            $row = find("Unit", $where, "id", "asc", "first");
            if (isset($row)) {
                $message = 'info_' . trans('cruds.exist_message');
            } else {
                Unit::create($input);
                $message = 'success_' . trans('cruds.insert_message');
            }
        } else {
            $where[] = ['id', '<>', $update_id];
            $row = find("Unit", $where, "id", "asc", "first");
            if (isset($row)) {
                $message = 'info_' . trans('cruds.exist_message');
            } else {
                $unit = Unit::find($update_id);
                $unit->update($input);
                $message = 'success_' . trans('cruds.update_message');
            }
        }
        return redirect()->route('admin.unit.index')->with("message", $message);
    }

    public function edit(Unit $unit)
    {
        edit();

        return view('admin.unit.edit', compact('unit'));
    }

    public function update(UnitUpdateRequest $request, Unit $unit)
    {
        $unit->update($request->all());

        return redirect()->route('admin.unit.index');
    }

    public function show(Unit $unit)
    {
        show();

        return view('admin.unit.show', compact('unit'));
    }

    public function destroy(Unit $unit)
    {
        delete();

        $unit->delete();

        $message = 'danger_' . trans('cruds.delete_message');

        return back()->with('message', $message);
    }

    public function massDestroy(UnitMassDestroyRequest $request)
    {
        delete();

        Unit::whereIn('id', request('ids'))->delete();

        //return response(null, Response::HTTP_NO_CONTENT);

        $message = 'danger_' . trans('cruds.delete_message');

        return back()->with('message', $message);
    }
}
