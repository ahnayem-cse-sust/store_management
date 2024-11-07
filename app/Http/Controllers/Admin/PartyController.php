<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PartyMassDestroyRequest;
use App\Http\Requests\PartyStoreRequest;
use App\Http\Requests\PartyUpdateRequest;
use App\Party;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PartyController extends Controller
{
    public function index()
    {
        access();

        $partys = Party::all();

        return view('admin.partys.index', compact('partys'));
    }

    public function create()
    {
        create();
        return view('admin.partys.create');
    }

    public function store(PartyStoreRequest $request)
    {
        $input = $request->all();
        $update_id = $input['update_id'];
        $party_name = $input['party_name'];
        $where = array();
        $where[] = ['party_name', '=', $party_name];
        if ($update_id == 0) {
            $row = findById("party", $where);
            if (isset($row)) {
                $message = 'info_' . trans('cruds.insert_message');
            } else {
                $party = Party::create($input);
                $message = 'success_' . trans('cruds.insert_message');
            }
        } else {
            $where[] = ['id', '<>', $update_id];
            $row = findById("party", $where);
            if (isset($row)) {
                $message = 'info_' . trans('cruds.exist_message');
            } else {
                $party = Party::find($update_id);
                $party->update($input);
                $message = 'success_' . trans('cruds.update_message');
            }
        }
        return redirect()->route('admin.party.index');
    }

    public function edit(Party $party)
    {
        edit();

        return view('admin.partys.create', compact('party'));
    }

    public function update(PartyUpdateRequest $request, Party $party)
    {
        $party->update($request->all());
        return redirect()->route('admin.partys.index');
    }

    public function show(Party $party)
    {
        show();

        return view('admin.partys.show', compact('party'));
    }

    public function destroy(Party $party)
    {
        delete();

        $party->delete();

        return back();
    }

    public function massDestroy(PartyMassDestroyRequest $request)
    {
        delete();

        Party::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
