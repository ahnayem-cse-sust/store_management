<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ShelfMassDestroyRequest;
use App\Http\Requests\ShelfStoreRequest;
use App\Http\Requests\ShelfUpdateRequest;
use App\Shelf;
use Illuminate\Http\Request;

class ShelfController extends Controller
{
    public function index()
    {
        access();

        $shelfs = Shelf::all();

        return view('admin.shelf.index', compact('shelfs'));
    }

    public function create()
    {
        create();

        return view('admin.shelf.create');
    }

    public function store(ShelfStoreRequest $request)
    {
        $input = $request->all();
        $shelf_name = $input['shelf_name'];
        $update_id = $request->update_id;
        $where = array();
        $where[] = ['shelf_name', '=', $shelf_name];
        if ($update_id == 0) {
            $row = find("Shelf", $where, "id", "asc", "first");
            if (isset($row)) {
                $message = 'info_' . trans('cruds.exist_message');
            } else {
                Shelf::create($input);
                $message = 'success_' . trans('cruds.insert_message');
            }
        } else {
            $where[] = ['id', '<>', $update_id];
            $row = find("Shelf", $where, "id", "asc", "first");
            if (isset($row)) {
                $message = 'info_' . trans('cruds.exist_message');
            } else {
                $shelf = Shelf::find($update_id);
                $shelf->update($input);
                $message = 'success_' . trans('cruds.update_message');
            }
        }
        return redirect()->route('admin.shelf.index')->with("message", $message);
    }

    public function edit(Shelf $shelf)
    {
        edit();

        return view('admin.shelf.edit', compact('shelf'));
    }

    public function update(ShelfUpdateRequest $request, Shelf $shelf)
    {
        $shelf->update($request->all());

        return redirect()->route('admin.shelf.index');
    }

    public function show(Shelf $shelf)
    {
        show();

        return view('admin.shelf.show', compact('shelf'));
    }

    public function destroy(Shelf $shelf)
    {
        delete();

        $shelf->delete();

        $message = 'danger_' . trans('cruds.delete_message');

        return back()->with('message', $message);
    }

    public function massDestroy(ShelfMassDestroyRequest $request)
    {
        delete();

        Shelf::whereIn('id', request('ids'))->delete();

        //return response(null, Response::HTTP_NO_CONTENT);

        $message = 'danger_' . trans('cruds.delete_message');

        return back()->with('message', $message);
    }
}
