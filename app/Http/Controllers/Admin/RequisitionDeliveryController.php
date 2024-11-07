<?php

namespace App\Http\Controllers\Admin;

use App\Challan;
use App\ChallanDetails;
use App\Http\Controllers\Controller;
use App\Requisition;
use App\RequisitionDetails;
use Illuminate\Http\Request;

class RequisitionDeliveryController extends Controller
{
    public function index()
    {
        access();

        $challans = ChallanDetails::select('challan_details.*', 'challan_code', 'requisition_code', 'item_name', 'unit_name')
            ->leftJoin('requisitions', 'requisitions.id', '=', 'challan_details.requisition_id')
            ->leftJoin('challans', 'challans.id', '=', 'challan_details.challan_id')
            ->leftJoin('items', 'items.id', '=', 'challan_details.item_id')
            ->leftJoin('units', 'units.id', '=', 'items.unit_id')
            ->get();

        return view('admin.requision_delivery.index', compact('challans'));
    }

    public function create()
    {
        create();
        return view('admin.requision_delivery.create');
    }

    public function initialize()
    {
        $requisition_id = request()->requisition_id;
        $data['requisition'] = find('Requisition', [['id', '=', $requisition_id]], 'id', 'asc', 'first');
        $response = view('admin.requision_delivery.initialize', $data)->render();
        return $response;
    }

    public function store()
    {
        $except = ['requisition_details_id', 'item_id', 'group_id', 'subgroup_id', 'unit_id', 'sale_price', 'ordered_quantity', 'delivered_quantity'];
        $input = request()->except($except);
        $requisition_id = request()->requisition_id;
        $requisition = find('Requisition', [['id', '=', $requisition_id]], 'id', 'asc', 'first');
        $input['branch_id'] = isset($requisition) ? $requisition->branch_id : 0;
        $input['job_id'] = isset($requisition) ? $requisition->job_id : 0;
        $input['party_id'] = isset($requisition) ? $requisition->party_id : 0;
        $input['section_id'] = isset($requisition) ? $requisition->section_id : 0;
        $warehouse_id = isset($requisition) ? $requisition->warehouse_id : 0;
        $input['warehouse_id'] = $warehouse_id;
        $requisition_details_ids = request()->requisition_details_id;
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
            $challan = Challan::create($input);
            $challan_id = $challan->id;
            if (count($requisition_details_ids)) {
                foreach ($requisition_details_ids as $key => $value) {
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
                            'requisition_id' => $requisition_id,
                            'requisition_details_id' => $requisition_details_ids[$key],
                            'branch_id' => $input['branch_id'],
                            'warehouse_id' => $warehouse_id,
                            'item_id' => $item_ids[$key],
                            'group_id' => $group_ids[$key],
                            'subgroup_id' => $subgroup_ids[$key],
                            'unit_id' => $unit_ids[$key],
                            'order_quantity' => $ordered_quantitys[$key],
                            'delivered_quantity' => $delivered_quantitys[$key],
                            'sale_price' => $sale_prices[$key],
                            'total_price' => $total_price,
                        );
                        ChallanDetails::create($data);
                    }
                    $where = [];
                    $where[] = ['requisition_details_id', '=', $value];
                    $where[] = ['item_id', '=', $item_ids[$key]];
                    $delivered_quantity = ChallanDetails::where($where)->sum('delivered_quantity');
                    $delivered_quantity = isset($delivered_quantity) ? $delivered_quantity : 0;
                    if ($delivered_quantity >= $order_quantity) {
                        RequisitionDetails::where('id', $value)->update(['status' => 'Delivered']);
                    }
                    $where = [];
                    $where[] = ['requisition_id', '=', $requisition_id];
                    $where[] = ['status', '!=', 'Delivered'];
                    $requisition_details = RequisitionDetails::where($where)->count();
                    if ($requisition_details == 0) {
                        Requisition::where('id', $requisition_id)->update(['status' => 'Delivered']);
                    }
                }
            }

            $message = 'success_' . trans('cruds.insert_message');
        } else {
            $challan = Challan::find($update_id);
            $challan->update($input);
            $message = 'success_' . trans('cruds.update_message');
        }
        return redirect()->route('admin.delivery.show', $challan_id);
    }
    public function show($id)
    {
        $challan = Challan::where('id', $id)->first();
        return view('admin.requision_delivery.show', compact('challan'));
    }
}
