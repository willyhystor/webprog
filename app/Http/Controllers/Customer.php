<?php

namespace App\Http\Controllers;

use App\Item;
use Illuminate\Http\Request;

use App\Helpers\CustomerHelper;

use App\Http\Requests;
use Session;
use URL;

class Customer extends Controller
{
    public function register()
    {
    	$data['meta_tag'] = array(array('key' => 'name', 'name' => 'csrf-token', 'content' => csrf_token()), ); $data['css_top'] = array(array('href' => 'assets/css/main.css'), ); $data['script_bottom'][] = array('src' => 'assets/js/customer/register.js'); return view('customer.register', $data); }

    public function login()
    {
        $data['meta_tag'] = array(array('key' => 'name', 'name' => 'csrf-token', 'content' => csrf_token()), ); $data['css_top'] = array(array('href' => 'assets/css/main.css'), ); if(Session::has('remember_me')) {$profile = Session::get('remember_me'); $data['checked'] = 'checked'; $data['email'] = $profile['customer_email']; $data['password'] = $profile['customer_password']; } $data['script_bottom'][] = array('src' => 'assets/js/customer/login.js'); return view('customer.login', $data); }

    public function logout()
    {
        if(Session::has('profile'))
        {
            Session::forget('profile');
        }
        else
        {
            Session::forget('admin');
        }

        return redirect('/');
    }

    public function profile()
    {
        if(Session::has('profile'))
        {
            $data['profile'] = Session::get('profile'); $data['meta_tag'] = array(array('key' => 'name', 'name' => 'csrf-token', 'content' => csrf_token()), ); $data['css_top'] = array(array('href' => 'assets/css/main.css'), ); $data['script_bottom'][] = array('src' => 'assets/js/customer/profile.js'); return view('customer.profile', $data); }
        else
        {
            return redirect(URL::to('/login'));
        }
    }
}
