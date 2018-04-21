<?php

namespace App\Http\Controllers\Rest;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Request;

class Register extends Controller
{
    function regis()
    {
        $post = Request::all();

        print_r($post); die;
    }
}
