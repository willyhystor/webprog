<?php

namespace App\Http\Controllers;

use App\Item;
use Illuminate\Http\Request;

use App\Http\Requests;

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

    public function view()
    {
        $items = Item::all();
        return view('test')->with('items', $items);
    }

    public function insert(Request $request)
    {
        $insert = new Item();
        $insert->name = $request['name'];
        $insert->price = $request['price'];
        $insert->save();

        $items = Item::all();
        return view('test')->with('items', $items);
    }

    public function update(Request $request)
    {
        $update = Item::find($request['id']);
        $update->name = $request['name'];
        $update->price = $request['price'];
        $update->save();

        $items = Item::all();
        return view('test')->with('items', $items);
    }

    public function delete($id)
    {
        $delete = Item::find($id);
        $delete->delete();

        $items = Item::all();
        return view('test')->with('items', $items);
    }
}
