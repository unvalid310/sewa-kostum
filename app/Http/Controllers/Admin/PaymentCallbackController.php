<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\Midtrans\CallbackService;
use App\Models\Transaction;

class PaymentCallbackController extends Controller
{
    //
    public function receive() {
        $callback = new CallbackService;

        if ($callback->isSignatureKeyVerified()) {
            $notification = $callback->getNotification();
            $order = $callback->getOrder();

            if ($callback->isSuccess()) {
                $now = $notification->transaction_time;
                $date = str_replace('-', '/', $now);
                Transaction::where('id_transaction', $order->id_transaction)->update([
                    'status' => 2,
                    'payment_date' => $notification->transaction_time,
                    'return_date' => date('Y-m-d h:i:s',strtotime($date . "+".$order->length_rent." days")),
                ]);
            }

            if ($callback->isExpire()) {
                Order::where('id_transaction', $order->id)->update([
                    'status' => 3,
                ]);
            }

            if ($callback->isCancelled()) {
                Order::where('id_transaction', $order->id)->update([
                    'status' => 4,
                ]);
            }

            return response()
                ->json([
                    'success' => true,
                    'message' => 'Notification successfully processed',
                ]);
        } else {
            return response()
                ->json([
                    'error' => true,
                    'message' => 'Signature key not verified',
                ], 403);
        }
    }
}
