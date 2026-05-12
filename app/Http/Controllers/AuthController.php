<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use App\Models\Role;
use App\Models\District;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('auth.login');
    }

    public function login(LoginRequest $request)
    {

        $user = User::with('role')->where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            return back()->withErrors(['email' => 'Identifiants incorrects.']);
        }

        Auth::login($user);
        return redirect($this->redirectByRole($user->role?->nom));
    }

    public function showRegister()
    {
        $roles = Role::all();
        $districts = District::all();
        return view('auth.register', compact('roles', 'districts'));
    }

    public function register(RegisterRequest $request)
    {

        $user = User::create([
            'nom'         => $request->nom,
            'prenom'      => $request->prenom,
            'email'       => $request->email,
            'password'    => Hash::make($request->password),
            'cin'         => $request->cin,
            'role_id'     => $request->role_id,
            'district_id' => $request->district_id,
        ]);

        Auth::login($user);
        return redirect($this->redirectByRole($user->role?->nom));
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }

    private function redirectByRole(?string $role): string
    {
        return match($role) {
            'citoyen'           => route('citizen.dashboard'),
            'architecte'        => route('architect.dashboard'),
            'agent_urbanisme'   => route('agent.dashboard'),
            'service_technique' => route('technical.dashboard'),
            'administrateur'    => route('admin.dashboard'),
            default             => route('login'),
        };
    }
}