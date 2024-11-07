<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\TSItemReturnMassDestroyRequest;
use App\Http\Requests\TSItemReturnStoreRequest;
use App\Http\Requests\TSItemReturnUpdateRequest;
use App\TSItemIssue;
use App\TSItemReturn;
use App\TSItemReturnDetails;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TSItemReturnController extends Controller
{
    public function index()
    {
        access();

        $tsitemreturns = TSItemReturn::orderBy('id', 'desc')->get();

        return view('admin.tsitemreturns.index', compact('tsitemreturns'));
    }

    public function create()
    {
        create();

        $tsitemissues = TSItemIssue::where('status', 'Issued')->orderBy('id', 'desc')->get();

        return view('admin.tsitemreturns.create', compact('tsitemissues'));
    }

    public function initialize()
    {
        $tsitemissue_id = request()->tsitemissue_id;
        $data['tsitemissue'] = find('TSItemIssue', [['id', '=', $tsitemissue_id]], 'id', 'asc', 'first');
/*         $tsitemissueDetails = find('TSItemIssueDetails', [['tsitemissue_id', '=', $tsitemissue_id]], 'id', 'asc', 'get');
var_dump($tsitemissueDetails);die; */
        $response = view('admin.tsitemreturns.initialize', $data)->render();
        return $response;
    }

    public function store(TSItemReturnStoreRequest $request)
    {

        //$input = $request->except('tsitemreturn_item_id', 'item_id', 'group_id', 'subgroup_id', 'unit_id', 'ordered_quantity', 'return_quantity');
        $tsitemissue_id = request()->tsitemissue_id;
        $tsitemissue = TSItemIssue::where('id', $tsitemissue_id)->first();
        $warehouse_id = isset($tsitemissue) ? $tsitemissue->warehouse_id : 0;
        $update_id = request()->update_id;
        $branch_id = isset($tsitemissue) ? $tsitemissue->branch_id : '';
        $section_id = isset($tsitemissue) ? $tsitemissue->section_id : '';
        $card_id = isset($tsitemissue) ? $tsitemissue->card_id : '';
        $tsitemreturn_code = request()->tsitemreturn_code;
        $tsitemreturn_date = request()->tsitemreturn_date;
        $tsitemreturn_item_ids = request()->tsitemreturn_item_id;
        $tsitemissue_details_ids = request()->tsitemissue_details_id;
        $item_ids = request()->item_id;
        $group_ids = request()->group_id;
        $subgroup_ids = request()->subgroup_id;
        $unit_ids = request()->unit_id;
        $order_quantitys = request()->order_quantity;
        $return_quantitys = request()->return_quantity;
        $input['tsitemreturn_code'] = $tsitemreturn_code;
        $input['tsitemreturn_date'] = $tsitemreturn_date;
        $input['tsitemissue_id'] = $tsitemissue_id;
        $input['warehouse_id'] = $warehouse_id;
        $input['branch_id'] = $branch_id;
        $input['section_id'] = $section_id;
        $input['card_id'] = $card_id;
        $where = array();
        if ($update_id == 0) {
            //$row = findById("tsitemreturns", $where);
            //if (isset($row)) {
            //  $message = 'info_' . trans('cruds.insert_message');
            // } else {
            $tsitemreturn = TSItemReturn::create($input);
            if (isset($tsitemreturn)) {
                foreach ($tsitemreturn_item_ids as $key => $value) {
                    $data = array(
                        'tsitemreturn_id' => $tsitemreturn->id,
                        'tsitemissue_details_id' => $tsitemissue_details_ids[$key],
                        'warehouse_id' => $warehouse_id,
                        'branch_id' => $branch_id,
                        'item_id' => $item_ids[$key],
                        'group_id' => $group_ids[$key],
                        'subgroup_id' => $subgroup_ids[$key],
                        'unit_id' => $unit_ids[$key],
                        'order_quantity' => $order_quantitys[$key],
                        'return_quantity' => $return_quantitys[$key],
                    );
                    //if (!$value) {
                    TSItemReturnDetails::create($data);
                    // } else {
                    //   TSItemReturnDetails::where('id', $value)->update($data);
                    // }
                }
            }
            $message = 'success_' . trans('cruds.insert_message');
            //}
        } else {
            // $where[] = ['id', '<>', $update_id];
            //  $row = findById("tsitemreturns", $where);
            //  if (isset($row)) {
            $message = 'info_' . trans('cruds.exist_message');
            //  } else {
            $tsitemreturn = TSItemReturn::find($update_id);
            if (isset($tsitemreturn)) {
                foreach ($tsitemreturn_item_ids as $key => $value) {
                    $data = array(
                        'tsitemreturn_id' => $update_id,
                        'tsitemissue_details_id' => $tsitemissue_details_ids[$key],
                        'warehouse_id' => $warehouse_id,
                        'branch_id' => $branch_id,
                        'item_id' => $item_ids[$key],
                        'group_id' => $group_ids[$key],
                        'subgroup_id' => $subgroup_ids[$key],
                        'unit_id' => $unit_ids[$key],
                        'order_quantity' => $order_quantitys[$key],
                        'return_quantity' => $return_quantitys[$key],
                    );
                    // if (!$value) {
                    TSItemReturnDetails::create($data);
                    //} else {
                    //  TSItemReturnDetails::where('id', $value)->update($data);
                    // }
                }
            }
            $tsitemreturn->update($input);
            $message = 'success_' . trans('cruds.update_message');
            //  }
        }
        return redirect()->route('admin.tsitemreturn.index');
    }

    public function edit(TSItemReturn $tsitemreturn)
    {
        edit();

        return view('admin.tsitemreturns.create', compact('tsitemreturn'));
    }

    public function update(TSItemReturnUpdateRequest $request, TSItemReturn $tsitemreturn)
    {
        $tsitemreturn->update($request->all());
        return redirect()->route('admin.tsitemreturns.index');
    }

    public function show(TSItemReturn $tsitemreturn)
    {
        show();

        return view('admin.tsitemreturns.show', compact('tsitemreturn'));
    }

    public function destroy(TSItemReturn $tsitemreturn)
    {
        delete();

        $tsitemreturn->delete();
        TSItemReturnDetails::where('tsitemreturn_id', $tsitemreturn->id)->delete();

        return back();
    }

    public function massDestroy(TSItemReturnMassDestroyRequest $request)
    {
        delete();

        TSItemReturn::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
    public function approved($id)
    {
        if (!empty($id)) {
            TSItemReturn::where('id', $id)->update(['status' => 'Issued']);
            TSItemReturnDetails::where('tsitemreturn_id', $id)->update(['status' => 'Issued']);
            $message = 'success_' . trans('cruds.approved_message');
        } else {
            $message = 'danger_' . trans('cruds.wrong_message');
        }
        return redirect()->route('admin.tsitemreturn.index');
    }
}
