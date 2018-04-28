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

        //upload profile picture
        $file = Request::file('customer_picture');
        $file_name = date('YmdHis').'_'.$file->getClientOriginalName();
        $file->move('../public/assets/images/profile_picture', $file_name);

        // print_r($post['customer_picture']); die;
        print_r('$test'); die;
    }
}
