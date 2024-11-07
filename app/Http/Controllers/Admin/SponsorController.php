<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SponsorMassDestroyRequest;
use App\Http\Requests\SponsorStoreRequest;
use App\Http\Requests\SponsorUpdateRequest;
use App\Sponsor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class SponsorController extends Controller
{
    public function index()
    {
        access();

        $sponsors = Sponsor::whereIn('office_id', acl())->orderBy('id', 'desc')->get();

        return view('admin.sponsor.index', compact('sponsors'));
    }

    public function create()
    {
        create();

        $sponsors = Sponsor::all();

        return view('admin.sponsor.create', compact('sponsors'));
    }

    public function store(SponsorStoreRequest $request)
    {
        $input = $request->all();
        $nid_first_page = $request->file('nid_first_page');
        $nid_second_page = $request->file('nid_second_page');
        $profile_photo = $request->file('profile_photo');

        $sponsor_name = $input['sponsor_name'];
        $sponsor_name = slugify($sponsor_name, '_');
        $email = $input['email'];
        $update_id = $request->update_id;
        $upload_folder = public_path("uploads/$sponsor_name/");
        $upload_url = "/uploads/$sponsor_name/";
        $where = array();
        //$where[] = ['sponsor_name', '=', $sponsor_name];
        $where[] = ['email', '=', $email];
        if ($update_id == 0) {
            $row = find("Sponsor", $where, 'id', 'desc', 'first');
            if (isset($row)) {
                $message = 'info_' . trans('cruds.exist_message');
            } else {
                if (isset($nid_first_page)) {
                    $filename = $nid_first_page->getClientOriginalName();
                    $input['nid_first_page'] = $upload_url . $filename;
                    if (!File::isDirectory($upload_folder)) {
                        File::makeDirectory($upload_folder, 0777, true, true);
                    }
                    $nid_first_page->move($upload_folder, $filename);
                }
                if (isset($nid_second_page)) {
                    $filename = $nid_second_page->getClientOriginalName();
                    $input['nid_second_page'] = $upload_url . $filename;
                    if (!File::isDirectory($upload_folder)) {
                        File::makeDirectory($upload_folder, 0777, true, true);
                    }
                    $nid_second_page->move($upload_folder, $filename);
                }
                if (isset($profile_photo)) {
                    $filename = $profile_photo->getClientOriginalName();
                    $input['photo'] = $upload_url . $filename;
                    if (!File::isDirectory($upload_folder)) {
                        File::makeDirectory($upload_folder, 0777, true, true);
                    }
                    $profile_photo->move($upload_folder, $filename);
                }

                Sponsor::create($input);
                $message = 'success_' . trans('cruds.insert_message');
            }
        } else {
            $where[] = ['id', '<>', $update_id];
            $row = find("Sponsor", $where, 'id', 'desc', 'first');
            if (isset($row)) {
                $message = 'info_' . trans('cruds.exist_message');
            } else {
                $sponsor = Sponsor::find($update_id);
                if (isset($nid_first_page)) {
                    if (File::exists(public_path($sponsor->nid_first_page))) {
                        File::delete(public_path($sponsor->nid_first_page));
                    }
                    $filename = date('YmdHms_') . $nid_first_page->getClientOriginalName();
                    $input['nid_first_page'] = $upload_url . $filename;
                    if (!File::isDirectory($upload_folder)) {
                        File::makeDirectory($upload_folder, 0777, true, true);
                    }
                    $nid_first_page->move($upload_folder, $filename);
                }
                if (isset($nid_second_page)) {
                    if (File::exists(public_path($sponsor->nid_second_page))) {
                        File::delete(public_path($sponsor->nid_second_page));
                    }
                    $filename = date('YmdHms_') . $nid_second_page->getClientOriginalName();
                    $input['nid_second_page'] = $upload_url . $filename;
                    if (!File::isDirectory($upload_folder)) {
                        File::makeDirectory($upload_folder, 0777, true, true);
                    }
                    $nid_second_page->move($upload_folder, $filename);
                }
                if (isset($profile_photo)) {
                    if (File::exists(public_path($sponsor->profile_photo))) {
                        File::delete(public_path($sponsor->profile_photo));
                    }
                    $filename = date('YmdHms_') . $profile_photo->getClientOriginalName();
                    $input['photo'] = $upload_url . $filename;
                    if (!File::isDirectory($upload_folder)) {
                        File::makeDirectory($upload_folder, 0777, true, true);
                    }
                    $profile_photo->move($upload_folder, $filename);
                }

                $sponsor->update($input);
                $message = 'success_' . trans('cruds.update_message');
            }
        }
        return redirect()->route('admin.sponsor.index')->with("message", $message);
    }

    public function edit(Sponsor $sponsor)
    {
        edit();

        return view('admin.sponsor.create', compact('sponsor'));
    }

    public function update(SponsorUpdateRequest $request, Sponsor $sponsor)
    {
        $sponsor->update($request->all());

        return redirect()->route('admin.sponsor.index');
    }

    public function show(Sponsor $sponsor)
    {
        show();

        return view('admin.sponsor.show', compact('sponsor'));
    }

    public function destroy(Sponsor $sponsor)
    {
        delete();

        $sponsor->delete();

        $message = 'danger_' . trans('cruds.delete_message');

        return back()->with('message', $message);
    }

    public function massDestroy(SponsorMassDestroyRequest $request)
    {

        Sponsor::whereIn('id', request('ids'))->delete();

        //return response(null, Response::HTTP_NO_CONTENT);

        $message = 'danger_' . trans('cruds.delete_message');

        return back()->with('message', $message);
    }
}
