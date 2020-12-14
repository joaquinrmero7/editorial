<?php
namespace App\Http\Controllers;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use App\BajaUsuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class UserController extends Controller
{
    public function index()
    {
        $users = User::paginate();
        return view('Admin.ModificarU', compact('users'));
    }
    public function save()
    {
    }
    public function create($kardex, $email)
    {
    }
    public function store()
    {
    }
    public function show($id)
    {
        //
    }
    public function edit($id)
    {
        //
    }
    public function update($id)
    {
    }
    public function destroy($id)
    {
        $u = User::find($id);
        $baja = new BajaUsuario();
        $baja->name = $u->name;
        $baja->lastname = $u->lastname;
        $baja->mlastname = $u->mlastname;
        $baja->country = $u->country;
        $baja->departamento = $u->departamento;
        $baja->ci = $u->ci;
        $baja->email = $u->email;
        $baja->password = $u->password;
        $baja->role = $u->role;
        $baja->save();
        $u->delete();
        $message = 'Se Elimino al Usuario de nuestros registros';
        return $message;
    }
}
