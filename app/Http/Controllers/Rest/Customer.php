<?php

namespace App\Http\Controllers\Rest;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Helpers\CustomerHelper;

use Request;
use Session;

class Customer extends Controller
{
    function login()
    {
        $post = Request::all(); $id = CustomerHelper::check_email($post['customer_email']); if($id == '0') {$data['status'] = '0'; $data['message'] = 'Email tidak ditemukan'; } else {$profile = CustomerHelper::get_profile($post); if($profile == '0') {$data['status'] = '0'; $data['message'] = 'Email atau password salah'; } else {if($profile[0]['customer_type'] == '2') {Session::put('profile', $profile); } else {Session::put('admin', $profile); } Session::forget('remember_me'); if(isset($post['remember_me']) && $post['remember_me'] == 'on') {Session::put('remember_me', $post); } $data['status'] = '1'; } } echo response()->json($data)->getContent(); 
    }

    function regis()
    {
        $post = Request::all(); $file = Request::file('customer_picture'); $file_name = date('YmdHis').'_'.$file->getClientOriginalName(); $file->move('../public/assets/images/profile_picture', $file_name); $post['customer_picture'] = $file_name; $insert = CustomerHelper::insert_member($post); if(!empty($insert)) {$data['status'] = '1'; } echo response()->json($data)->getContent(); 
    }

    function update_profile()
    {
        $post = Request::all(); $current_profile = Session::get('profile'); $email = $current_profile[0]['customer_email']; if(isset($post['customer_picture'])) {$file = Request::file('customer_picture'); $file_name = date('YmdHis').'_'.$file->getClientOriginalName(); $file->move('../public/assets/images/profile_picture', $file_name); $post['customer_picture'] = $file_name; } CustomerHelper::update_profile($email, $post); $login['customer_email'] = $post['customer_email']; $login['customer_password'] = $post['customer_password']; if($post['customer_password'] == '') {$password = CustomerHelper::get_password($post['customer_email']); $login['customer_password'] = $password[0]; } $new_profile = CustomerHelper::get_profile($login); Session::forget('profile'); Session::put('profile', $new_profile); if(Session::has('remember_me')) {Session::forget('remember_me'); Session::put('remember_me', $login); } $data['status'] = '1'; echo response()->json($data)->getContent(); 
    }
}
