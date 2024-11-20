<?php

namespace App\Models;

class Client
{
    protected int $id;

    public bool $exists = false;

    protected string $name;
    protected string $surname;
    protected string $email;
    protected string|null $phone;
    protected array $items = array();
    protected array $total = array();
    public function __construct(int $id, bool $load_items = false)
    {
        $this->id = $id;
        if($id)
        {
            $this->get_item_from_db();
            if($load_items)
            {
                $orders = new OrdersList($id);
                $this->items = $orders->getItems();
                $this->total = $orders->getTotal();
            }
        }
    }

    protected function get_item_from_db():void
    {
        $mysql = db();
        $query = "SELECT * FROM `client` WHERE `id` = '{$this->id}' AND `publish` = 1 AND `hidden` = 0";
        $result = $mysql->query($query);
        if($row = $result->fetch_assoc())
        {
            $this->exists = true;
            $this->name = $row['name'];
            $this->surname = $row['surname'];
            $this->email = $row['email'];
            $this->phone = $row['phone'];
        }
    }

    public function get_item():array
    {

        return array(
            'id' => $this->id,
            'name' => $this->get_full_name(),
            'email' => $this->email,
            'phone' => $this->phone,
            'items' => $this->items,
            'total' => $this->total,
        );
    }

    public function get_full_name():string
    {
        return "{$this->surname} {$this->name}";
    }
}
