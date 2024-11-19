<?php

namespace App\Models;
class OrdersList
{
    public function get_items():array
    {
        $items = array();
        $mysql = db();
        $query = "
            SELECT
                `order`.`id`,
                `client`.`name`,
                `client`.`surname`,
                `client`.`phone`,
                `client`.`email`,
                `order`.`items`,
                `order`.`total`,
                `order`.`isPaid`
            FROM
                `order`
            JOIN
                `client`
            ON
                `client`.`id` = `order`.`client_id`
                AND `client`.`publish` = 1
                AND `client`.`hidden` = 0
            WHERE
                `order`.`publish` = 1
                AND `order`.`hidden` = 0
        ";
        $result = $mysql->query($query);
        while ($row = $result->fetch_assoc())
        {
            $isPaid = 'unpaid';
            if($row['isPaid'])
            {
                $isPaid = 'paid';
            }

            $items[] = array(
                'id' => $row['id'],
                'name' => "$row[name] $row[surname]",
                'phone' => $row['phone'],
                'email' => $row['email'],
                'items' => $row['items'],
                'total' => round($row['total'], 2).' RUB.',
                'isPaid' => $isPaid,
            );
        }

        return $items;
    }
}
