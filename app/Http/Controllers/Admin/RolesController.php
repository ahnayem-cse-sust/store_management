<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyRoleRequest;
use App\Http\Requests\StoreRoleRequest;
use App\Http\Requests\UpdateRoleRequest;
use App\Permission;
use App\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Response;

class RolesController extends Controller
{
    public function index()
    {
        access();

        $roles = Role::all();

        return view('admin.roles.index', compact('roles'));
    }

    public function create()
    {
        //create();
        $lang = session('language');
        if (!isset($lang) || empty($lang)) {
            $lang = 'en';
        }

        $permissions = Permission::select('permissions.id as p_id', 'permissions.menu_id', 'title', "$lang")
            ->leftJoin('menus', 'menus.id', '=', 'permissions.menu_id')
            ->whereNull('menus.parent_id')
            ->where('permissions.menu_id', '!=', 0)
            ->where('menus.status', 'Active')
            ->groupBy('permissions.menu_id')
            ->orderBy('menus.order_no', 'asc')
            ->get();

        //return $permissions;

        foreach ($permissions as $key => $value) {
            $sub_permissions = Permission::select('permissions.id as p_id', 'permissions.menu_id', 'title', "$lang")
                ->leftJoin('menus', 'menus.id', '=', 'permissions.menu_id')
                ->where('menus.parent_id', $value->menu_id)
                ->where('menus.status', 'Active')
                ->groupBy('permissions.menu_id')
                ->orderBy('menus.order_no', 'asc')
                ->get();
            $value->sub_permissions = $sub_permissions;
            foreach ($sub_permissions as $key1 => $value1) {
                $sub_sub_permissions = Permission::where('menu_id', $value1->menu_id)->get();
                $value1->sub_sub_permissions = $sub_sub_permissions;
            }
        }

        return view('admin.roles.create', compact('permissions'));
    }

    public function store(StoreRoleRequest $request)
    {

        $input = $request->all();
        $update_id = $request->update_id;
        $permission_id = $request->permission_id;
        if ($update_id == 0) {
            $role = Role::create($input);
        } else {
            $role = Role::where('id', $update_id)->first();
            $role->update($input);
        }
        $role->permissions()->sync($permission_id);

        return redirect()->route('admin.roles.index');
    }

    public function edit(Role $role)
    {
        edit();

        $rolePermissions = DB::table('permission_role')->where('role_id', $role->id)->pluck('permission_id')->toArray();
        $lang = session('language');
        if (!isset($lang) || empty($lang)) {
            $lang = 'en';
        }

        $permissions = Permission::select('permissions.id as p_id', 'permissions.menu_id', 'title', "$lang")
            ->leftJoin('menus', 'menus.id', '=', 'permissions.menu_id')
            ->whereNull('menus.parent_id')
            ->where('permissions.menu_id', '!=', 0)
            ->where('menus.status', 'Active')
            ->groupBy('permissions.menu_id')
            ->orderBy('menus.order_no', 'asc')
            ->get();

        //return $permissions;

        foreach ($permissions as $key => $value) {
            $sub_permissions = Permission::select('permissions.id as p_id', 'permissions.menu_id', 'title', "$lang")
                ->leftJoin('menus', 'menus.id', '=', 'permissions.menu_id')
                ->where('menus.parent_id', $value->menu_id)
                ->where('menus.status', 'Active')
                ->groupBy('permissions.menu_id')
                ->orderBy('menus.order_no', 'asc')
                ->get();
            $value->sub_permissions = $sub_permissions;
            foreach ($sub_permissions as $key1 => $value1) {
                $sub_sub_permissions = Permission::where('menu_id', $value1->menu_id)->get();
                $value1->sub_sub_permissions = $sub_sub_permissions;
            }
        }

        return view('admin.roles.create', compact('permissions', 'role', 'rolePermissions'));
    }

    public function update(UpdateRoleRequest $request, Role $role)
    {
        $input = $request->all();
        $role->update($request->all());
        $role->permissions()->sync($request->input('permissions', []));

        return redirect()->route('admin.roles.index');
    }

    public function show(Role $role)
    {
        show();

        $role->load('permissions');

        return view('admin.roles.show', compact('role'));
    }

    public function destroy(Role $role)
    {
        delete();

        $role->delete();

        return back();
    }

    public function massDestroy(MassDestroyRoleRequest $request)
    {
        delete();

        Role::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
