<?php
namespace App\Controllers;
use App\Models\OrdersList;
use core\Request;
use Core\View;

class OrderController
{
    public function view()
    {
        return view('orders');
    }

    public function load()
    {
        return view('orders_table', ['items' => (new OrdersList())->get_items()], false);
    }

    public function item_view($id)
    {
    var_dump($id);
    }
}
