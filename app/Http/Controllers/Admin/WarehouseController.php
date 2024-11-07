<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\WarehouseMassDestroyRequest;
use App\Http\Requests\WarehouseStoreRequest;
use App\Http\Requests\WarehouseUpdateRequest;
use App\Warehouse;
use Illuminate\Http\Request;

class WarehouseController extends Controller
{
    public function index()
    {
        access();

        $warehouses = Warehouse::all();

        return view('admin.warehouse.index', compact('warehouses'));
    }

    public function create()
    {
        create();

        return view('admin.warehouse.create');
    }

    public function store(WarehouseStoreRequest $request)
    {
        $input = $request->all();
        $warehouse_name = $input['warehouse_name'];
        $update_id = $request->update_id;
        $where = array();
        $where[] = ['warehouse_name', '=', $warehouse_name];
        if ($update_id == 0) {
            $row = find("Warehouse", $where, "id", "asc", "first");
            if (isset($row)) {
                $message = 'info_' . trans('cruds.exist_message');
            } else {
                Warehouse::create($input);
                $message = 'success_' . trans('cruds.insert_message');
            }
        } else {
            $where[] = ['id', '<>', $update_id];
            $row = find("Warehouse", $where, "id", "asc", "first");
            if (isset($row)) {
                $message = 'info_' . trans('cruds.exist_message');
            } else {
                $warehouse = Warehouse::find($update_id);
                $warehouse->update($input);
                $message = 'success_' . trans('cruds.update_message');
            }
        }
        return redirect()->route('admin.warehouse.index')->with("message", $message);
    }

    public function edit(Warehouse $warehouse)
    {
        edit();

        return view('admin.warehouse.edit', compact('warehouse'));
    }

    public function update(WarehouseUpdateRequest $request, Warehouse $warehouse)
    {
        $warehouse->update($request->all());

        return redirect()->route('admin.warehouse.index');
    }

    public function show(Warehouse $warehouse)
    {
        show();

        return view('admin.warehouse.show', compact('warehouse'));
    }

    public function destroy(Warehouse $warehouse)
    {
        delete();

        $warehouse->delete();

        $message = 'danger_' . trans('cruds.delete_message');

        return back()->with('message', $message);
    }

    public function massDestroy(WarehouseMassDestroyRequest $request)
    {
        delete();

        Warehouse::whereIn('id', request('ids'))->delete();

        //return response(null, Response::HTTP_NO_CONTENT);

        $message = 'danger_' . trans('cruds.delete_message');

        return back()->with('message', $message);
    }
}