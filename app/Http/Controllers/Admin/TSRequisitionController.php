<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\TSRequisitionMassDestroyRequest;
use App\Http\Requests\TSRequisitionStoreRequest;
use App\Http\Requests\TSRequisitionUpdateRequest;
use App\TSRequisition;
use App\TSRequisitionDetails;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TSRequisitionController extends Controller
{
    public function index()
    {
        access();

        $tsrequisitions = TSRequisition::orderBy('id', 'desc')->get();

        return view('admin.tsrequisitions.index', compact('tsrequisitions'));
    }

    public function create()
    {
        create();
        return view('admin.tsrequisitions.create');
    }

    public function store(TSRequisitionStoreRequest $request)
    {

        $input = $request->except('tsrequisition_item_id', 'item_id', 'group_id', 'subgroup_id', 'unit_id', 'sale_price', 'quantity');
        $warehouse_from_id = $input['warehouse_from_id'];
        $warehouse_to_id = $input['warehouse_to_id'];
        $update_id = $input['update_id'];
        $branch_id = $input['branch_id'];
        $tsrequisition_item_ids = request()->tsrequisition_item_id;
        $item_ids = request()->item_id;
        $group_ids = request()->group_id;
        $subgroup_ids = request()->subgroup_id;
        $unit_ids = request()->unit_id;
        $sale_prices = request()->sale_price;
        $quantitys = request()->quantity;
        $total_prices = request()->total_price;
        $where = array();
        if ($update_id == 0) {
            //$row = findById("tsrequisitions", $where);
            //if (isset($row)) {
            //  $message = 'info_' . trans('cruds.insert_message');
            // } else {
            $tsrequisition = TSRequisition::create($input);
            if (isset($tsrequisition)) {
                foreach ($tsrequisition_item_ids as $key => $value) {
                    $data = array(
                        'tsrequisition_id' => $tsrequisition->id,
                        'warehouse_from_id' => $warehouse_from_id,
                        'warehouse_to_id' => $warehouse_to_id,
                        'branch_id' => $branch_id,
                        'item_id' => $item_ids[$key],
                        'group_id' => $group_ids[$key],
                        'subgroup_id' => $subgroup_ids[$key],
                        'unit_id' => $unit_ids[$key],
                        'sale_price' => $sale_prices[$key],
                        'quantity' => $quantitys[$key],
                        'total_price' => $total_prices[$key],
                    );
                    if (!$value) {
                        TSRequisitionDetails::create($data);
                    } else {
                        TSRequisitionDetails::where('id', $value)->update($data);
                    }
                }
            }
            $message = 'success_' . trans('cruds.insert_message');
            //}
        } else {
            // $where[] = ['id', '<>', $update_id];
            //  $row = findById("tsrequisitions", $where);
            //  if (isset($row)) {
            $message = 'info_' . trans('cruds.exist_message');
            //  } else {
            $tsrequisition = TSRequisition::find($update_id);
            if (isset($tsrequisition)) {
                foreach ($tsrequisition_item_ids as $key => $value) {
                    $data = array(
                        'tsrequisition_id' => $update_id,
                        'warehouse_from_id' => $warehouse_from_id,
                        'warehouse_to_id' => $warehouse_to_id,
                        'branch_id' => $branch_id,
                        'item_id' => $item_ids[$key],
                        'group_id' => $group_ids[$key],
                        'subgroup_id' => $subgroup_ids[$key],
                        'unit_id' => $unit_ids[$key],
                        'sale_price' => $sale_prices[$key],
                        'quantity' => $quantitys[$key],
                        'total_price' => $total_prices[$key],
                    );
                    if (!$value) {
                        TSRequisitionDetails::create($data);
                    } else {
                        TSRequisitionDetails::where('id', $value)->update($data);
                    }
                }
            }
            $tsrequisition->update($input);
            $message = 'success_' . trans('cruds.update_message');
            //  }
        }
        return redirect()->route('admin.tsrequisition.index');
    }

    public function edit(TSRequisition $tsrequisition)
    {
        edit();

        return view('admin.tsrequisitions.create', compact('tsrequisition'));
    }

    public function update(TSRequisitionUpdateRequest $request, TSRequisition $tsrequisition)
    {
        $tsrequisition->update($request->all());
        return redirect()->route('admin.tsrequisitions.index');
    }

    public function show(TSRequisition $tsrequisition)
    {
        show();

        return view('admin.tsrequisitions.show', compact('tsrequisition'));
    }

    public function destroy(TSRequisition $tsrequisition)
    {
        delete();

        $tsrequisition->delete();

        return back();
    }

    public function massDestroy(TSRequisitionMassDestroyRequest $request)
    {
        delete();

        TSRequisition::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
    public function approved($id)
    {
        if (!empty($id)) {
            TSRequisition::where('id', $id)->update(['status' => 'Approved']);
            TSRequisitionDetails::where('tsrequisition_id', $id)->update(['status' => 'Approved']);
            $message = 'success_' . trans('cruds.approved_message');
        } else {
            $message = 'danger_' . trans('cruds.wrong_message');
        }
        return redirect()->route('admin.tsrequisition.index');
    }
}
