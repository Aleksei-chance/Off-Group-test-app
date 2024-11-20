<?php

namespace App\Models;
class OrdersList
{
    protected int $client_id;

    protected array $items = array();

    protected float $total;
    protected float $total_paid;
    protected float $total_unpaid;

    public function __construct($id)
    {
        $this->client_id = $id;
        $this->items = $this->get_items_from_db();
        $this->calc_total();
    }

    protected function calc_total():void
    {
        $sum = $paid = 0;
        foreach ($this->items as $item)
        {
            $sum += floatval($item['total']);
            if($item['isPaid_id'])
            {
                $paid += floatval($item['total']);
            }
        }
        $this->total = $sum;
        $this->total_paid = $paid;
        $this->total_unpaid = ($sum - $paid);
    }

    protected function get_items_from_db():array
    {
        $items = array();
        $AND = '';
        if($this->client_id)
        {
            $AND = " AND `client_id` = '{$this->client_id}' ";
        }
        $mysql = db();
        $query = "SELECT * FROM `order` WHERE 1=1 $AND AND `publish` = 1 AND `hidden` = 0";
        $result = $mysql->query($query);
        while ($row = $result->fetch_assoc())
        {

            $items[] = array(
                'id' => $row['id'],
                'receiver' => $row['receiver'],
                'receiver_phone' => $row['receiver_phone'],
                'items' => $row['items'],
                'total' => round($row['total'], 2).' RUB.',
                'isPaid_id' => $row['isPaid'],
                'isPaid' => $this->isPaid($row['isPaid']),
            );
        }

        return $items;
    }

    protected function isPaid(int $status):string
    {
        if($status)
        {
            return 'paid';
        }
        return 'unpaid';
    }

    public function getItems():array
    {
        return $this->items;
    }

    public function getTotal():array
    {
        return array(
            'sum' => number_format($this->total, 2),
            'paid' => number_format($this->total_paid, 2),
            'unpaid' => number_format($this->total_unpaid, 2),
        );
    }

    public static function Get_All_Clients():array
    {
        $items = array();
        $mysql = db();
        $query = "SELECT * FROM `client` WHERE `publish` = 1 AND `hidden` = 0";
        $result = $mysql->query($query);
        while ($row = $result->fetch_assoc())
        {
            $items[] = array(
                'id' => $row['id'],
                'name' => "$row[surname] $row[name]",
            );
        }
        return $items;
    }
}
