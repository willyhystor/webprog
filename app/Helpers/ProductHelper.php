<?php

namespace App\Helpers;
use App\Products;
use App\Categories;

use Illuminate\Support\Facades\DB;

class ProductHelper 
{   
    public static function insert_product($post)
    {
        $table = new Products;
        
        $table->category_id = $post['cake_category'];
        $table->product_name = $post['cake_name'];
        $table->product_price = $post['cake_price'];
        $table->product_description = $post['cake_description'];
        $table->product_picture = $post['cake_picture'];
        
        $table->save();
        
        return $table->id;
    }

    public static function get_all_product()
    {
        $field = array('product_id', 'product_name', 'product_description', 'product_price', 'product_picture', 'category_id');
        $result = Products::select($field)->paginate(15);
        // $result = $result->get()->toArray();

        return $result;
    }

    public static function get_cake($id)
    {
        $field = array('product_id', 'product_name', 'product_description', 'product_price', 'product_picture', 'category_id');
        $result = Products::select($field);
        $result->where('products.product_id', '=', $id);

        $result = $result->get()->toArray();
        return $result;
    }

    public static function update_product($post)
    {
        Products::where('product_id', '=', $post['cake_id'])->update([
            'product_name' => $post['cake_name'],
            'product_description' => $post['cake_description'],
            'product_price' => $post['cake_price'],
            'category_id' => $post['cake_category'],
        ]);

        if(isset($post['cake_picture']) && $post['cake_picture'] != '')
        {
            Products::where('product_id', '=', $post['cake_id'])->update([
                'product_picture' => $post['cake_picture'],
            ]);
        }
    }

    public static function delete_product($id)
    {
        Products::where('product_id', '=', $id)->delete();
    }

    public static function get_all_categories()
    {
        $field = array('category_id', 'category_name', 'category_flavor', 'category_origin');
        $result = Categories::select($field);

        $result = $result->get()->toArray();
        return $result;
    }
}
