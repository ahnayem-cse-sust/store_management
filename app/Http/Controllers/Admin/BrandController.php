<?php

namespace App\Http\Controllers\Admin;

use App\Brand;
use App\Http\Controllers\Controller;
use App\Http\Requests\BrandMassDestroyRequest;
use App\Http\Requests\BrandStoreRequest;
use App\Http\Requests\BrandUpdateRequest;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function index()
    {
        access();

        $brands = Brand::all();

        return view('admin.brand.index', compact('brands'));
    }

    public function create()
    {
        create();

        return view('admin.brand.create');
    }

    public function store(BrandStoreRequest $request)
    {
        $input = $request->all();
        $brand_name = $input['brand_name'];
        $update_id = $request->update_id;
        $where = array();
        $where[] = ['brand_name', '=', $brand_name];
        if ($update_id == 0) {
            $row = find("Brand", $where, "id", "asc", "first");
            if (isset($row)) {
                $message = 'info_' . trans('cruds.exist_message');
            } else {
                Brand::create($input);
                $message = 'success_' . trans('cruds.insert_message');
            }
        } else {
            $where[] = ['id', '<>', $update_id];
            $row = find("Brand", $where, "id", "asc", "first");
            if (isset($row)) {
                $message = 'info_' . trans('cruds.exist_message');
            } else {
                $brand = Brand::find($update_id);
                $brand->update($input);
                $message = 'success_' . trans('cruds.update_message');
            }
        }
        return redirect()->route('admin.brand.index')->with("message", $message);
    }

    public function edit(Brand $brand)
    {
        edit();

        return view('admin.brand.edit', compact('brand'));
    }

    public function update(BrandUpdateRequest $request, Brand $brand)
    {
        $brand->update($request->all());

        return redirect()->route('admin.brand.index');
    }

    public function show(Brand $brand)
    {
        show();

        return view('admin.brand.show', compact('brand'));
    }

    public function destroy(Brand $brand)
    {
        delete();

        $brand->delete();

        $message = 'danger_' . trans('cruds.delete_message');

        return back()->with('message', $message);
    }

    public function massDestroy(BrandMassDestroyRequest $request)
    {
        delete();

        Brand::whereIn('id', request('ids'))->delete();

        //return response(null, Response::HTTP_NO_CONTENT);

        $message = 'danger_' . trans('cruds.delete_message');

        return back()->with('message', $message);
    }
}