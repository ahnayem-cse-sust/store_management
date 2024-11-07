<?php

namespace App\Http\Controllers\Admin;

use App\Company;
use App\Http\Controllers\Controller;
use App\Http\Requests\CompanyMassDestroyRequest;
use App\Http\Requests\CompanyStoreRequest;
use App\Http\Requests\CompanyUpdateRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class CompanyController extends Controller
{
    public function index()
    {
        access();

        $companys = Company::all();
        $company = Company::where('id', 1)->first();

        return view('admin.company.index', compact('companys', 'company'));
    }

    public function create()
    {
        create();

        return view('admin.company.create');
    }

    public function store(CompanyStoreRequest $request)
    {
        $input = $request->all();
        $photo = $request->file('company_logo');
        $upload_folder = public_path('assets/images/logo/');
        $upload_url = '/assets/images/logo/';
        $update_id = $request->update_id;
        if ($update_id == 0) {
            Company::create($input);
            $message = 'success_' . trans('cruds.insert_message');
        } else {
            if (isset($photo)) {
                $filename = 'logo.png'; // $photo->getClientOriginalName();
                $input['company_logo'] = $upload_url . $filename;
                if (!File::isDirectory($upload_folder)) {
                    File::makeDirectory($upload_folder, 0777, true, true);
                }
                $photo->move($upload_folder, $filename);
            }
            $company = Company::find($update_id);
            $company->update($input);
            $message = 'success_' . trans('cruds.update_message');

        }
        return redirect()->route('admin.company.index')->with("message", $message);
    }

    public function edit(Company $company)
    {
        edit();

        return view('admin.company.edit', compact('company'));
    }

    public function update(CompanyUpdateRequest $request, Company $company)
    {
        $company->update($request->all());

        return redirect()->route('admin.company.index');
    }

    public function show(Company $company)
    {
        show();

        return view('admin.company.show', compact('company'));
    }

    public function destroy(Company $company)
    {
        delete();

        $company->delete();

        $message = 'danger_' . trans('cruds.delete_message');

        return back()->with('message', $message);
    }

    public function massDestroy(CompanyMassDestroyRequest $request)
    {
        delete();

        Company::whereIn('id', request('ids'))->delete();

        //return response(null, Response::HTTP_NO_CONTENT);

        $message = 'danger_' . trans('cruds.delete_message');

        return back()->with('message', $message);
    }
}