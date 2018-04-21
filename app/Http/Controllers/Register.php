<?php

namespace App\Http\Controllers;

use App\Item;
use Illuminate\Http\Request;

use App\Http\Requests;

class Register extends Controller
{
    public function register()
    {
        $data['css_top'] = array(
            array('href' => 'assets/css/main.css'),
        );

        $data['script_bottom'][] = array('src' => 'assets/js/register.js');

        return view('register', $data);
    }
}
