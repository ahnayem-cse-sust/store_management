<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\RoomMassDestroyRequest;
use App\Http\Requests\RoomStoreRequest;
use App\Http\Requests\RoomUpdateRequest;
use App\Room;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    public function index()
    {
        access();

        $rooms = Room::all();

        return view('admin.room.index', compact('rooms'));
    }

    public function create()
    {
        create();

        return view('admin.room.create');
    }

    public function store(RoomStoreRequest $request)
    {
        $input = $request->all();
        $room_name = $input['room_name'];
        $update_id = $request->update_id;
        $where = array();
        $where[] = ['room_name', '=', $room_name];
        if ($update_id == 0) {
            $row = find("Room", $where, "id", "asc", "first");
            if (isset($row)) {
                $message = 'info_' . trans('cruds.exist_message');
            } else {
                Room::create($input);
                $message = 'success_' . trans('cruds.insert_message');
            }
        } else {
            $where[] = ['id', '<>', $update_id];
            $row = find("Room", $where, "id", "asc", "first");
            if (isset($row)) {
                $message = 'info_' . trans('cruds.exist_message');
            } else {
                $room = Room::find($update_id);
                $room->update($input);
                $message = 'success_' . trans('cruds.update_message');
            }
        }
        return redirect()->route('admin.room.index')->with("message", $message);
    }

    public function edit(Room $room)
    {
        edit();

        return view('admin.room.edit', compact('room'));
    }

    public function update(RoomUpdateRequest $request, Room $room)
    {
        $room->update($request->all());

        return redirect()->route('admin.room.index');
    }

    public function show(Room $room)
    {
        show();

        return view('admin.room.show', compact('room'));
    }

    public function destroy(Room $room)
    {
        delete();

        $room->delete();

        $message = 'danger_' . trans('cruds.delete_message');

        return back()->with('message', $message);
    }

    public function massDestroy(RoomMassDestroyRequest $request)
    {
        delete();

        Room::whereIn('id', request('ids'))->delete();

        //return response(null, Response::HTTP_NO_CONTENT);

        $message = 'danger_' . trans('cruds.delete_message');

        return back()->with('message', $message);
    }
}
