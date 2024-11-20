<?php
namespace App\Controllers;
use App\Models\Order;
use App\Models\OrdersList;

class OrderController
{
    public function view()
    {
        return view('orders');
    }

    public function load()
    {
        return view('orders_table', ['items' => (new OrdersList(0))->getItems()], false);
    }

    public function item_view($id)
    {
        $order = new Order($id);
        if($order->exists)
        {
            return view('order', $order->get_item());
        }
        return abort();
    }

    public function add_order_modal()
    {
        return view('add_order', ['clients' => OrdersList::Get_All_Clients()], false);
    }

    public function add_order()
    {
        return Order::create();
    }

    public function order_set_value_text()
    {
        return Order::order_set_value_text($_REQUEST['id'], $_REQUEST['type'], $_REQUEST['value']);
    }
}
