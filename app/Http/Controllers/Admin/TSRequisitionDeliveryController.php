<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\TSChallan;
use App\TSChallanDetails;
use App\TSRequisition;
use App\TSRequisitionDetails;
use Illuminate\Http\Request;

class TSRequisitionDeliveryController extends Controller
{
    public function index()
    {
        access();

        $challans = TSChallanDetails::select('tschallan_details.*', 'challan_code', 'tsrequisition_code', 'item_name', 'unit_name')
            ->leftJoin('tsrequisitions', 'tsrequisitions.id', '=', 'tschallan_details.tsrequisition_id')
            ->leftJoin('tschallans', 'tschallans.id', '=', 'tschallan_details.challan_id')
            ->leftJoin('items', 'items.id', '=', 'tschallan_details.item_id')
            ->leftJoin('units', 'units.id', '=', 'items.unit_id')
            ->get();

        return view('admin.tsrequision_delivery.index', compact('challans'));
    }

    public function create()
    {
        create();
        return view('admin.tsrequision_delivery.create');
    }

    public function initialize()
    {
        $tsrequisition_id = request()->tsrequisition_id;
        $data['tsrequisition'] = find('TSRequisition', [['id', '=', $tsrequisition_id]], 'id', 'asc', 'first');
        $response = view('admin.tsrequision_delivery.initialize', $data)->render();
        return $response;
    }

    public function store()
    {
        $except = ['tsrequisition_details_id', 'item_id', 'group_id', 'subgroup_id', 'unit_id', 'sale_price', 'ordered_quantity', 'delivered_quantity'];
        $input = request()->except($except);
        $tsrequisition_id = request()->tsrequisition_id;
        $tsrequisition = find('TSRequisition', [['id', '=', $tsrequisition_id]], 'id', 'asc', 'first');
        $input['branch_id'] = isset($tsrequisition) ? $tsrequisition->branch_id : 0;
        $warehouse_from_id = isset($tsrequisition) ? $tsrequisition->warehouse_from_id : 0;
        $input['warehouse_from_id'] = $warehouse_from_id;
        $warehouse_to_id = isset($tsrequisition) ? $tsrequisition->warehouse_to_id : 0;
        $input['warehouse_to_id'] = $warehouse_to_id;
        $tsrequisition_details_ids = request()->tsrequisition_details_id;
        $item_ids = request()->item_id;
        $group_ids = request()->group_id;
        $subgroup_ids = request()->subgroup_id;
        $unit_ids = request()->unit_id;
        $sale_prices = request()->sale_price;
        $ordered_quantitys = request()->ordered_quantity;
        $delivered_quantitys = request()->delivered_quantity;
        $update_id = 0;
        $challan_id = 0;
        if ($update_id == 0) {
            $challan = TSChallan::create($input);
            $challan_id = $challan->id;
            if (count($tsrequisition_details_ids)) {
                foreach ($tsrequisition_details_ids as $key => $value) {
                    $delivered_quantity = $delivered_quantitys[$key];
                    $order_quantity = $ordered_quantitys[$key];
                    $sale_price = $sale_prices[$key];
                    $total_price = 0;
                    if ($delivered_quantity) {
                        if ($sale_price) {
                            $total_price = $delivered_quantity * $sale_price;
                        }
                        $data = array(
                            'challan_id' => $challan->id,
                            'tsrequisition_id' => $tsrequisition_id,
                            'tsrequisition_details_id' => $tsrequisition_details_ids[$key],
                            'warehouse_from_id' => $warehouse_from_id,
                            'warehouse_to_id' => $warehouse_to_id,
                            'branch_id' => $input['branch_id'],
                            'item_id' => $item_ids[$key],
                            'group_id' => $group_ids[$key],
                            'subgroup_id' => $subgroup_ids[$key],
                            'unit_id' => $unit_ids[$key],
                            'order_quantity' => $ordered_quantitys[$key],
                            'delivered_quantity' => $delivered_quantitys[$key],
                            'sale_price' => $sale_prices[$key],
                            'total_price' => $total_price,
                        );
                        TSChallanDetails::create($data);
                    }
                    $where = [];
                    $where[] = ['tsrequisition_details_id', '=', $value];
                    $where[] = ['item_id', '=', $item_ids[$key]];
                    $delivered_quantity = TSChallanDetails::where($where)->sum('delivered_quantity');
                    $delivered_quantity = isset($delivered_quantity) ? $delivered_quantity : 0;
                    if ($delivered_quantity >= $order_quantity) {
                        TSRequisitionDetails::where('id', $value)->update(['status' => 'Delivered']);
                    }
                    $where = [];
                    $where[] = ['tsrequisition_id', '=', $tsrequisition_id];
                    $where[] = ['status', '!=', 'Delivered'];
                    $tsrequisition_details = TSRequisitionDetails::where($where)->count();
                    if ($tsrequisition_details == 0) {
                        TSRequisition::where('id', $tsrequisition_id)->update(['status' => 'Delivered']);
                    }
                }
            }

            $message = 'success_' . trans('cruds.insert_message');
        } else {
            $challan = Challan::find($update_id);
            $challan->update($input);
            $message = 'success_' . trans('cruds.update_message');
        }
        return redirect()->route('admin.tsrdelivery.show', $challan_id);
    }
    public function show($id)
    {
        $challan = TSChallan::where('id', $id)->first();
        return view('admin.tsrequision_delivery.show', compact('challan'));
    }
}
