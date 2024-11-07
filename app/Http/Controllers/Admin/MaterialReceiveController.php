<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MaterialReceiveMassDestroyRequest;
use App\Http\Requests\MaterialReceiveStoreRequest;
use App\Http\Requests\MaterialReceiveUpdateRequest;
use App\Job;
use App\MaterialReceive;
use App\MaterialReceiveDetails;
use App\PS;
use App\PSDetails;
use App\Requisition;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class MaterialReceiveController extends Controller
{
    public function index()
    {
        access();

        $material_receives = MaterialReceive::orderBy('id', 'desc')->get();

        return view('admin.material_receives.index', compact('material_receives'));
    }

    public function create()
    {
        create();
        return view('admin.material_receives.create');
    }

    public function initialize()
    {
        $ps_id = request()->ps_id;
        $requisitionIds = PS::whereIn('id', $ps_id)->pluck('requisition_id')->toArray();
        $requisitions = Requisition::whereIn('id', $requisitionIds);
        $requisition_codes = $requisitions->pluck('requisition_code')->toArray();
        $requisition_codes = implode(',', $requisition_codes);
        $requisition_dates = $requisitions->pluck('requisition_date')->toArray();
        $requisition_dates = implode(',', $requisition_dates);
        $jobIds = $requisitions->pluck('job_id')->toArray();
        $jobs = Job::whereIn('id', $jobIds);
        $job_names = $jobs->pluck('job_name')->toArray();
        $job_names = implode(',', $job_names);
        $data['ps'] = PS::where('id', $ps_id)->first();
        $data['psDetails'] = PSDetails::whereIn('ps_id', $ps_id)->get();
        $page = view('admin.material_receives.initialize', $data)->render();
        $response = array(
            'requisition_codes' => $requisition_codes,
            'requisition_dates' => $requisition_dates,
            'job_names' => $job_names,
            'page' => $page,
        );
        return response()->json($response);
    }

    public function store(MaterialReceiveStoreRequest $request)
    {

        $input = $request->except('material_receive_item_id', 'branch_id', 'warehouse_id', 'item_id', 'group_id', 'subgroup_id', 'unit_id', 'sale_price', 'quantity');
        $ps_id_search = $input['ps_id_search'];
        $input['ps_id'] = implode(',', $input['ps_id_search']);
        $update_id = $input['update_id'];
        $material_receive_item_ids = request()->material_receive_item_id;
        $ps_ids = request()->ps_id;
        $requisition_ids = request()->requisition_id;
        $job_ids = request()->job_id;
        $branch_ids = request()->branch_id;
        $warehouse_ids = request()->warehouse_id;
        $item_ids = request()->item_id;
        $group_ids = request()->group_id;
        $subgroup_ids = request()->subgroup_id;
        $unit_ids = request()->unit_id;
        $sale_prices = request()->sale_price;
        $order_quantitys = request()->order_quantity;
        $receive_quantitys = request()->receive_quantity;
        $total_prices = request()->total_price;
        $where = array();
        if ($update_id == 0) {
            //$row = findById("material_receives", $where);
            //if (isset($row)) {
            //  $message = 'info_' . trans('cruds.insert_message');
            // } else {
            $material_receive = MaterialReceive::create($input);
            if (isset($material_receive)) {
                foreach ($material_receive_item_ids as $key => $value) {
                    $ps_id = $ps_ids[$key];
                    $item_id = $item_ids[$key];
                    $data = array(
                        'material_receive_id' => $material_receive->id,
                        'ps_id' => $ps_id,
                        'requisition_id' => $requisition_ids[$key],
                        'job_id' => $job_ids[$key],
                        'branch_id' => $branch_ids[$key],
                        'warehouse_id' => $warehouse_ids[$key],
                        'item_id' => $item_id,
                        'group_id' => $group_ids[$key],
                        'subgroup_id' => $subgroup_ids[$key],
                        'unit_id' => $unit_ids[$key],
                        'sale_price' => $sale_prices[$key],
                        'order_quantity' => $order_quantitys[$key],
                        'receive_quantity' => $receive_quantitys[$key],
                        'total_price' => $total_prices[$key],
                    );
                    // if (!$value) {
                    MaterialReceiveDetails::create($data);
                    // } else {
                    // MaterialReceiveDetails::where('id', $value)->update($data);
                    // }

                    /* $psDetails = PSDetails::where($where)->first();
                $ordered_qty = isset($psDetails) ? $psDetails->quantity : 0;

                $where = [];
                $where[] = ['ps_id', '=', $ps_id];
                $where[] = ['item_id', '=', $item_id];
                $received_qty = MaterialReceiveDetails::where($where)->sum('receive_quantity');
                $received_qty = isset($received_qty) ? $received_qty : 0; */

                }
            }
            $message = 'success_' . trans('cruds.insert_message');
            //}
        } else {
            // $where[] = ['id', '<>', $update_id];
            //  $row = findById("material_receives", $where);
            //  if (isset($row)) {
            $message = 'info_' . trans('cruds.exist_message');
            //  } else {
            $material_receive = MaterialReceive::find($update_id);
            MaterialReceiveDetails::where('material_receive_id', $update_id)->delete();
            if (isset($material_receive)) {
                foreach ($material_receive_item_ids as $key => $value) {
                    $data = array(
                        'material_receive_id' => $update_id,
                        'ps_id' => $ps_ids[$key],
                        'requisition_id' => $requisition_ids[$key],
                        'job_id' => $job_ids[$key],
                        'branch_id' => $branch_ids[$key],
                        'warehouse_id' => $warehouse_ids[$key],
                        'item_id' => $item_ids[$key],
                        'group_id' => $group_ids[$key],
                        'subgroup_id' => $subgroup_ids[$key],
                        'unit_id' => $unit_ids[$key],
                        'sale_price' => $sale_prices[$key],
                        'order_quantity' => $order_quantitys[$key],
                        'receive_quantity' => $receive_quantitys[$key],
                        'total_price' => $total_prices[$key],
                    );
                    // if (!$value) {
                    MaterialReceiveDetails::create($data);
                    // } else {
                    //  MaterialReceiveDetails::where('id', $value)->update($data);
                    //  }
                }
            }
            $material_receive->update($input);
            $message = 'success_' . trans('cruds.update_message');
            //  }
        }
        return redirect()->route('admin.material_receive.index');
    }

    public function edit(MaterialReceive $material_receive)
    {
        edit();
        $ps_ids = $material_receive->ps_id;
        if (!empty($ps_ids)) {
            $ps_ids = explode(',', $ps_ids);
        } else {
            $ps_ids = [];
        }
        return view('admin.material_receives.create', compact('material_receive', 'ps_ids'));
    }

    public function update(MaterialReceiveUpdateRequest $request, MaterialReceive $material_receive)
    {
        $material_receive->update($request->all());
        return redirect()->route('admin.material_receives.index');
    }

    public function show(MaterialReceive $material_receive)
    {
        show();

        return view('admin.material_receives.show', compact('material_receive'));
    }

    public function destroy(MaterialReceive $material_receive)
    {
        delete();

        $material_receive->delete();

        return back();
    }

    public function massDestroy(MaterialReceiveMassDestroyRequest $request)
    {
        delete();

        MaterialReceive::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
    public function approved($id)
    {
        if (!empty($id)) {
            MaterialReceive::where('id', $id)->update(['status' => 'Approved']);
            MaterialReceiveDetails::where('material_receive_id', $id)->update(['status' => 'Approved']);
            $message = 'success_' . trans('cruds.approved_message');
        } else {
            $message = 'danger_' . trans('cruds.wrong_message');
        }
        return redirect()->route('admin.material_receive.index');
    }
}
