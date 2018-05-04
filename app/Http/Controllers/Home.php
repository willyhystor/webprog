<?php

namespace App\Http\Controllers;

use App\Item;
use Illuminate\Http\Request;

use App\Helpers\ProductHelper;

use App\Http\Requests;
use Session;

class Home extends Controller
{
    public function home()
    {
        $data['css_top'] = array(array('href' => 'assets/css/main.css'), ); $data['script_bottom'][] = array('src' => 'assets/js/test.js'); $data['cakes'] = ProductHelper::get_all_product(); return view('home', $data); 
    }
}
