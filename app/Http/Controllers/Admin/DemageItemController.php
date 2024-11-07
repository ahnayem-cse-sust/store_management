<?php

namespace App\Http\Controllers\Admin;

use App\DemageItem;
use App\Http\Controllers\Controller;
use App\Http\Requests\DemageItemMassDestroyRequest;
use App\Http\Requests\DemageItemStoreRequest;
use App\Http\Requests\DemageItemUpdateRequest;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class DemageItemController extends Controller
{
    public function index()
    {
        access();

        $demageitems = DemageItem::orderBy('id', 'desc')->get();

        return view('admin.demageitems.index', compact('demageitems'));
    }

    public function create()
    {
        create();

        return view('admin.demageitems.create');
    }

    public function store(DemageItemStoreRequest $request)
    {
        $input = $request->all();
        $update_id = $input['update_id'];
        $item_id = $input['item_id'];
        $item = find('Item', [['id', '=', $item_id]], 'id', 'asc', 'first');
        $group_id = isset($item) ? $item->group_id : 0;
        $subgroup_id = isset($item) ? $item->subgroup_id : 0;
        $input['group_id'] = $group_id;
        $input['subgroup_id'] = $subgroup_id;
        if ($update_id == 0) {
            $demageitem = DemageItem::create($input);
            $message = 'success_' . trans('cruds.insert_message');
        } else {
            $demageitem = DemageItem::find($update_id);
            $demageitem->update($input);
            $message = 'success_' . trans('cruds.update_message');
        }
        return redirect()->route('admin.demageitem.index');
    }

    public function edit(DemageItem $demageitem)
    {
        edit();

        return view('admin.demageitems.create', compact('demageitem'));
    }

    public function update(DemageItemUpdateRequest $request, DemageItem $demageitem)
    {
        $demageitem->update($request->all());
        return redirect()->route('admin.demageitems.index');
    }

    public function show(DemageItem $demageitem)
    {
        show();

        return view('admin.demageitems.show', compact('demageitem'));
    }

    public function destroy(DemageItem $demageitem)
    {
        delete();

        $demageitem->delete();

        return back();
    }

    public function massDestroy(DemageItemMassDestroyRequest $request)
    {
        delete();

        DemageItem::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
    public function presentSock()
    {
        $branch_id = request()->branch_id;
        $warehouse_id = request()->warehouse_id;
        $group_id = request()->group_id;
        $subgroup_id = request()->subgroup_id;
        $item_id = request()->item_id;
        $from_date = request()->from_date;
        $to_date = request()->to_date;
        $opening = presentStock($branch_id, $warehouse_id, $group_id, $subgroup_id, $item_id, $from_date, $to_date);
        return $opening;
    }
    public function approved($id)
    {
        if (!empty($id)) {
            DemageItem::where('id', $id)->update(['status' => 'Approved']);
            $message = 'success_' . trans('cruds.approved_message');
        } else {
            $message = 'danger_' . trans('cruds.wrong_message');
        }
        return redirect()->route('admin.demageitem.index');
    }
}
