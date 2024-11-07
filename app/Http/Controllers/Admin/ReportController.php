<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\PS;
use DB;

class ReportController extends Controller
{
    public function job_report()
    {
        access();

        return view('admin.report.job_report.index');
    }

    public function generate_job_report()
    {

        $job_id = request()->job_id;
        $date_from = request()->date_from;
        $date_to = request()->date_to;

        $where = [];
        if (!empty($job_id)) {
            $where[] = ['job_id', '=', $job_id];
        }

        if (!empty($date_from) && !empty($date_to)) {
            $where[] = ['ps_date', '>=', $date_from];
            $where[] = ['ps_date', '<=', $date_to];
        } elseif (!empty($date_from) && empty($date_to)) {
            $where[] = ['ps_date', '=', $date_from];
        } elseif (empty($date_from) && !empty($date_to)) {
            $where[] = ['ps_date', '=', $date_to];
        }

        $data['values'] = PS::where($where)->get()->groupBy(function ($param) {
            return $param->job_id;
        });

        $data['job_id'] = $job_id;
        $data['date_from'] = $date_from;
        $data['date_to'] = $date_to;

        return view('admin.report.job_report.index', $data);
    }
    public function requisition_report()
    {
        access();

        return view('admin.report.requisition_report.index');
    }

    public function generate_requisition_report()
    {

        $job_id = request()->job_id;
        $section_id = request()->section_id;
        $date_from = request()->date_from;
        $date_to = request()->date_to;
        $status = request()->status;

        $where = [];
        if (!empty($job_id)) {
            $where[] = ['job_id', '=', $job_id];
        }
        if (!empty($section_id)) {
            $where[] = ['section_id', '=', $section_id];
        }
        if (!empty($status)) {
            $where[] = ['status', '=', $status];
        }

        if (!empty($date_from) && !empty($date_to)) {
            $where[] = ['requisition_date', '>=', $date_from];
            $where[] = ['requisition_date', '<=', $date_to];
        } elseif (!empty($date_from) && empty($date_to)) {
            $where[] = ['requisition_date', '=', $date_from];
        } elseif (empty($date_from) && !empty($date_to)) {
            $where[] = ['requisition_date', '=', $date_to];
        }

        $data['requisitions'] = \App\Requisition::where($where)->get();

        $data['job_id'] = $job_id;
        $data['section_id'] = $section_id;
        $data['date_from'] = $date_from;
        $data['date_to'] = $date_to;
        $data['status'] = $status;

        return view('admin.report.requisition_report.index', $data);
    }
    public function card_status_report()
    {
        access();

        $cards = \App\TSItemIssue::select('card_id', 'card_code', 'name', 'epf_no')
            ->leftJoin('cards', 'cards.id', '=', 'tsitemissues.card_id')
            ->leftJoin('users', 'users.id', '=', 'cards.user_id')
            ->where('tsitemissues.status', 'Issued')
            ->groupBy('card_id')->get();

        return view('admin.report.card_status_report.index', compact('cards'));
    }

    public function generate_card_status_report()
    {

        $cards = \App\TSItemIssue::select('card_id', 'card_code', 'name', 'epf_no')
            ->leftJoin('cards', 'cards.id', '=', 'tsitemissues.card_id')
            ->leftJoin('users', 'users.id', '=', 'cards.user_id')
            ->where('tsitemissues.status', 'Issued')
            ->groupBy('card_id')->get();

        $card_id = request()->card_id;
        $item_id = request()->item_id;
        $where = [];
        $where[] = ['tsitemissues.status', '=', 'Issued'];
        if ($card_id) {
            $where[] = ['tsitemissues.card_id', '=', $card_id];
        }

        if ($item_id) {
            $where[] = ['tsitemissue_details.item_id', '=', $item_id];
        }

        $issueItems = \App\TSItemIssueDetails::select('tsitemissue_id', 'item_id',DB::raw("SUM(quantity) as issue_quantity"), 'card_id', 'card_code', 'name as employee_name', 'epf_no', 'item_name', 'item_code')
            ->leftJoin('tsitemissues', 'tsitemissue_details.tsitemissue_id', '=', 'tsitemissues.id')
            ->leftJoin('cards', 'cards.id', '=', 'tsitemissues.card_id')
            ->leftJoin('users', 'users.id', '=', 'cards.user_id')
            ->leftJoin('items', 'tsitemissue_details.item_id', '=', 'items.id')
            ->groupBy('card_id')
            ->groupBy('item_id')
            ->where($where)->get();
        $data['cards'] = $cards;
        $data['issueItems'] = $issueItems;
        $data['card_id'] = $card_id;
        $data['item_id'] = $item_id;
        return view('admin.report.card_status_report.index', $data);
        //return Redirect::route('admin.report.card_status_report.index')->with(['data' => $data]);
    }
}