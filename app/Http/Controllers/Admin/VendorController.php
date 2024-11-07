<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\VendorMassDestroyRequest;
use App\Http\Requests\VendorStoreRequest;
use App\Http\Requests\VendorUpdateRequest;
use App\Vendor;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class VendorController extends Controller
{
    public function index()
    {
        access();

        $vendors = Vendor::all();

        return view('admin.vendors.index', compact('vendors'));
    }

    public function create()
    {
        create();
        return view('admin.vendors.create');
    }

    public function store(VendorStoreRequest $request)
    {
        $input = $request->all();
        $update_id = $input['update_id'];
        $vendor_name = $input['vendor_name'];
        $where = array();
        $where[] = ['vendor_name', '=', $vendor_name];
        if ($update_id == 0) {
            $row = findById("vendors", $where);
            if (isset($row)) {
                $message = 'info_' . trans('cruds.insert_message');
            } else {
                $vendor = Vendor::create($input);
                $message = 'success_' . trans('cruds.insert_message');
            }
        } else {
            $where[] = ['id', '<>', $update_id];
            $row = findById("vendors", $where);
            if (isset($row)) {
                $message = 'info_' . trans('cruds.exist_message');
            } else {
                $vendor = Vendor::find($update_id);
                $vendor->update($input);
                $message = 'success_' . trans('cruds.update_message');
            }
        }
        return redirect()->route('admin.vendor.index');
    }

    public function edit(Vendor $vendor)
    {
        edit();

        return view('admin.vendors.create', compact('vendor'));
    }

    public function update(VendorUpdateRequest $request, Vendor $vendor)
    {
        $vendor->update($request->all());
        return redirect()->route('admin.vendors.index');
    }

    public function show(Vendor $vendor)
    {
        show();

        return view('admin.vendors.show', compact('vendor'));
    }

    public function destroy(Vendor $vendor)
    {
        delete();

        $vendor->delete();

        return back();
    }

    public function massDestroy(VendorMassDestroyRequest $request)
    {
        delete();

        Vendor::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
