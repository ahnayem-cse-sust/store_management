<?php

namespace App\Http\Controllers\Admin;

use App\Card;
use App\Http\Controllers\Controller;
use App\Http\Requests\CardMassDestroyRequest;
use App\Http\Requests\CardStoreRequest;
use App\Http\Requests\CardUpdateRequest;
use Illuminate\Http\Request;

class CardController extends Controller
{
    public function index()
    {
        access();

        $cards = Card::all();

        return view('admin.card.index', compact('cards'));
    }

    public function create()
    {
        create();

        return view('admin.card.create');
    }

    public function store(CardStoreRequest $request)
    {
        $input = $request->all();
        $update_id = $request->update_id;
        $where = array();
        if ($update_id == 0) {
            /* $row = find("Card", $where, "id", "asc", "first");
            if (isset($row)) {
            $message = 'info_' . trans('cruds.exist_message');
            } else { */
            Card::create($input);
            $message = 'success_' . trans('cruds.insert_message');
            //  }
        } else {
            /* $where[] = ['id', '<>', $update_id];
            $row = find("Card", $where, "id", "asc", "first");
            if (isset($row)) {
            $message = 'info_' . trans('cruds.exist_message');
            } else { */
            $card = Card::find($update_id);
            $card->update($input);
            $message = 'success_' . trans('cruds.update_message');
            //  }
        }
        return redirect()->route('admin.card.index')->with("message", $message);
    }

    public function edit(Card $card)
    {
        edit();

        return view('admin.card.edit', compact('card'));
    }

    public function update(CardUpdateRequest $request, Card $card)
    {
        $card->update($request->all());

        return redirect()->route('admin.card.index');
    }

    public function show(Card $card)
    {
        show();

        return view('admin.card.show', compact('card'));
    }

    public function destroy(Card $card)
    {
        delete();

        $card->delete();

        $message = 'danger_' . trans('cruds.delete_message');

        return back()->with('message', $message);
    }

    public function massDestroy(CardMassDestroyRequest $request)
    {
        delete();

        Card::whereIn('id', request('ids'))->delete();

        //return response(null, Response::HTTP_NO_CONTENT);

        $message = 'danger_' . trans('cruds.delete_message');

        return back()->with('message', $message);
    }
}
