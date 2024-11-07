<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ModelMassDestroyRequest;
use App\Http\Requests\ModelStoreRequest;
use App\Http\Requests\ModelUpdateRequest;
use App\Models;
use Illuminate\Http\Request;

class ModelController extends Controller
{
    public function index()
    {
        access();

        $models = Models::all();

        return view('admin.model.index', compact('models'));
    }

    public function create()
    {
        create();

        return view('admin.model.create');
    }

    public function store(ModelStoreRequest $request)
    {
        $input = $request->all();
        $model_name = $input['model_name'];
        $update_id = $request->update_id;
        $where = array();
        $where[] = ['model_name', '=', $model_name];
        if ($update_id == 0) {
            $row = find("Models", $where, "id", "asc", "first");
            if (isset($row)) {
                $message = 'info_' . trans('cruds.exist_message');
            } else {
                Models::create($input);
                $message = 'success_' . trans('cruds.insert_message');
            }
        } else {
            $where[] = ['id', '<>', $update_id];
            $row = find("Models", $where, "id", "asc", "first");
            if (isset($row)) {
                $message = 'info_' . trans('cruds.exist_message');
            } else {
                $model = Models::find($update_id);
                $model->update($input);
                $message = 'success_' . trans('cruds.update_message');
            }
        }
        return redirect()->route('admin.model.index')->with("message", $message);
    }

    public function edit(Models $model)
    {
        edit();

        return view('admin.model.edit', compact('model'));
    }

    public function update(ModelUpdateRequest $request, Models $model)
    {
        $model->update($request->all());

        return redirect()->route('admin.model.index');
    }

    public function show(Models $model)
    {
        show();

        return view('admin.model.show', compact('model'));
    }

    public function destroy(Models $model)
    {
        delete();

        $model->delete();

        $message = 'danger_' . trans('cruds.delete_message');

        return back()->with('message', $message);
    }

    public function massDestroy(ModelMassDestroyRequest $request)
    {
        delete();

        Models::whereIn('id', request('ids'))->delete();

        //return response(null, Response::HTTP_NO_CONTENT);

        $message = 'danger_' . trans('cruds.delete_message');

        return back()->with('message', $message);
    }
}