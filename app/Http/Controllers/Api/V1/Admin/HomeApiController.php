<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Resources\Admin\LeadResource;
use App\Lead;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class HomeApiController extends Controller
{
    public function registration()
    {
        $input = request()->all();
        $lead = Lead::create($input);
        return (new LeadResource($lead))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }
}