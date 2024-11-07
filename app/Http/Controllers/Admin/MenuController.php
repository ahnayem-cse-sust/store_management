<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MenuMassDestroyRequest;
use App\Http\Requests\MenuStoreRequest;
use App\Http\Requests\MenuUpdateRequest;
use App\Menu;
use App\Permission;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class MenuController extends Controller
{
    public function index(Request $request)
    {
        ///access();
        $lang = session('language');
        if (!isset($lang) || empty($lang)) {
            $lang = 'en';
        }
        $parent_id = $request->parent_id;
        $parent_menu = '';
        if (!isset($parent_id) || $parent_id == 'NULL') {
            $menus = Menu::whereNull('parent_id')->orderBy('order_no')->get();
        } else {
            $parent = find('Menu', [['id', '=', $parent_id]], 'id', 'asc', 'first');
            $parent_menu = isset($parent) ? $parent->$lang : "";
            $menus = Menu::where('parent_id', $parent_id)->orderBy('order_no')->get();
        }
        return view('admin.menu.index', compact('menus', 'parent_id', 'parent_menu'));
    }

    public function create()
    {
        //create();

        return view('admin.menu.create');
    }

    public function store(MenuStoreRequest $request)
    {
        $input = $request->all();
        $menu_name = $input['en'];
        $menu_link = $input['menu_link'];
        if ($menu_link == '#') {
            $slug = slugify($menu_name, '_');
        } else {
            $slug = slugify($menu_link, '_');
        }
        $input['slug'] = $slug;
        $update_id = $request->update_id;
        $where = array();
        // $where[] = ['menu_name', '=', $menu_name];
        if ($update_id == 0) {
            $row = find("Menu", $where, "id", "asc", "first");
            /*  if (isset($row)) {
            $message = 'info_' . trans('cruds.exist_message');
            } else {*/
            $menu = Menu::create($input);
            $menu_id = $menu->id;

            //copy('app\Http\Controllers\Admin\OfficeController.php','app\Http\Controllers\Admin\OfficeController-copy.php');

            $permission = array();
            if ($menu_link == '#') {
                $access = array(
                    'menu_id' => $menu_id,
                    'title' => 'access_' . $slug,
                    'created_at' => date('Y-m-d H:i:s'),
                );
                $permission[] = $access;
            } else {
                $access = array(
                    'menu_id' => $menu_id,
                    'title' => 'access_' . $slug,
                    'created_at' => date('Y-m-d H:i:s'),
                );
                $permission[] = $access;
                $access = array(
                    'menu_id' => $menu_id,
                    'title' => 'create_' . $slug,
                    'created_at' => date('Y-m-d H:i:s'),
                );
                $permission[] = $access;
                $access = array(
                    'menu_id' => $menu_id,
                    'title' => 'edit_' . $slug,
                    'created_at' => date('Y-m-d H:i:s'),
                );
                $permission[] = $access;
                $access = array(
                    'menu_id' => $menu_id,
                    'title' => 'delete_' . $slug,
                    'created_at' => date('Y-m-d H:i:s'),
                );
                $permission[] = $access;
                $access = array(
                    'menu_id' => $menu_id,
                    'title' => 'show_' . $slug,
                    'created_at' => date('Y-m-d H:i:s'),
                );
                $permission[] = $access;
            }
            Permission::insert($permission);
            $message = 'success_' . trans('cruds.insert_message');
            // }
        } else {
            $where[] = ['id', '<>', $update_id];
            $row = find("Menu", $where, "id", "asc", "first");
            /*  if (isset($row)) {
            $message = 'info_' . trans('cruds.exist_message');
            } else {*/
            $menu = Menu::find($update_id);
            $menu->update($input);
            $menu_id = $update_id;
            $permissions = Permission::where('menu_id', $menu_id)->get();
            $permission_types = ['access', 'create', 'edit', 'delete', 'show'];
            $access = 'access';
            $create = 'create';
            $edit = 'edit';
            $delete = 'delete';
            $show = 'show';
            foreach ($permissions as $key => $value) {
                $title = $value->title;
                if (Str::contains($title, $access)) {
                    $access = array(
                        'title' => 'access_' . $slug,
                        'updated_at' => date('Y-m-d H:i:s'),
                    );
                    $value->update($access);
                } elseif (Str::contains($title, $create)) {
                    $create = array(
                        'title' => 'create_' . $slug,
                        'updated_at' => date('Y-m-d H:i:s'),
                    );
                    $value->update($create);
                } elseif (Str::contains($title, $edit)) {
                    $edit = array(
                        'title' => 'edit_' . $slug,
                        'updated_at' => date('Y-m-d H:i:s'),
                    );
                    $value->update($edit);
                } elseif (Str::contains($title, $show)) {
                    $show = array(
                        'title' => 'show_' . $slug,
                        'updated_at' => date('Y-m-d H:i:s'),
                    );
                    $value->update($show);
                } elseif (Str::contains($title, $delete)) {
                    $delete = array(
                        'title' => 'delete_' . $slug,
                        'updated_at' => date('Y-m-d H:i:s'),
                    );
                    $value->update($delete);
                }
            }
            //return $permissions ;
            /*Permission::where('menu_id',$menu_id)->delete();
            $permission = array();
            if($menu_link == '#'){
            $access = array(
            'menu_id' => $menu_id,
            'title' => 'access_' . $slug,
            'created_at'=>date('Y-m-d H:i:s'),
            );
            $permission[] = $access;
            }else{
            $access = array(
            'menu_id' => $menu_id,
            'title' => 'access_' . $slug,
            'created_at'=>date('Y-m-d H:i:s'),
            );
            $permission[] = $access;
            $access = array(
            'menu_id' => $menu_id,
            'title' => 'create_' . $slug,
            'created_at'=>date('Y-m-d H:i:s'),
            );
            $permission[] = $access;
            $access = array(
            'menu_id' => $menu_id,
            'title' => 'edit_' . $slug,
            'created_at'=>date('Y-m-d H:i:s'),
            );
            $permission[] = $access;
            $access = array(
            'menu_id' => $menu_id,
            'title' => 'delete_' . $slug,
            'created_at'=>date('Y-m-d H:i:s'),
            );
            $permission[] = $access;
            $access = array(
            'menu_id' => $menu_id,
            'title' => 'show_' . $slug,
            'created_at'=>date('Y-m-d H:i:s'),
            );
            $permission[] = $access;
            }
            Permission::insert($permission);*/
            $message = 'success_' . trans('cruds.update_message');
            // }
        }
        return redirect()->back()->with("message", $message);
    }

    public function edit(Menu $menu)
    {
        // edit();

        return view('admin.menu.edit', compact('menu'));
    }

    public function update(MenuUpdateRequest $request, Menu $menu)
    {
        $menu->update($request->all());

        return redirect()->route('admin.menu.index');
    }

    public function show(Menu $menu)
    {
        // show();

        return view('admin.menu.show', compact('menu'));
    }

    public function destroy(Menu $menu)
    {
        // delete();

        $menu->delete();

        $message = 'danger_' . trans('cruds.delete_message');

        return back()->with('message', $message);
    }

    public function massDestroy(MenuMassDestroyRequest $request)
    {
        // delete();

        Menu::whereIn('id', request('ids'))->delete();

        //return response(null, Response::HTTP_NO_CONTENT);

        $message = 'danger_' . trans('cruds.delete_message');

        return back()->with('message', $message);
    }
}