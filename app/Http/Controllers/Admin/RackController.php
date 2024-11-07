<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\RackMassDestroyRequest;
use App\Http\Requests\RackStoreRequest;
use App\Http\Requests\RackUpdateRequest;
use App\Rack;
use Illuminate\Http\Request;

class RackController extends Controller
{
    public function index()
    {
        access();

        $racks = Rack::all();

        return view('admin.rack.index', compact('racks'));
    }

    public function create()
    {
        create();

        return view('admin.rack.create');
    }

    public function store(RackStoreRequest $request)
    {
        $input = $request->all();
        $rack_name = $input['rack_name'];
        $update_id = $request->update_id;
        $where = array();
        $where[] = ['rack_name', '=', $rack_name];
        if ($update_id == 0) {
            $row = find("Rack", $where, "id", "asc", "first");
            if (isset($row)) {
                $message = 'info_' . trans('cruds.exist_message');
            } else {
                Rack::create($input);
                $message = 'success_' . trans('cruds.insert_message');
            }
        } else {
            $where[] = ['id', '<>', $update_id];
            $row = find("Rack", $where, "id", "asc", "first");
            if (isset($row)) {
                $message = 'info_' . trans('cruds.exist_message');
            } else {
                $rack = Rack::find($update_id);
                $rack->update($input);
                $message = 'success_' . trans('cruds.update_message');
            }
        }
        return redirect()->route('admin.rack.index')->with("message", $message);
    }

    public function edit(Rack $rack)
    {
        edit();

        return view('admin.rack.edit', compact('rack'));
    }

    public function update(RackUpdateRequest $request, Rack $rack)
    {
        $rack->update($request->all());

        return redirect()->route('admin.rack.index');
    }

    public function show(Rack $rack)
    {
        show();

        return view('admin.rack.show', compact('rack'));
    }

    public function destroy(Rack $rack)
    {
        delete();

        $rack->delete();

        $message = 'danger_' . trans('cruds.delete_message');

        return back()->with('message', $message);
    }

    public function massDestroy(RackMassDestroyRequest $request)
    {
        delete();

        Rack::whereIn('id', request('ids'))->delete();

        //return response(null, Response::HTTP_NO_CONTENT);

        $message = 'danger_' . trans('cruds.delete_message');

        return back()->with('message', $message);
    }
}
