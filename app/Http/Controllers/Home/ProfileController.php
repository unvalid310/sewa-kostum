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
    // public function __construct()
    // {
    //     $this->middleware('permission:view profil', ['only' => ['index']]);
    // }

    public function index(Request $request) {
        $idUser = $request->session()->get('userId');
        $transaction = Transaction::where('id_user', $idUser)->orderby('id_transaction', 'desc')->get();
        $user = Authenticatable::where('id', $idUser)->first();

        if(Auth::user()->hasRole('admin')) {
            return redirect()->to('/dashboard');
        }
        else {
            return view('default.pages.profile')->with([
                'transaction' => $transaction,
                'user' => $user,
            ]);
        }
    }
}
