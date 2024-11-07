<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ItemMassDestroyRequest;
use App\Http\Requests\ItemStoreRequest;
use App\Http\Requests\ItemUpdateRequest;
use App\Item;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ItemController extends Controller
{
    public function index()
    {
        access();

        $items = Item::all();

        return view('admin.items.index', compact('items'));
    }

    public function create()
    {
        create();

        return view('admin.items.create');
    }

    public function store(ItemStoreRequest $request)
    {
        $input = $request->all();
        $update_id = $input['update_id'];
        $item_name = $input['item_name'];
        $input['page_location'] = $input['page_location'] + 1;
        $where = array();
        $where[] = ['item_name', '=', $item_name];
        if ($update_id == 0) {
            $row = findById("items", $where);
            if (isset($row)) {
                $message = 'info_' . trans('cruds.insert_message');
            } else {
                $item = Item::create($input);
                $message = 'success_' . trans('cruds.insert_message');
            }
        } else {
            $where[] = ['id', '<>', $update_id];
            $row = findById("items", $where);
            if (isset($row)) {
                $message = 'info_' . trans('cruds.exist_message');
            } else {
                $item = Item::find($update_id);
                $item->update($input);
                $message = 'success_' . trans('cruds.update_message');
            }
        }
        return redirect()->route('admin.item.index');
    }

    public function edit(Item $item)
    {
        edit();

        return view('admin.items.create', compact('item'));
    }

    public function update(ItemUpdateRequest $request, Item $item)
    {
        $item->update($request->all());
        return redirect()->route('admin.items.index');
    }

    public function show(Item $item)
    {
        show();

        return view('admin.items.show', compact('item'));
    }

    public function destroy(Item $item)
    {
        delete();

        $item->delete();

        return back();
    }

    public function massDestroy(ItemMassDestroyRequest $request)
    {
        delete();

        Item::whereIn('id', request('ids'))->delete();

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
    public function presentToolsSock()
    {
        $branch_id = request()->branch_id;
        $warehouse_id = request()->warehouse_id;
        $group_id = request()->group_id;
        $subgroup_id = request()->subgroup_id;
        $item_id = request()->item_id;
        $from_date = request()->from_date;
        $to_date = request()->to_date;
        $opening = presentToolsStock($branch_id, $warehouse_id, $group_id, $subgroup_id, $item_id, $from_date, $to_date);
        return $opening;
    }
}
