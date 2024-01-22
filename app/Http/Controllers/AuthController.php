<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class AuthController extends Controller
{
    use HasRoles;

    public function auth() {
        return view('default.pages.login');
    }

    public function login(Request $request) {
        $credentials = $request->validate([
            'email' => ['required', 'email:dns'],
            'password' => ['required']
        ]);

        if (Auth::attempt($credentials)) {
            $data = User::where('email', $request->email)->first();
            $userData = [
                'userId' => $data['id'],
                'isLogin' => true,
                'name' => $data['name'],
                'email' => $data['email'],
                'ttl' => $data['ttl'],
                'no_hp' => $data['no_hp'],
                'count_cart' => count(Cart::getAll(['cart.id_user' => $data['id']]))
            ];

            $request->session()->regenerate();
            $request->session()->put($userData);

            if(Auth::user()->hasRole('customer')) {
                return redirect()->intended('/');
            } else {
                return redirect()->to('/dashboard');
            }
        }

        return back()->with('loginError', '<strong>Login gagal,</strong> periksa kembali email dan password anda!');
    }

    public function register(Request $request) {
        $name =  $request->name;
        $email =  $request->email;
        $no_hp =  $request->no_hp;
        $password =  $request->password;

        $data = User::where('email', $request->email)->first();

        if($data) {
            return back()->with('registerError', '<strong>Registrasi gagal,</strong> email sudah ada!');
        }

        $roles = Role::where('name', 'customer')->first();

        $user = User::factory()->create([
            "name" => $name,
            "email" => $email,
            "no_hp" => $no_hp,
            'password' => bcrypt($password)
        ]);

        $user->assignRole($roles);
        // \dd($user->hasRole($roles));

        return redirect()->intended('/auth');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();

        return redirect('/');
    }
}
