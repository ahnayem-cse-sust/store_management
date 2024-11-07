<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\LedgerHeadMassDestroyRequest;
use App\Http\Requests\LedgerHeadStoreRequest;
use App\Http\Requests\LedgerHeadUpdateRequest;
use App\LedgerHead;
use Illuminate\Http\Request;

class LedgerHeadController extends Controller
{
    public function index()
    {
        access();

        $ledger_heads = LedgerHead::all();

        return view('admin.ledger_head.index', compact('ledger_heads'));
    }

    public function create()
    {
        create();

        return view('admin.ledger_head.create');
    }

    public function store(LedgerHeadStoreRequest $request)
    {
        $input = $request->all();
        $ledger_head_name = $input['ledger_head_name'];
        $update_id = $request->update_id;
        $where = array();
        $where[] = ['ledger_head_name', '=', $ledger_head_name];
        if ($update_id == 0) {
            $row = find("LedgerHead", $where, "id", "asc", "first");
            if (isset($row)) {
                $message = 'info_' . trans('cruds.exist_message');
            } else {
                LedgerHead::create($input);
                $message = 'success_' . trans('cruds.insert_message');
            }
        } else {
            $where[] = ['id', '<>', $update_id];
            $row = find("LedgerHead", $where, "id", "asc", "first");
            if (isset($row)) {
                $message = 'info_' . trans('cruds.exist_message');
            } else {
                $ledger_head = LedgerHead::find($update_id);
                $ledger_head->update($input);
                $message = 'success_' . trans('cruds.update_message');
            }
        }
        return redirect()->route('admin.ledger_head.index')->with("message", $message);
    }

    public function edit(LedgerHead $ledger_head)
    {
        edit();

        return view('admin.ledger_head.edit', compact('ledger_head'));
    }

    public function update(LedgerHeadUpdateRequest $request, LedgerHead $ledger_head)
    {
        $ledger_head->update($request->all());

        return redirect()->route('admin.ledger_head.index');
    }

    public function show(LedgerHead $ledger_head)
    {
        show();

        return view('admin.ledger_head.show', compact('ledger_head'));
    }

    public function destroy(LedgerHead $ledger_head)
    {
        delete();

        $ledger_head->delete();

        $message = 'danger_' . trans('cruds.delete_message');

        return back()->with('message', $message);
    }

    public function massDestroy(LedgerHeadMassDestroyRequest $request)
    {
        delete();

        LedgerHead::whereIn('id', request('ids'))->delete();

        //return response(null, Response::HTTP_NO_CONTENT);

        $message = 'danger_' . trans('cruds.delete_message');

        return back()->with('message', $message);
    }
}