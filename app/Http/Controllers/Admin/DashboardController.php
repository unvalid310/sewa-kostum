<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Products;
use App\Models\Transaction;
use App\Models\ReturnTransaction;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;

class DashboardController extends Controller
{
    use AuthorizesRequests;
    use DispatchesJobs;
    use ValidatesRequests;
    use HasRoles;

    public function index() {
        $product = Products::get();
        $transaction = Transaction::get();
        $new = Transaction::getAll(['transaction.status' => '1']);
        $payment = Transaction::where('status', '2')->get();
        $return = ReturnTransaction::get();

        if(Auth::user()->hasRole('customer'))
            return redirect()->to('/');

        return view('admin.pages.dashboard.admin_dashboard')->with([
            'products' => $product,
            'transaction' => $transaction,
            'payment' => $payment,
            'return' => $return,
            'new_order' => $new,
        ]);
    }
}
