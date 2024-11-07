<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Item;
use App\TSItemIssueDetails;
use App\TSItemReturnDetails;

class ProductStockReportController extends Controller
{
    public function product_stock_report_index()
    {
        access();

        return view('admin.product_stock_report.product_stock_report_index');
    }

    public function generate_stock_report()
    {
        $group_id = request()->group_id;
        $subgroup_id = request()->subgroup_id;
        $item_id = request()->item_id;
        $where = [];
        if (!empty($group_id)) {
            $where[] = ['group_id', '=', $group_id];
        }
        if (!empty($subgroup_id)) {
            $where[] = ['subgroup_id', '=', $subgroup_id];
        }
        if (!empty($item_id)) {
            $where[] = ['id', '=', $item_id];
        }
        $items = Item::where($where)->get();
        foreach ($items as $key => $value) {
            $mainStore = presentStock(1, '', $value->group_id, $value->subgroup_id, $value->id); // Main Store Id = 1 ;
            $value->ms = $mainStore;
            $toolsStore = presentToolsStock(1, '', $value->group_id, $value->subgroup_id, $value->id); // Main Store Id = 1 ;

            $where = [];
            $where[] = ['item_id', '=', $value->id];
            $delivery_qty = \App\ChallanDetails::where($where)->sum('delivered_quantity');
            $delivery_qty = isset($delivery_qty) ? $delivery_qty : 0;
            $value->delivery_qty = $delivery_qty;

            $where = [];
            $where[] = ['item_id', '=', $value->id];
            $where[] = ['status', '=', 'Issued'];

            $card_quantity = TSItemIssueDetails::where($where)->sum('quantity');
            $card_quantity = isset($card_quantity) ? $card_quantity : 0;
            $where = [];
            $where[] = ['item_id', '=', $value->id];
            $return_quantity = TSItemReturnDetails::where($where)->sum('return_quantity');
            $return_quantity = isset($return_quantity) ? $return_quantity : 0;
            $value->ts = $toolsStore;
            $value->card_quantity = $card_quantity - $return_quantity;

            $where = [];
            $where[] = ['item_id', '=', $value->id];
            $where[] = ['status', '=', 'Approved'];

            $demage_qty = \App\DemageItem::where($where)->sum('quantity');
            $demage_qty = isset($demage_qty) ? $demage_qty : 0;

            $value->demage_quantity = $demage_qty;

            $value->total_quantity = $value->ms + $value->ts + $value->card_quantity + $value->demage_quantity; //+ $delivery_qty;

        }
        $data['group_id'] = $group_id;
        $data['subgroup_id'] = $subgroup_id;
        $data['item_id'] = $item_id;
        $data['items'] = $items;
        return view('admin.product_stock_report.product_stock_report_index', $data);
    }
    public function show_card_details($item_id)
    {

        $where = [];
        if (!empty($item_id)) {
            $where[] = ['item_id', '=', $item_id];
        }
        $cards = TSItemIssueDetails::leftJoin('tsitemissues', 'tsitemissues.id', '=', 'tsitemissue_details.tsitemissue_id')
            ->where($where)->get();
        foreach ($cards as $key => $value) {
            $mainStore = presentStock(1, '', $value->group_id, $value->subgroup_id, $value->item_id); // Main Store Id = 1 ;
            $value->ms = $mainStore;
            $toolsStore = presentToolsStock(1, '', $value->group_id, $value->subgroup_id, $value->item_id); // Main Store Id = 1 ;
            $value->ts = $toolsStore;

            $where = [];

            $where[] = ['tsitemreturns.tsitemissue_id', '=', $value->tsitemissue_id];
            $where[] = ['item_id', '=', $value->item_id];

            $return_quantity = TSItemReturnDetails::leftJoin('tsitemreturns', 'tsitemreturns.id', '=', 'tsitemreturn_details.tsitemreturn_id')
                ->where($where)->sum('return_quantity');
            $return_quantity = isset($return_quantity) ? $return_quantity : 0;

            $card_quantity = $value->quantity - $return_quantity;
            $value->card_quantity = $card_quantity;

        }

        $data['cards'] = $cards;
        return view('admin.product_stock_report.show_card_details', $data);
    }

    public function product_stock_history_report_index()
    {
        access();

        return view('admin.product_stock_report.product_stock_history_report_index');
    }

    public function generate_stock_history_report()
    {
        $group_id = request()->group_id;
        $subgroup_id = request()->subgroup_id;
        $item_id = request()->item_id;
        $where = [];
        if (!empty($group_id)) {
            $where[] = ['group_id', '=', $group_id];
        }
        if (!empty($subgroup_id)) {
            $where[] = ['subgroup_id', '=', $subgroup_id];
        }
        if (!empty($item_id)) {
            $where[] = ['id', '=', $item_id];
        }
        $items = Item::where($where)->get();
        foreach ($items as $key => $value) {
            $mainStore = presentStock(1, 1, $value->group_id, $value->subgroup_id, $value->id); // Main Store Id = 1 ;
            $value->ms = $mainStore;
            $toolsStore = presentStock(1, 2, $value->group_id, $value->subgroup_id, $value->id); // Main Store Id = 1 ;
            $value->ts = $toolsStore;
        }
        $data['group_id'] = $group_id;
        $data['subgroup_id'] = $subgroup_id;
        $data['item_id'] = $item_id;
        $data['items'] = $items;
        return view('admin.product_stock_report.product_stock_history_report_index', $data);
    }
}
