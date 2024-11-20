<?php

namespace App\Models;

use MongoDB\BSON\PackedArray;

class Order
{
    protected int $id;
    protected int $client_id;

    public bool $exists = false;

    protected string $receiver;
    protected string|null $receiver_phone;
    protected string $items;
    protected float $total;
    protected int $isPaid;

    public function __construct($id = 0)
    {
        $this->id = $id;
        if($id)
        {
            $this->get_item_from_db();
        }
    }

    protected function get_item_from_db():void
    {
        $mysql = db();
        $query = "SELECT * FROM `order` WHERE `id` = '{$this->id}' AND `publish` = 1 AND `hidden` = 0";
        $result = $mysql->query($query);
        if($row = $result->fetch_assoc())
        {
            $this->exists = true;
            $this->client_id = $row['client_id'];
            $this->receiver = $row['receiver'];
            $this->receiver_phone = $row['receiver_phone'];
            $this->items = $row['items'];
            $this->total = $row['total'];
            $this->isPaid = $row['isPaid'];


        }
    }

    public function get_item():array
    {

        return array(
            'id' => $this->id,
            'receiver' => $this->receiver,
            'receiver_phone' => $this->receiver_phone,
            'items' => $this->items,
            'total' => round($this->total, 2),
            'isPaid' => $this->isPaid(),
            'isPaid_id' => $this->isPaid,

            'client_id' => $this->client_id,
            'client' => (new Client($this->client_id))->get_full_name(),
        );
    }

    protected function isPaid():string
    {
        if($this->isPaid)
        {
            return 'paid';
        }
        return 'unpaid';
    }

    public static function create():int
    {
        $client_id = $_REQUEST['id'];
        $total = $_REQUEST['total'];
        $name = $_REQUEST['name'];
        $phone = $_REQUEST['phone'];
        $items = $_REQUEST['items'];

        if($client_id > 0 && $total > 0 && $name != "" && $phone != "" && $items != "")
        {
            $mysql = db();
            $query = "INSERT INTO `order` (`client_id`, `items`, `total`, `isPaid`, `receiver`, `receiver_phone`)
            VALUES ('$client_id', '$items', '$total', '0', '$name', '$phone')";
            if($mysql->query($query))
            {
                return 1;
            }
        }

        return 0;
    }

    public static function order_set_value_text($id, $type, $value):int
    {
        $mysql = db();
        $query = "UPDATE `order` SET `$type` = '$value', `updated_at` = NOW() WHERE `id` = '$id'";
        if($mysql->query($query))
        {
            return 1;
        }
        return 0;
    }

}
