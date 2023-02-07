<?php

namespace App\Services\Midtrans;

use Midtrans\Snap;
use App\Models\Order;

class CreateSnapTokenService extends Midtrans
{
    protected $order;
    public function __construct($order)
    {
        parent::__construct($order);

        $this->order = $order;
    }

    public function getSnapToken()
    {
        $ords = Order::all();
        // dd($ord);
        foreach ($ords as $ord) {
            $params = [
                'transaction_details' => [
                    'order_id' => $ord->order_number,
                    'gross_amount' => intVal($ord->total_amount),
                ],
                'customer_details' => [
                    'first_name' => $ord->first_name,
                    'email' => $ord->email,
                    'phone' => $ord->phone,
                ]
            ];

            $snapToken = Snap::getSnapToken($params);

            return $snapToken;
        }

    }
}
