<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProfessionMassDestroyRequest;
use App\Http\Requests\ProfessionStoreRequest;
use App\Http\Requests\ProfessionUpdateRequest;
use App\Profession;
use Illuminate\Http\Request;

class ProfessionController extends Controller
{
    public function index()
    {
        access();

        $professions = Profession::all();

        return view('admin.profession.index', compact('professions'));
    }

    public function create()
    {
        create();

        return view('admin.profession.create');
    }

    public function store(ProfessionStoreRequest $request)
    {
        $input = $request->all();
        $profession_name = $input['profession_name'];
        $update_id = $request->update_id;
        $where = array();
        $where[] = ['profession_name', '=', $profession_name];
        if ($update_id == 0) {
            $row = find("Profession", $where, "id", "asc", "first");
            if (isset($row)) {
                $message = 'info_' . trans('cruds.exist_message');
            } else {
                Profession::create($input);
                $message = 'success_' . trans('cruds.insert_message');
            }
        } else {
            $where[] = ['id', '<>', $update_id];
            $row = find("Profession", $where, "id", "asc", "first");
            if (isset($row)) {
                $message = 'info_' . trans('cruds.exist_message');
            } else {
                $profession = Profession::find($update_id);
                $profession->update($input);
                $message = 'success_' . trans('cruds.update_message');
            }
        }
        return redirect()->route('admin.profession.index')->with("message", $message);
    }

    public function edit(Profession $profession)
    {
        edit();

        return view('admin.profession.edit', compact('profession'));
    }

    public function update(ProfessionUpdateRequest $request, Profession $profession)
    {
        $profession->update($request->all());

        return redirect()->route('admin.profession.index');
    }

    public function show(Profession $profession)
    {
        show();

        return view('admin.profession.show', compact('profession'));
    }

    public function destroy(Profession $profession)
    {
        delete();

        $profession->delete();

        $message = 'danger_' . trans('cruds.delete_message');

        return back()->with('message', $message);
    }

    public function massDestroy(ProfessionMassDestroyRequest $request)
    {
        delete();

        Profession::whereIn('id', request('ids'))->delete();

        //return response(null, Response::HTTP_NO_CONTENT);

        $message = 'danger_' . trans('cruds.delete_message');

        return back()->with('message', $message);
    }
}