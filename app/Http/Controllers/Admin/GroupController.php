<?php

namespace App\Http\Controllers\Admin;

use App\Group;
use App\Http\Controllers\Controller;
use App\Http\Requests\GroupMassDestroyRequest;
use App\Http\Requests\GroupStoreRequest;
use App\Http\Requests\GroupUpdateRequest;
use Illuminate\Http\Request;

class GroupController extends Controller
{
    public function index()
    {
        access();

        $groups = Group::all();

        return view('admin.group.index', compact('groups'));
    }

    public function create()
    {
        create();

        return view('admin.group.create');
    }

    public function store(GroupStoreRequest $request)
    {
        $input = $request->all();
        $group_name = $input['group_name'];
        $update_id = $request->update_id;
        $where = array();
        $where[] = ['group_name', '=', $group_name];
        if ($update_id == 0) {
            $row = find("Group", $where, "id", "asc", "first");
            if (isset($row)) {
                $message = 'info_' . trans('cruds.exist_message');
            } else {
                Group::create($input);
                $message = 'success_' . trans('cruds.insert_message');
            }
        } else {
            $where[] = ['id', '<>', $update_id];
            $row = find("Group", $where, "id", "asc", "first");
            if (isset($row)) {
                $message = 'info_' . trans('cruds.exist_message');
            } else {
                $group = Group::find($update_id);
                $group->update($input);
                $message = 'success_' . trans('cruds.update_message');
            }
        }
        return redirect()->route('admin.group.index')->with("message", $message);
    }

    public function edit(Group $group)
    {
        edit();

        return view('admin.group.edit', compact('group'));
    }

    public function update(GroupUpdateRequest $request, Group $group)
    {
        $group->update($request->all());

        return redirect()->route('admin.group.index');
    }

    public function show(Group $group)
    {
        show();

        return view('admin.group.show', compact('group'));
    }

    public function destroy(Group $group)
    {
        delete();

        $group->delete();

        $message = 'danger_' . trans('cruds.delete_message');

        return back()->with('message', $message);
    }

    public function massDestroy(GroupMassDestroyRequest $request)
    {
        delete();

        Group::whereIn('id', request('ids'))->delete();

        //return response(null, Response::HTTP_NO_CONTENT);

        $message = 'danger_' . trans('cruds.delete_message');

        return back()->with('message', $message);
    }
}
