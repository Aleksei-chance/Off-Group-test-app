<?php
namespace App\Controllers;
class OrderController
{
    public function view()
    {
        return view('orders', ['id' => 1, 'items' => array()]);
    }
}
