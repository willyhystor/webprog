<?php

namespace App\Http\Controllers;

use App\Item;
use Illuminate\Http\Request;

use App\Helpers\ProductHelper;

use App\Http\Requests;
use Session;
use URL;

class Admin extends Controller
{
    public function insert_cake()
    {
        if(Session::has('admin'))
        {
            $data['meta_tag'] = array(array('key' => 'name', 'name' => 'csrf-token', 'content' => csrf_token()), ); $data['css_top'] = array(array('href' => 'assets/css/main.css'), ); $data['script_bottom'][] = array('src' => 'assets/js/admin/insert_cake.js'); return view('admin.insert_cake', $data); }
        else
        {
            return redirect(URL::to('/'));
        }
    }

    public function manage_cake($id = '')
    {
        if(Session::has('admin'))
        {
            $data['meta_tag'] = array(array('key' => 'name', 'name' => 'csrf-token', 'content' => csrf_token()), ); $data['css_top'] = array(array('href' => 'assets/css/main.css'), ); if($id == '') {$data['cakes'] = ProductHelper::get_all_product(); return view('admin.manage_cake_all', $data); } else {$data['cake'] = ProductHelper::get_cake($id); $data['script_bottom'][] = array('src' => 'assets/js/admin/manage_cake.js'); return view('admin.manage_cake', $data); } }
        else
        {
            return redirect(URL::to('/'));
        }
    }

    public function delete_cake($id)
    {
        if(Session::has('admin'))
        {
            ProductHelper::delete_product($id); return redirect(URL::to('/manage-cake')); }
        else
        {
            return redirect(URL::to('/'));
        }
    }

    public function manage_categories($id = '')
    {
        if(Session::has('admin'))
        {
            $data['meta_tag'] = array(array('key' => 'name', 'name' => 'csrf-token', 'content' => csrf_token()), ); $data['css_top'] = array(array('href' => 'assets/css/main.css'), ); if($id == '') {$data['categories'] = ProductHelper::get_all_categories(); return view('admin.manage_categories_all', $data); } else {return redirect(URL::to('/')); $data['cake'] = ProductHelper::get_cake($id); $data['script_bottom'][] = array('src' => 'assets/js/admin/manage_categories.js'); return view('admin.manage_categories', $data); } }
        else
        {
            return redirect(URL::to('/'));
        }
    }

    public function delete_categories()
    {
        return redirect(URL::to('/'));
    }
}
