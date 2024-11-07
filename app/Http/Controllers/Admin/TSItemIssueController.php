<?php

namespace App\Http\Controllers\Admin;

use App\Card;
use App\Http\Controllers\Controller;
use App\Http\Requests\TSItemIssueMassDestroyRequest;
use App\Http\Requests\TSItemIssueStoreRequest;
use App\Http\Requests\TSItemIssueUpdateRequest;
use App\TSItemIssue;
use App\TSItemIssueDetails;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TSItemIssueController extends Controller
{
    public function index()
    {
        access();

        $tsitemissues = TSItemIssue::orderBy('id', 'desc')->get();

        return view('admin.tsitemissues.index', compact('tsitemissues'));
    }

    public function create()
    {
        create();

        $cards = Card::select('cards.id as card_id', 'card_code', 'epf_no', 'name', 'users.id as user_id')
            ->leftJoin('users', 'users.id', '=', 'cards.user_id')->get();

        return view('admin.tsitemissues.create', compact('cards'));
    }

    public function store(TSItemIssueStoreRequest $request)
    {

        $input = $request->except('tsitemissue_item_id', 'item_id', 'group_id', 'subgroup_id', 'unit_id', 'sale_price', 'quantity');
        $warehouse_id = $input['warehouse_id'];
        $update_id = $input['update_id'];
        $branch_id = $input['branch_id'];
        $tsitemissue_item_ids = request()->tsitemissue_item_id;
        $item_ids = request()->item_id;
        $group_ids = request()->group_id;
        $subgroup_ids = request()->subgroup_id;
        $unit_ids = request()->unit_id;
        $sale_prices = request()->sale_price;
        $quantitys = request()->quantity;
        $total_prices = request()->total_price;
        $where = array();
        if ($update_id == 0) {
            //$row = findById("tsitemissues", $where);
            //if (isset($row)) {
            //  $message = 'info_' . trans('cruds.insert_message');
            // } else {
            $tsitemissue = TSItemIssue::create($input);
            if (isset($tsitemissue)) {
                foreach ($tsitemissue_item_ids as $key => $value) {
                    $data = array(
                        'tsitemissue_id' => $tsitemissue->id,
                        'warehouse_id' => $warehouse_id,
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
                        TSItemIssueDetails::create($data);
                    } else {
                        TSItemIssueDetails::where('id', $value)->update($data);
                    }
                }
            }
            $message = 'success_' . trans('cruds.insert_message');
            //}
        } else {
            // $where[] = ['id', '<>', $update_id];
            //  $row = findById("tsitemissues", $where);
            //  if (isset($row)) {
            $message = 'info_' . trans('cruds.exist_message');
            //  } else {
            $tsitemissue = TSItemIssue::find($update_id);
            if (isset($tsitemissue)) {
                foreach ($tsitemissue_item_ids as $key => $value) {
                    $data = array(
                        'tsitemissue_id' => $update_id,
                        'warehouse_id' => $warehouse_id,
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
                        TSItemIssueDetails::create($data);
                    } else {
                        TSItemIssueDetails::where('id', $value)->update($data);
                    }
                }
            }
            $tsitemissue->update($input);
            $message = 'success_' . trans('cruds.update_message');
            //  }
        }
        return redirect()->route('admin.tsitemissue.index');
    }

    public function edit(TSItemIssue $tsitemissue)
    {
        edit();

        $cards = Card::select('cards.id as card_id', 'card_code', 'epf_no', 'name', 'users.id as user_id')
            ->leftJoin('users', 'users.id', '=', 'cards.user_id')->get();

        return view('admin.tsitemissues.create', compact('tsitemissue', 'cards'));
    }

    public function update(TSItemIssueUpdateRequest $request, TSItemIssue $tsitemissue)
    {
        $tsitemissue->update($request->all());
        return redirect()->route('admin.tsitemissues.index');
    }

    public function show(TSItemIssue $tsitemissue)
    {
        show();

        return view('admin.tsitemissues.show', compact('tsitemissue'));
    }
    public function showStoreDetails($item_id)
    {
        return $item_id;

        return view('admin.tsitemissues.show', compact('tsitemissue'));
    }

    public function destroy(TSItemIssue $tsitemissue)
    {
        delete();

        $tsitemissue->delete();

        return back();
    }

    public function massDestroy(TSItemIssueMassDestroyRequest $request)
    {
        delete();

        TSItemIssue::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
    public function approved($id)
    {
        if (!empty($id)) {
            TSItemIssue::where('id', $id)->update(['status' => 'Issued']);
            TSItemIssueDetails::where('tsitemissue_id', $id)->update(['status' => 'Issued']);
            $message = 'success_' . trans('cruds.approved_message');
        } else {
            $message = 'danger_' . trans('cruds.wrong_message');
        }
        return redirect()->route('admin.tsitemissue.index');
    }
}
