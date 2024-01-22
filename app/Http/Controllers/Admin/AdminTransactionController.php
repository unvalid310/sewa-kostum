<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Transaction;
use App\Models\DetailTransaction;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;

class AdminTransactionController extends Controller
{
    use AuthorizesRequests;
    use DispatchesJobs;
    use ValidatesRequests;
    use HasRoles;
    //
    public function index() {
        $transaction = Transaction::getAll();

        if(Auth::user()->hasRole('customer'))
            return redirect()->to('/');
        return view('admin.pages.transaksi.admin_daftar_transaksi')->with(['transactions' => $transaction]);
    }

    public function get($idTransaction) {
        $transaction = Transaction::getAll(['transaction.id_transaction' => $idTransaction]);
        $detailTransaction = DetailTransaction::where('id_transaction', $idTransaction)->get();
        foreach ($transaction as $key => $value);

        if(Auth::user()->hasRole('customer'))
            return redirect()->to('/');
        return view('admin.pages.transaksi.admin_invoice')->with(['transaction' => $value, 'detail_transactions' => $detailTransaction]);
    }
}
