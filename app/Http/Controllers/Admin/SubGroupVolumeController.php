<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SubGroupVolumeMassDestroyRequest;
use App\Http\Requests\SubGroupVolumeStoreRequest;
use App\Http\Requests\SubGroupVolumeUpdateRequest;
use App\SubGroupVolume;
use Illuminate\Http\Request;

class SubGroupVolumeController extends Controller
{
    public function index()
    {
        access();

        $subgroupvolumes = SubGroupVolume::all();

        return view('admin.subgroupvolume.index', compact('subgroupvolumes'));
    }

    public function create()
    {
        create();

        return view('admin.subgroupvolume.create');
    }

    public function store(SubGroupVolumeStoreRequest $request)
    {
        $input = $request->all();
        $group_id = $input['group_id'];
        $subgroup_id = $input['subgroup_id'];
        $subgroupvolume_name = $input['subgroupvolume_name'];
        $update_id = $request->update_id;
        $where = array();
        $where[] = ['group_id', '=', $group_id];
        $where[] = ['subgroup_id', '=', $subgroup_id];
        $where[] = ['subgroupvolume_name', '=', $subgroupvolume_name];
        if ($update_id == 0) {
            $row = find("SubGroupVolume", $where, "id", "asc", "first");
            if (isset($row)) {
                $message = 'info_' . trans('cruds.exist_message');
            } else {
                SubGroupVolume::create($input);
                $message = 'success_' . trans('cruds.insert_message');
            }
        } else {
            $where[] = ['id', '<>', $update_id];
            $row = find("SubGroupVolume", $where, "id", "asc", "first");
            if (isset($row)) {
                $message = 'info_' . trans('cruds.exist_message');
            } else {
                $subgroupvolume = SubGroupVolume::find($update_id);
                $subgroupvolume->update($input);
                $message = 'success_' . trans('cruds.update_message');
            }
        }
        return redirect()->route('admin.subgroupvolume.index')->with("message", $message);
    }

    public function edit(SubGroupVolume $subgroupvolume)
    {
        edit();

        return view('admin.subgroupvolume.edit', compact('subgroupvolume'));
    }

    public function update(SubGroupVolumeUpdateRequest $request, SubGroupVolume $subgroupvolume)
    {
        $subgroupvolume->update($request->all());

        return redirect()->route('admin.subgroupvolume.index');
    }

    public function show(SubGroupVolume $subgroupvolume)
    {
        show();

        return view('admin.subgroupvolume.show', compact('subgroupvolume'));
    }

    public function destroy(SubGroupVolume $subgroupvolume)
    {
        delete();

        $subgroupvolume->delete();

        $message = 'danger_' . trans('cruds.delete_message');

        return back()->with('message', $message);
    }

    public function massDestroy(SubGroupVolumeMassDestroyRequest $request)
    {
        delete();

        SubGroupVolume::whereIn('id', request('ids'))->delete();

        //return response(null, Response::HTTP_NO_CONTENT);

        $message = 'danger_' . trans('cruds.delete_message');

        return back()->with('message', $message);
    }
}