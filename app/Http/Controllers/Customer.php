<?php

namespace App\Http\Controllers;

use App\Item;
use Illuminate\Http\Request;

use App\Http\Requests;
use Session;

class Customer extends Controller
{
    public function register()
    {
    	$data['meta_tag'] = array(
    		array('key' => 'name', 'name' => 'csrf-token', 'content' => csrf_token()),
    	);

        $data['css_top'] = array(
            array('href' => 'assets/css/main.css'),
        );

        $data['script_bottom'][] = array('src' => 'assets/js/customer/register.js');

        return view('register', $data);
    }

    public function login()
    {
        $data['meta_tag'] = array(
            array('key' => 'name', 'name' => 'csrf-token', 'content' => csrf_token()),
        );

        $data['css_top'] = array(
            array('href' => 'assets/css/main.css'),
        );

        if(Session::has('remember_me'))
        {
            $checked = 'checked';
        }

        $data['script_bottom'][] = array('src' => 'assets/js/customer/login.js');

        return view('login', $data);
    }

    public function logout()
    {
        if(Session::has('profile'))
        {
            Session::forget('profile');
        }

        return redirect('/');
    }
}
