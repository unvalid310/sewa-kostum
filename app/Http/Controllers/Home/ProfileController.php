<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Http\Request;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;
use App\Models\Transaction;

class ProfileController extends Controller
{
    use AuthorizesRequests;
    use DispatchesJobs;
    use ValidatesRequests;
    use HasRoles;
    //
    public function __construct()
    {
        $this->middleware('permission:view profil', ['only' => ['index']]);
    }

    public function index(Request $request) {
        $idUser = $request->session()->get('userId');
        $transaction = Transaction::where('id_user', $idUser)->simplePaginate(10);

        return view('default.pages.profile')->with([
            'transaction' => $transaction,
        ]);
    }
}
