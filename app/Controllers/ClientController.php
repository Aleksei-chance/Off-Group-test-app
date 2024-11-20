<?php

namespace App\Controllers;

use App\Models\Client;

class ClientController
{
    public function item_view($id)
    {
        $client = new Client($id, true);
        if($client->exists)
        {
            $arr = $client->get_item();
            return view('client', $arr);
        }
        return abort();
    }
}
