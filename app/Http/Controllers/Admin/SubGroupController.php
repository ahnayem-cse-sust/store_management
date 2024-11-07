<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SubGroupMassDestroyRequest;
use App\Http\Requests\SubGroupStoreRequest;
use App\Http\Requests\SubGroupUpdateRequest;
use App\SubGroup;
use Illuminate\Http\Request;

class SubGroupController extends Controller
{
    public function index()
    {
        access();

        $subgroups = SubGroup::all();

        return view('admin.subgroup.index', compact('subgroups'));
    }

    public function create()
    {
        create();

        return view('admin.subgroup.create');
    }

    public function store(SubGroupStoreRequest $request)
    {
        $input = $request->all();
        $subgroup_name = $input['subgroup_name'];
        $update_id = $request->update_id;
        $where = array();
        $where[] = ['subgroup_name', '=', $subgroup_name];
        if ($update_id == 0) {
            $row = find("SubGroup", $where, "id", "asc", "first");
            if (isset($row)) {
                $message = 'info_' . trans('cruds.exist_message');
            } else {
                SubGroup::create($input);
                $message = 'success_' . trans('cruds.insert_message');
            }
        } else {
            $where[] = ['id', '<>', $update_id];
            $row = find("SubGroup", $where, "id", "asc", "first");
            if (isset($row)) {
                $message = 'info_' . trans('cruds.exist_message');
            } else {
                $subgroup = SubGroup::find($update_id);
                $subgroup->update($input);
                $message = 'success_' . trans('cruds.update_message');
            }
        }
        return redirect()->route('admin.subgroup.index')->with("message", $message);
    }

    public function edit(SubGroup $subgroup)
    {
        edit();

        return view('admin.subgroup.edit', compact('subgroup'));
    }

    public function update(SubGroupUpdateRequest $request, SubGroup $subgroup)
    {
        $subgroup->update($request->all());

        return redirect()->route('admin.subgroup.index');
    }

    public function show(SubGroup $subgroup)
    {
        show();

        return view('admin.subgroup.show', compact('subgroup'));
    }

    public function destroy(SubGroup $subgroup)
    {
        delete();

        $subgroup->delete();

        $message = 'danger_' . trans('cruds.delete_message');

        return back()->with('message', $message);
    }

    public function massDestroy(SubGroupMassDestroyRequest $request)
    {
        delete();

        SubGroup::whereIn('id', request('ids'))->delete();

        //return response(null, Response::HTTP_NO_CONTENT);

        $message = 'danger_' . trans('cruds.delete_message');

        return back()->with('message', $message);
    }
}
