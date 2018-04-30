<?php

namespace App\Helpers;
use App\Customers;

use Illuminate\Support\Facades\DB;

class CustomerHelper 
{   
    public static function insert_member($post)
    {
        $table = new Customers;
        
        $table->customer_name = $post['customer_name'];
        $table->customer_email = $post['customer_email'];
        $table->customer_phone = $post['customer_phone'];
        $table->customer_password = $post['customer_password'];
        $table->customer_gender = $post['customer_gender'];
        $table->customer_address = $post['customer_address'];
        $table->customer_picture = $post['customer_picture'];
        $table->customer_status = '1';
        
        $table->save();
        
        return $table->id;
    }

    public static function check_email($email)
    {
        $field = array('customer_id');
        $result = Customers::select($field);
        $result->where('customers.customer_email', '=', $email);
        $result->where('customers.customer_status', '=', '1');

        $result = $result->get()->toArray();

        if(count($result)>0)
        {
            return $result;
        }
        else
        {
            return '0';
        }
    }

    public static function get_profile($post)
    {
        $field = array('customer_name', 'customer_email', 'customer_phone', 'customer_gender', 'customer_address', 'customer_picture');
        $result = Customers::select($field);
        $result->where('customers.customer_email', '=', $post['customer_email']);
        $result->where('customers.customer_password', '=', $post['customer_password']);

        $result = $result->get()->toArray();

        if(count($result)>0)
        {
            return $result;
        }
        else
        {
            return '0';
        }
    }
}
