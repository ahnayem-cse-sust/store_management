<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\OpeningMassDestroyRequest;
use App\Http\Requests\OpeningStoreRequest;
use App\Http\Requests\OpeningUpdateRequest;
use App\Opening;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class OpeningController extends Controller
{
    public function index()
    {
        access();

        $openings = Opening::orderBy('id', 'desc')->get();

        return view('admin.opening.index', compact('openings'));
    }

    public function create()
    {
        create();

        return view('admin.opening.create');
    }

    public function store(OpeningStoreRequest $request)
    {
        $input = $request->except(['item_id', 'opening_quantity', 'opening_price']);
        $item_ids = $request->item_id;
        $opening_quantitys = $request->opening_quantity;
        $opening_prices = $request->opening_price;
        $update_id = 0; //$input['update_id'];

        $where = array();
        if ($update_id == 0) {
            foreach ($item_ids as $key => $value) {
                $item = find("Item", [['id', '=', $value]], 'id', 'asc', 'first');
                $input['item_id'] = $value;
                $input['group_id'] = $item->group_id;
                $input['subgroup_id'] = $item->subgroup_id;
                $input['opening_quantity'] = $opening_quantitys[$key];
                $input['opening_price'] = isset($opening_prices[$key]) ? $opening_prices[$key] : 0;
                $opening = Opening::create($input);
            }
            $message = 'success_' . trans('cruds.insert_message');
            // }
        } else {
            // $where[] = ['id', '<>', $update_id];
            // $row = findById("openings", $where);
            // if (isset($row)) {
            //    $message = 'info_' . trans('cruds.exist_message');
            // } else {
            $opening = Opening::find($update_id);
            $opening->update($input);
            $message = 'success_' . trans('cruds.update_message');
            // }
        }
        return redirect()->route('admin.opening.index');
    }
    public function singleStore()
    {
        $input = request()->all();
        $item_id = $input['item_id'];
        $item = find("Item", [['id', '=', $item_id]], 'id', 'asc', 'first');
        $input['item_id'] = $item_id;
        $input['group_id'] = $item->group_id;
        $input['subgroup_id'] = $item->subgroup_id;
        $input['opening_price'] = isset($input['opening_price']) ? $input['opening_price'] : 0;
        $opening = Opening::create($input);
        if (isset($opening)) {
            return 1;
        } else {
            return 0;
        }

    }

    public function edit(Opening $opening)
    {
        edit();

        return view('admin.opening.create', compact('opening'));
    }

    public function update(OpeningUpdateRequest $request, Opening $opening)
    {
        $opening->update($request->all());
        return redirect()->route('admin.opening.index');
    }

    public function show(Opening $opening)
    {
        show();

        return view('admin.opening.show', compact('opening'));
    }

    public function destroy(Opening $opening)
    {
        delete();

        $opening->delete();

        return back();
    }

    public function massDestroy(OpeningMassDestroyRequest $request)
    {
        delete();

        Opening::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
    public function getItem()
    {
        $where = request()->where;
        $model = request()->model;
        $page = request()->page;
        $data['values'] = find($model, $where, 'id', 'asc', 'get');
        $response = view($page, $data)->render();
        return $response;
    }
}
