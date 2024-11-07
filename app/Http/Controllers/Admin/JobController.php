<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\JobMassDestroyRequest;
use App\Http\Requests\JobStoreRequest;
use App\Http\Requests\JobUpdateRequest;
use App\Job;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class JobController extends Controller
{
    public function index()
    {
        access();

        $jobs = Job::all();

        return view('admin.jobs.index', compact('jobs'));
    }

    public function create()
    {
        create();
        return view('admin.jobs.create');
    }

    public function store(JobStoreRequest $request)
    {
        $input = $request->all();
        $update_id = $input['update_id'];
        $job_name = $input['job_name'];
        $where = array();
        $where[] = ['job_name', '=', $job_name];
        if ($update_id == 0) {
            $row = findById("jobs", $where);
            if (isset($row)) {
                $message = 'info_' . trans('cruds.insert_message');
            } else {
                $job = Job::create($input);
                $message = 'success_' . trans('cruds.insert_message');
            }
        } else {
            $where[] = ['id', '<>', $update_id];
            $row = findById("jobs", $where);
            if (isset($row)) {
                $message = 'info_' . trans('cruds.exist_message');
            } else {
                $job = Job::find($update_id);
                $job->update($input);
                $message = 'success_' . trans('cruds.update_message');
            }
        }
        return redirect()->route('admin.job.index');
    }

    public function edit(Job $job)
    {
        edit();

        return view('admin.jobs.create', compact('job'));
    }

    public function update(JobUpdateRequest $request, Job $job)
    {
        $job->update($request->all());
        return redirect()->route('admin.jobs.index');
    }

    public function show(Job $job)
    {
        show();

        return view('admin.jobs.show', compact('job'));
    }

    public function destroy(Job $job)
    {
        delete();

        $job->delete();

        return back();
    }

    public function massDestroy(JobMassDestroyRequest $request)
    {
        delete();

        Job::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
