<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ManufacturerMassDestroyRequest;
use App\Http\Requests\ManufacturerStoreRequest;
use App\Http\Requests\ManufacturerUpdateRequest;
use App\Manufacturer;
use Illuminate\Http\Request;

class ManufacturerController extends Controller
{
    public function index()
    {
        access();

        $manufacturers = Manufacturer::all();

        return view('admin.manufacturer.index', compact('manufacturers'));
    }

    public function create()
    {
        create();

        return view('admin.manufacturer.create');
    }

    public function store(ManufacturerStoreRequest $request)
    {
        $input = $request->all();
        $manufacturer_name = $input['manufacturer_name'];
        $update_id = $request->update_id;
        $where = array();
        $where[] = ['manufacturer_name', '=', $manufacturer_name];
        if ($update_id == 0) {
            $row = find("Manufacturer", $where, "id", "asc", "first");
            if (isset($row)) {
                $message = 'info_' . trans('cruds.exist_message');
            } else {
                Manufacturer::create($input);
                $message = 'success_' . trans('cruds.insert_message');
            }
        } else {
            $where[] = ['id', '<>', $update_id];
            $row = find("Manufacturer", $where, "id", "asc", "first");
            if (isset($row)) {
                $message = 'info_' . trans('cruds.exist_message');
            } else {
                $manufacturer = Manufacturer::find($update_id);
                $manufacturer->update($input);
                $message = 'success_' . trans('cruds.update_message');
            }
        }
        return redirect()->route('admin.manufacturer.index')->with("message", $message);
    }

    public function edit(Manufacturer $manufacturer)
    {
        edit();

        return view('admin.manufacturer.edit', compact('manufacturer'));
    }

    public function update(ManufacturerUpdateRequest $request, Manufacturer $manufacturer)
    {
        $manufacturer->update($request->all());

        return redirect()->route('admin.manufacturer.index');
    }

    public function show(Manufacturer $manufacturer)
    {
        show();

        return view('admin.manufacturer.show', compact('manufacturer'));
    }

    public function destroy(Manufacturer $manufacturer)
    {
        delete();

        $manufacturer->delete();

        $message = 'danger_' . trans('cruds.delete_message');

        return back()->with('message', $message);
    }

    public function massDestroy(ManufacturerMassDestroyRequest $request)
    {
        delete();

        Manufacturer::whereIn('id', request('ids'))->delete();

        //return response(null, Response::HTTP_NO_CONTENT);

        $message = 'danger_' . trans('cruds.delete_message');

        return back()->with('message', $message);
    }
}