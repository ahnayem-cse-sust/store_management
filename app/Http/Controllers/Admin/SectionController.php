<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SectionMassDestroyRequest;
use App\Http\Requests\SectionStoreRequest;
use App\Http\Requests\SectionUpdateRequest;
use App\Section;
use Illuminate\Http\Request;

class SectionController extends Controller
{
    public function index()
    {
        access();

        $sections = Section::all();

        return view('admin.section.index', compact('sections'));
    }

    public function create()
    {
        create();

        return view('admin.section.create');
    }

    public function store(SectionStoreRequest $request)
    {
        $input = $request->all();
        $section_name = $input['section_name'];
        $update_id = $request->update_id;
        $where = array();
        $where[] = ['section_name', '=', $section_name];
        if ($update_id == 0) {
            $row = find("Section", $where, "id", "asc", "first");
            if (isset($row)) {
                $message = 'info_' . trans('cruds.exist_message');
            } else {
                Section::create($input);
                $message = 'success_' . trans('cruds.insert_message');
            }
        } else {
            $where[] = ['id', '<>', $update_id];
            $row = find("Section", $where, "id", "asc", "first");
            if (isset($row)) {
                $message = 'info_' . trans('cruds.exist_message');
            } else {
                $section = Section::find($update_id);
                $section->update($input);
                $message = 'success_' . trans('cruds.update_message');
            }
        }
        return redirect()->route('admin.section.index')->with("message", $message);
    }

    public function edit(Section $section)
    {
        edit();

        return view('admin.section.edit', compact('section'));
    }

    public function update(SectionUpdateRequest $request, Section $section)
    {
        $section->update($request->all());

        return redirect()->route('admin.section.index');
    }

    public function show(Section $section)
    {
        show();

        return view('admin.section.show', compact('section'));
    }

    public function destroy(Section $section)
    {
        delete();

        $section->delete();

        $message = 'danger_' . trans('cruds.delete_message');

        return back()->with('message', $message);
    }

    public function massDestroy(SectionMassDestroyRequest $request)
    {
        delete();

        Section::whereIn('id', request('ids'))->delete();

        //return response(null, Response::HTTP_NO_CONTENT);

        $message = 'danger_' . trans('cruds.delete_message');

        return back()->with('message', $message);
    }
}