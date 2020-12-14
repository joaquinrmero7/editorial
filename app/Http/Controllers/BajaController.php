<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\BajaUsuario;
use App\Http\Requests;
class BajaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bajas = BajaUsuario::paginate();
        return view('Bajas.index', compact('bajas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $u = BajaUsuario::find($id);
        $baja = new User();
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
        $message = 'Se Restauro al Usuario de nuestros registros';
        return $message;
    }
}
