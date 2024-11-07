<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        if (Auth::check()) {
            $user = Auth::user();
            return view("admin.dashboard.index", compact('user'));
        }
    }

    public function edit(Request $request)
    {
        $model = $request->table;
        $column = $request->column;
        $value = $request->value;
        $response = find($model, array($column => $value), $column, 'asc', 'first');
        return response()->json($response);
    }

    public function profile($name = '')
    {
        if (Auth::check()) {
            $user = Auth::user();
            return view('admin.users.profile', compact('user'));
        }
    }
}
