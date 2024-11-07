<?php

namespace App\Http\Controllers\Admin;

use App\GroupVolume;
use App\Http\Controllers\Controller;
use App\Http\Requests\GroupVolumeMassDestroyRequest;
use App\Http\Requests\GroupVolumeStoreRequest;
use App\Http\Requests\GroupVolumeUpdateRequest;
use Illuminate\Http\Request;

class GroupVolumeController extends Controller
{
    public function index()
    {
        access();

        $groupvolumes = GroupVolume::all();

        return view('admin.groupvolume.index', compact('groupvolumes'));
    }

    public function create()
    {
        create();

        return view('admin.groupvolume.create');
    }

    public function store(GroupVolumeStoreRequest $request)
    {
        $input = $request->all();
        $groupvolume_name = $input['groupvolume_name'];
        $update_id = $request->update_id;
        $where = array();
        $where[] = ['groupvolume_name', '=', $groupvolume_name];
        if ($update_id == 0) {
            $row = find("GroupVolume", $where, "id", "asc", "first");
            if (isset($row)) {
                $message = 'info_' . trans('cruds.exist_message');
            } else {
                GroupVolume::create($input);
                $message = 'success_' . trans('cruds.insert_message');
            }
        } else {
            $where[] = ['id', '<>', $update_id];
            $row = find("GroupVolume", $where, "id", "asc", "first");
            if (isset($row)) {
                $message = 'info_' . trans('cruds.exist_message');
            } else {
                $groupvolume = GroupVolume::find($update_id);
                $groupvolume->update($input);
                $message = 'success_' . trans('cruds.update_message');
            }
        }
        return redirect()->route('admin.groupvolume.index')->with("message", $message);
    }

    public function edit(GroupVolume $groupvolume)
    {
        edit();

        return view('admin.groupvolume.edit', compact('groupvolume'));
    }

    public function update(GroupVolumeUpdateRequest $request, GroupVolume $groupvolume)
    {
        $groupvolume->update($request->all());

        return redirect()->route('admin.groupvolume.index');
    }

    public function show(GroupVolume $groupvolume)
    {
        show();

        return view('admin.groupvolume.show', compact('groupvolume'));
    }

    public function destroy(GroupVolume $groupvolume)
    {
        delete();

        $groupvolume->delete();

        $message = 'danger_' . trans('cruds.delete_message');

        return back()->with('message', $message);
    }

    public function massDestroy(GroupVolumeMassDestroyRequest $request)
    {
        delete();

        GroupVolume::whereIn('id', request('ids'))->delete();

        //return response(null, Response::HTTP_NO_CONTENT);

        $message = 'danger_' . trans('cruds.delete_message');

        return back()->with('message', $message);
    }
}
