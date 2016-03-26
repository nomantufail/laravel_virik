<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\Requests\App\VirklogisticsRequest;
use App\Http\Responses\Responses\WebResponse;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class AppsController extends WebController
{
    public $response = null;
    public function __construct(WebResponse $webResponse)
    {
        $this->response = $webResponse;
    }

    public function virklogistics(VirklogisticsRequest $request){
        return $this->response->setView('layouts.index')->respond($request->all());
    }


}
