<?php

namespace App\Http\Controllers;

use App\Item;
use Illuminate\Http\Request;

use App\Http\Requests;
use Session;

class homeController extends Controller
{
    public function home()
    {
        $data['css_top'] = array(
            array('href' => 'assets/css/main.css'),
        );

        $data['script_bottom'][] = array('src' => 'assets/js/test.js');

        return view('home', $data);
    }
}
