<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Input;

class TestController extends BaseController {

    public function Index() {

        return view('test/test');
    }

    public function From() {
        return view('test/from');
    }

    public function Post() {
        $data = Input::all();
        print_r($data);
        die;
    }

}
