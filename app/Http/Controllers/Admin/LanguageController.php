<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\LanguageStoreRequest;
use App\Http\Requests\LanguageUpdateRequest;
use App\Language;
use App\Manager;
use App\Permission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Response;

class LanguageController extends Controller
{
    protected $manager;

    public function __construct(Manager $manager)
    {
        $this->manager = $manager;
    }
    public function index()
    {
        access();
        $locales = config('panel.available_languages');
        $allTranslations = Language::orderBy('id', 'asc')->get();
        $translations = [];
        foreach ($allTranslations as $translation) {
            $translations[$translation->key][$translation->locale] = $translation;
        }

        //return $translations;

        return view('admin.language.index', compact('translations', 'locales'));
    }

    public function create()
    {
        create();
        $permissions = Permission::select('permissions.id as p_id', 'permissions.menu_id', 'title', 'menu_name')
            ->leftJoin('menus', 'menus.id', '=', 'permissions.menu_id')
            ->whereNull('menus.parent_id')
            ->where('permissions.menu_id', '!=', 0)
            ->where('menus.status', 'Active')
            ->orderBy('menus.order_no', 'asc')
            ->get();

        foreach ($permissions as $key => $value) {
            $sub_permissions = Permission::select('permissions.id as p_id', 'permissions.menu_id', 'title', 'menu_name')
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

        return view('admin.language.create', compact('permissions'));
    }

    public function store(LanguageStoreRequest $request)
    {

        $input = $request->all();
        $update_id = $request->update_id;
        $permission_id = $request->permission_id;
        if ($update_id == 0) {
            $role = Language::create($input);
        } else {
            $role = Language::where('id', $update_id)->first();
            $role->update($input);
        }
        $role->permissions()->sync($permission_id);

        return redirect()->route('admin.language.index');
    }

    public function edit(Language $role)
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

        return view('admin.language.create', compact('permissions', 'role', 'rolePermissions'));
    }

    public function update(LanguageUpdateRequest $request, Language $role)
    {

        return redirect()->route('admin.language.index');
    }

    public function show(Language $role)
    {
        show();

        $role->load('permissions');

        return view('admin.language.show', compact('role'));
    }

    public function destroy(Language $role)
    {
        delete();

        $role->delete();

        return back();
    }

    public function massDestroy(MassDestroyLanguageRequest $request)
    {
        delete();

        Language::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
    public function updateLang()
    {
        $pk = request()->pk;
        $key = request()->key;
        $value = request()->value;
        $locale = request()->locale;
        $model = Language::where('id', $pk)->first();

        DB::beginTransaction();
        try {
            if ($pk > 0) {
                $model->update(['value' => $value]);
            } else {
                Language::create([
                    'group' => 'cruds',
                    'key' => $key,
                    'value' => $value,
                    'locale' => $locale,
                ]);
            }
            DB::commit();

            $json = false;
            $group = 'cruds';

            if ($group === '_json') {
                $json = true;
            }

            $this->manager->exportTranslations($group, $json);

            $response = [
                'status' => '200',
                'msg' => 'Data updated successful!',
            ];
        } catch (\Exception $e) {
            DB::rollback();
            $response = [
                'status' => '201',
                'msg' => 'Data updated failed!',
            ];
        }
        return response()->json($response);

    }
}
