<?php

namespace App\Services\Midtrans;

use Midtrans\Snap;
use App\Models\User;
use App\Models\PaymentMethod;

class CreateSnapTokenService extends Midtrans
{
    protected $transaction;
    protected $detailTransaction;

    public function __construct($transaction, $detailTransaction)
    {
        parent::__construct();

        $this->transaction = $transaction;
        $this->detailTransaction = $detailTransaction;
    }

    public function getSnapToken()
    {
        $index = 1;
        $detail_transaction= [];
        $user = User::where('id', $this->transaction->id_user)->first();
        $customer = [
            'first_name' => $user->name,
            'email' => $user->email,
            'phone' => $user->no_hp,
        ];

        foreach ($this->detailTransaction as $key => $value) {
            # code..
            $detail_transaction[$key] = [
                'id' =>$index,
                'price' => intval($value->price),
                'quantity' => intval($value->qty),
                'name' => $value->name,
            ];
            $index++;
        }
        $detail_transaction[count($detail_transaction)] = [
            'id' => count($detail_transaction),
            'price' => 50000,
            'quantity' => 7,
            'name' =>'Denda',
        ];

        $params = [
            "payment_type" => "bank_transfer",
            'transaction_details' => [
                'order_id' => intval($this->transaction->invoice),
                'gross_amount' => intval($this->transaction->total),
            ],
            'customer_details' => $customer,
            'item_details' => $detail_transaction,
            "bank_transfer" => [
                [
                    'bank' => 'bri',
                    'va_number' => '70888345289878865',
                ],
                [
                    'bank' => 'bni',
                    'va_number' => '1000345289878865',
                ]
            ]
        ];

        $snapToken = Snap::getSnapToken($params);

        return $snapToken;
    }
}
