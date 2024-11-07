<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SponsorVISAMassDestroyRequest;
use App\Http\Requests\SponsorVISAStoreRequest;
use App\Http\Requests\SponsorVISAUpdateRequest;
use App\SponsorVISA;
use Illuminate\Http\Request;

class SponsorVISAController extends Controller
{
    public function index()
    {
        access();

        $sponsor_visas = SponsorVISA::all();

        return view('admin.sponsor_visa.index', compact('sponsor_visas'));
    }

    public function create()
    {
        create();

        $sponsor_visas = SponsorVISA::all();

        return view('admin.sponsor_visa.create', compact('sponsor_visas'));
    }

    public function store(SponsorVISAStoreRequest $request)
    {
        $input = $request->all();
        $creation_date = $input['creation_date'];
        $input['creation_date'] = date('Y-m-d', strtotime($creation_date));
        $update_id = $input['update_id'];
        $sponsor_id = $input['sponsor_id'];
        $visa_no = $input['visa_no'];
        $where = array();
        $where[] = ['sponsor_id', '=', $sponsor_id];
        $where[] = ['visa_no', '=', $visa_no];
        if ($update_id == 0) {
            $row = find("SponsorVISA", $where, 'id', 'desc', 'first');
            if (isset($row)) {
                $message = 'info_' . trans('cruds.exist_message');
            } else {
                SponsorVISA::create($input);
                $message = 'success_' . trans('cruds.insert_message');
            }
        } else {
            $where[] = ['id', '<>', $update_id];
            $row = find("SponsorVISA", $where, 'id', 'desc', 'first');
            if (isset($row)) {
                $message = 'info_' . trans('cruds.exist_message');
            } else {
                $sponsor_visa = SponsorVISA::find($update_id);
                $sponsor_visa->update($input);
                $message = 'success_' . trans('cruds.update_message');
            }
        }
        return redirect()->route('admin.sponsor_visa.index')->with("message", $message);
    }

    public function edit(SponsorVISA $sponsor_visa)
    {
        edit();

        return view('admin.sponsor_visa.create', compact('sponsor_visa'));
    }

    public function update(SponsorVISAUpdateRequest $request, SponsorVISA $sponsor_visa)
    {
        $sponsor_visa->update($request->all());

        return redirect()->route('admin.sponsor_visa.index');
    }

    public function show(SponsorVISA $sponsor_visa)
    {
        show();

        return view('admin.sponsor_visa.show', compact('sponsor_visa'));
    }

    public function destroy(SponsorVISA $sponsor_visa)
    {
        delete();

        $sponsor_visa->delete();

        $message = 'danger_' . trans('cruds.delete_message');

        return back()->with('message', $message);
    }

    public function massDestroy(SponsorVISAMassDestroyRequest $request)
    {

        SponsorVISA::whereIn('id', request('ids'))->delete();

        //return response(null, Response::HTTP_NO_CONTENT);

        $message = 'danger_' . trans('cruds.delete_message');

        return back()->with('message', $message);
    }
}
