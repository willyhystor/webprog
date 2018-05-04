<?php

namespace App\Http\Controllers\Rest;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Helpers\ProductHelper;

use Request;
use Session;

class Admin extends Controller
{
    function insert_cake()
    {
        $post = Request::all(); $file = Request::file('cake_picture'); $file_name = date('YmdHis').'_'.$file->getClientOriginalName(); $file->move('../public/assets/images/cake_picture', $file_name); $post['cake_picture'] = $file_name; $insert = ProductHelper::insert_product($post); if(!empty($insert)) {$data['status'] = '1'; } echo response()->json($data)->getContent(); 
    }

    function update_cake()
    {
        $post = Request::all(); if(isset($post['cake_picture'])) {$file = Request::file('cake_picture'); $file_name = date('YmdHis').'_'.$file->getClientOriginalName(); $file->move('../public/assets/images/cake_picture', $file_name); $post['cake_picture'] = $file_name; } $update = ProductHelper::update_product($post); $data['status'] = '1'; echo response()->json($data)->getContent(); 
    }
}
