<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\RequisitionMassDestroyRequest;
use App\Http\Requests\RequisitionStoreRequest;
use App\Http\Requests\RequisitionUpdateRequest;
use App\Requisition;
use App\RequisitionDetails;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RequisitionController extends Controller
{
    public function index()
    {
        access();

        $requisitions = Requisition::orderBy('id', 'desc')->get();

        return view('admin.requisitions.index', compact('requisitions'));
    }

    public function create()
    {
        create();
        return view('admin.requisitions.create');
    }

    public function store(RequisitionStoreRequest $request)
    {

        $input = $request->except('requisition_item_id', 'item_id', 'group_id', 'subgroup_id', 'unit_id', 'sale_price', 'quantity');
        $warehouse_id = $input['warehouse_id'];
        $branch_id = $input['branch_id'];
        $update_id = $input['update_id'];
        $requisition_item_ids = request()->requisition_item_id;
        $item_ids = request()->item_id;
        $group_ids = request()->group_id;
        $subgroup_ids = request()->subgroup_id;
        $unit_ids = request()->unit_id;
        $sale_prices = request()->sale_price;
        $quantitys = request()->quantity;
        $total_prices = request()->total_price;
        $where = array();
        if ($update_id == 0) {
            //$row = findById("requisitions", $where);
            //if (isset($row)) {
            //  $message = 'info_' . trans('cruds.insert_message');
            // } else {
            $requisition = Requisition::create($input);
            if (isset($requisition)) {
                foreach ($requisition_item_ids as $key => $value) {
                    $data = array(
                        'requisition_id' => $requisition->id,
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
                    if (!$value) {
                        RequisitionDetails::create($data);
                    } else {
                        RequisitionDetails::where('id', $value)->update($data);
                    }
                }
            }
            $message = 'success_' . trans('cruds.insert_message');
            //}
        } else {
            // $where[] = ['id', '<>', $update_id];
            //  $row = findById("requisitions", $where);
            //  if (isset($row)) {
            $message = 'info_' . trans('cruds.exist_message');
            //  } else {
            $requisition = Requisition::find($update_id);
            if (isset($requisition)) {
                foreach ($requisition_item_ids as $key => $value) {
                    $data = array(
                        'requisition_id' => $update_id,
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
                    if (!$value) {
                        RequisitionDetails::create($data);
                    } else {
                        RequisitionDetails::where('id', $value)->update($data);
                    }
                }
            }
            $requisition->update($input);
            $message = 'success_' . trans('cruds.update_message');
            //  }
        }
        return redirect()->route('admin.requisition.index');
    }

    public function edit(Requisition $requisition)
    {
        edit();

        return view('admin.requisitions.create', compact('requisition'));
    }

    public function update(RequisitionUpdateRequest $request, Requisition $requisition)
    {
        $requisition->update($request->all());
        return redirect()->route('admin.requisitions.index');
    }

    public function show(Requisition $requisition)
    {
        show();

        return view('admin.requisitions.show', compact('requisition'));
    }

    public function destroy(Requisition $requisition)
    {
        delete();

        $requisition->delete();

        return back();
    }

    public function massDestroy(RequisitionMassDestroyRequest $request)
    {
        delete();

        Requisition::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
    public function approved($id)
    {
        if (!empty($id)) {
            Requisition::where('id', $id)->update(['status' => 'Approved']);
            RequisitionDetails::where('requisition_id', $id)->update(['status' => 'Approved']);
            $message = 'success_' . trans('cruds.approved_message');
        } else {
            $message = 'danger_' . trans('cruds.wrong_message');
        }
        return redirect()->route('admin.requisition.index');
    }
}
