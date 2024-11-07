<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyUserRequest;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Office;
use App\Role;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Symfony\Component\HttpFoundation\Response;

class UsersController extends Controller
{
    public function index()
    {
        access();

        $users = User::orderBy('id', 'desc')->get();

        $roles = Role::where('id', '!=', 1)->pluck('title', 'id');

        return view('admin.users.index', compact('users', 'roles'));
    }

    public function create()
    {
        create();

        $users = User::all();

        $roles = Role::all()->pluck('title', 'id');

        return view('admin.users.create', compact('roles', 'users'));
    }

    public function store(StoreUserRequest $request)
    {
        $input = $request->all();
        $name = $input['name'];
        $name = slugify($name, '_');
        $input['acl'] = implode(',', $input['acl']);
        $roles = $request->input('roles', []);
        $role_id = $roles[0];
        $email = $input['email'];
        $input['human_password'] = $input['password'];
        $input['role_id'] = $role_id;
        $update_id = $request->update_id;
        $signature = $request->file('signature');
        $profile_photo = $request->file('profile_photo');

        $where = array();
        $where[] = ['email', '=', $email];
        if ($update_id == 0) {
            $row = findById("users", $where);
            if (isset($row)) {
                $message = 'info_' . trans('cruds.insert_message');
            } else {
                $upload_folder = public_path("uploads/$name/");
                $upload_url = "/uploads/$name/";
                if (isset($signature)) {
                    $filename = $signature->getClientOriginalName();
                    $input['signature'] = $upload_url . $filename;
                    if (!File::isDirectory($upload_folder)) {
                        File::makeDirectory($upload_folder, 0777, true, true);
                    }
                    $signature->move($upload_folder, $filename);
                }

                $upload_folder = public_path("uploads/$name/");
                $upload_url = "/uploads/$name/";
                if (isset($profile_photo)) {
                    $filename = $profile_photo->getClientOriginalName();
                    $input['photo'] = $upload_url . $filename;
                    if (!File::isDirectory($upload_folder)) {
                        File::makeDirectory($upload_folder, 0777, true, true);
                    }
                    $profile_photo->move($upload_folder, $filename);
                }

                $user = User::create($input);
                $message = 'success_' . trans('cruds.insert_message');
                $user->roles()->sync($roles);
            }
        } else {
            $where[] = ['id', '<>', $update_id];
            $row = findById("users", $where);
            if (isset($row)) {
                $message = 'info_' . trans('cruds.exist_message');
            } else {
                $user = User::find($update_id);

                $upload_folder = public_path("uploads/$name/");
                $upload_url = "/uploads/$name/";
                if (isset($signature)) {
                    if (File::exists(public_path($user->signature))) {
                        File::delete(public_path($user->signature));
                    }
                    $filename = date('YmdHms_') . $signature->getClientOriginalName();
                    $input['signature'] = $upload_url . $filename;
                    if (!File::isDirectory($upload_folder)) {
                        File::makeDirectory($upload_folder, 0777, true, true);
                    }
                    $signature->move($upload_folder, $filename);
                }
                $upload_folder = public_path("uploads/$name/");
                $upload_url = "/uploads/$name/";
                if (isset($profile_photo)) {
                    if (File::exists(public_path($user->profile_photo))) {
                        File::delete(public_path($user->profile_photo));
                    }
                    $filename = date('YmdHms_') . $profile_photo->getClientOriginalName();
                    $input['photo'] = $upload_url . $filename;
                    if (!File::isDirectory($upload_folder)) {
                        File::makeDirectory($upload_folder, 0777, true, true);
                    }
                    $profile_photo->move($upload_folder, $filename);
                }
                $user = User::find($update_id);
                $user->update($input);
                $message = 'success_' . trans('cruds.update_message');
                $user->roles()->sync($roles);
            }
        }

        return redirect()->route('admin.users.index');
    }

    public function edit(User $user)
    {
        edit();

        $roles = Role::all()->pluck('title', 'id');

        $user->load('roles');

        $user->acl_country = explode(',', $user->acl_country);
        $user->acl = explode(',', $user->acl);
        return view('admin.users.create', compact('roles', 'user'));
    }

    public function update(UpdateUserRequest $request, User $user)
    {
        $user->update($request->all());
        $user->roles()->sync($request->input('roles', []));

        return redirect()->route('admin.users.index');
    }

    public function show(User $user)
    {
        show();

        $user->load('roles');

        return view('admin.users.show', compact('user'));
    }

    public function destroy(User $user)
    {
        delete();

        $user->delete();

        return back();
    }

    public function massDestroy(MassDestroyUserRequest $request)
    {
        delete();

        User::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
    public function get_acl_office()
    {
        $acl_country = request()->acl_country;
        $offices = Office::whereIn('country_id', $acl_country)->get();
        return response()->json($offices);
    }
}
