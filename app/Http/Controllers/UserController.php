<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules;
use App\Models\User;

class UserController extends Controller
{
    public function index() {
        return view('users.index', ['title' => 'Dashboard']);
    }

    public function show($username, $id) {
        $user = User::find($id);

        if($user->username != $username) {
            return abort(404);
        }

        return view('users.show', ['username' => $username, 'user' => $user]);
    }

    public function edit() {
        return view('users.edit', ['title' => 'Editar perfil']);
    }

    public function editPassword() {
        return view('users.editPassword', ['title' => 'Editar contraseña']);
    }

    public function update(Request $request) {
        $user = User::find(Auth::id());

        $request->validate([
            'usuario' => ['required', 'string', 'alpha_dash', 'min:4', 'max:25', 'unique:users,username,'.Auth::id()],
            'nombre' => ['nullable', 'string', 'min:4', 'max:50'],
            'apellido' => ['nullable', 'string', 'min:4', 'max:50'],
            'telefono' => ['nullable', 'digits_between:7,15'],
            'edad' => ['nullable', 'numeric']
        ]);

        $user->update([
            'username' => $request->usuario,
            'name' => $request->nombre,
            'surname' => $request->apellido,
            'phone' => $request->telefono,
            'age' => $request->edad
        ]);

        return to_route('users.dashboard')->with('status', "Su datos se han actualizado con exito");
    }

    public function updatePassword(Request $request) {
        $user = User::find(Auth::id());

        $request->validate([
            'password_old' => ['required', 'current_password'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()]
        ]);

        $user->password = bcrypt($request->password);
        $user->update();

        Auth::guard('web')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return to_route('home')->with('status', "Su contraseña se ha actualizado con exito");
    }
}
