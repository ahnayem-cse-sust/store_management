<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PSMassDestroyRequest;
use App\Http\Requests\PSStoreRequest;
use App\Http\Requests\PSUpdateRequest;
use App\PS;
use App\PSDetails;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PSController extends Controller
{
    public function index()
    {
        access();

        $pss = PS::orderBy('id', 'desc')->get();

        return view('admin.ps.index', compact('pss'));
    }

    public function create()
    {
        create();
        return view('admin.ps.create');
    }

    public function initialize()
    {
        $requisition_id = request()->requisition_id;
        $data['requisition'] = find('Requisition', [['id', '=', $requisition_id]], 'id', 'asc', 'first');
        $response = view('admin.ps.initialize', $data)->render();
        return $response;
    }

    public function store(PSStoreRequest $request)
    {

        $input = $request->except('ps_item_id', 'item_id', 'group_id', 'subgroup_id', 'unit_id', 'sale_price', 'quantity');
        $warehouse_id = $input['warehouse_id'];
        $branch_id = $input['branch_id'];
        $update_id = $input['update_id'];
        $ps_item_ids = request()->ps_item_id;
        $item_ids = request()->item_id;
        $group_ids = request()->group_id;
        $subgroup_ids = request()->subgroup_id;
        $unit_ids = request()->unit_id;
        $sale_prices = request()->sale_price;
        $quantitys = request()->quantity;
        $total_prices = request()->total_price;
        $where = array();
        if ($update_id == 0) {
            //$row = findById("pss", $where);
            //if (isset($row)) {
            //  $message = 'info_' . trans('cruds.insert_message');
            // } else {
            $ps = PS::create($input);
            if (isset($ps)) {
                foreach ($ps_item_ids as $key => $value) {
                    $data = array(
                        'ps_id' => $ps->id,
                        'requisition_id' => $input['requisition_id'],
                        'job_id' => $input['job_id'],
                        'branch_id' => $branch_id,
                        'warehouse_id' => $warehouse_id,
                        'item_id' => $item_ids[$key],
                        'group_id' => $group_ids[$key],
                        'subgroup_id' => $subgroup_ids[$key],
                        'unit_id' => $unit_ids[$key],
                        'sale_price' => $sale_prices[$key],
                        'quantity' => $quantitys[$key],
                        'total_price' => $total_prices[$key],
                    );
                    //if (!$value) {
                    PSDetails::create($data);
                    // } else {
                    PSDetails::where('id', $value)->update($data);
                    // }
                }
            }
            $message = 'success_' . trans('cruds.insert_message');
            //}
        } else {
            // $where[] = ['id', '<>', $update_id];
            //  $row = findById("pss", $where);
            //  if (isset($row)) {
            // $message = 'info_' . trans('cruds.exist_message');
            //  } else {
            $ps = PS::find($update_id);
            if (isset($ps)) {
                foreach ($ps_item_ids as $key => $value) {
                    $data = array(
                        'ps_id' => $update_id,
                        'requisition_id' => $input['requisition_id'],
                        'job_id' => $input['job_id'],
                        'branch_id' => $branch_id,
                        'warehouse_id' => $warehouse_id,
                        'item_id' => $item_ids[$key],
                        'group_id' => $group_ids[$key],
                        'subgroup_id' => $subgroup_ids[$key],
                        'unit_id' => $unit_ids[$key],
                        'sale_price' => $sale_prices[$key],
                        'quantity' => $quantitys[$key],
                        'total_price' => $total_prices[$key],
                    );
                    //if (!$value) {
                    PSDetails::create($data);
                    // } else {
                    PSDetails::where('id', $value)->update($data);
                    // }
                }
            }
            $ps->update($input);
            $message = 'success_' . trans('cruds.update_message');
            //  }
        }
        return redirect()->route('admin.ps.index');
    }

    public function edit(PS $ps)
    {
        edit();

        return view('admin.ps.create', compact('ps'));
    }

    public function update(PSUpdateRequest $request, PS $ps)
    {
        $ps->update($request->all());
        return redirect()->route('admin.ps.index');
    }

    public function show($id)
    {
        show();

        $ps = PS::where('id', $id)->first();

        return view('admin.ps.show', compact('ps'));
    }

    public function destroy($id)
    {
        delete();

        PS::where('id', $id)->delete();
        PSDetails::where('ps_id', $id)->delete();

        return back();
    }

    public function massDestroy(PSMassDestroyRequest $request)
    {
        delete();

        PS::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
    public function approved($id)
    {
        if (!empty($id)) {
            PS::where('id', $id)->update(['status' => 'Approved']);
            PSDetails::where('ps_id', $id)->update(['status' => 'Approved']);
            $message = 'success_' . trans('cruds.approved_message');
        } else {
            $message = 'danger_' . trans('cruds.wrong_message');
        }
        return redirect()->route('admin.ps.index');
    }
}
