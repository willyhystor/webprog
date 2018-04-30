<?php

namespace App\Http\Controllers\Rest;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Helpers\CustomerHelper;

use Request;
use Session;

class Login extends Controller
{
    function login()
    {
        $post = Request::all();

        $id = CustomerHelper::check_email($post['customer_email']);

        if($id == '0')
        {
            $data['status'] = '0';
            $data['message'] = 'Email tidak ditemukan';
        }
        else
        {
            $profile = CustomerHelper::get_profile($post);
            // print_r($profile); die;
            if($profile == '0')
            {
                $data['status'] = '0';
                $data['message'] = 'Email atau password salah';
            }
            else
            {
                Session::put('profile', $profile);
                // print_r(Session::all());

                if(isset($post['remember_me']) && $post['remember_me'] == 'on')
                {
                    Session::put('remember_me', $post);
                }
                else
                {
                    if(Session::has('remember_me'))
                    {
                        Session::forget('remember_me');
                    }
                }

                $data['status'] = '1';
            }
        }

        echo response()->json($data)->getContent();
    }
}
