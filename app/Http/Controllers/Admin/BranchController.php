<?php

namespace App\Http\Controllers\Admin;

use App\Branch;
use App\Http\Controllers\Controller;
use App\Http\Requests\BranchMassDestroyRequest;
use App\Http\Requests\BranchStoreRequest;
use App\Http\Requests\BranchUpdateRequest;
use Illuminate\Http\Request;

class BranchController extends Controller
{
    public function index()
    {
        access();

        $branchs = Branch::all();

        return view('admin.branch.index', compact('branchs'));
    }

    public function create()
    {
        create();

        return view('admin.branch.create');
    }

    public function store(BranchStoreRequest $request)
    {
        $input = $request->all();
        $branch_name = $input['branch_name'];
        $update_id = $request->update_id;
        $where = array();
        $where[] = ['branch_name', '=', $branch_name];
        if ($update_id == 0) {
            $row = find("Branch", $where, "id", "asc", "first");
            if (isset($row)) {
                $message = 'info_' . trans('cruds.exist_message');
            } else {
                Branch::create($input);
                $message = 'success_' . trans('cruds.insert_message');
            }
        } else {
            $where[] = ['id', '<>', $update_id];
            $row = find("Branch", $where, "id", "asc", "first");
            if (isset($row)) {
                $message = 'info_' . trans('cruds.exist_message');
            } else {
                $branch = Branch::find($update_id);
                $branch->update($input);
                $message = 'success_' . trans('cruds.update_message');
            }
        }
        return redirect()->route('admin.branch.index')->with("message", $message);
    }

    public function edit(Branch $branch)
    {
        edit();

        return view('admin.branch.edit', compact('branch'));
    }

    public function update(BranchUpdateRequest $request, Branch $branch)
    {
        $branch->update($request->all());

        return redirect()->route('admin.branch.index');
    }

    public function show(Branch $branch)
    {
        show();

        return view('admin.branch.show', compact('branch'));
    }

    public function destroy(Branch $branch)
    {
        delete();

        $branch->delete();

        $message = 'danger_' . trans('cruds.delete_message');

        return back()->with('message', $message);
    }

    public function massDestroy(BranchMassDestroyRequest $request)
    {
        delete();

        Branch::whereIn('id', request('ids'))->delete();

        //return response(null, Response::HTTP_NO_CONTENT);

        $message = 'danger_' . trans('cruds.delete_message');

        return back()->with('message', $message);
    }
}