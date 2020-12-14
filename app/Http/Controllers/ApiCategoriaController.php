<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Categoria;
use App\Libro;


use Auth;
use Illuminate\Support\Facades\Redirect;
class ApiCategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categorias = Categoria::paginate();
		return view('Categorias/index', compact('categorias'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Categorias/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cat = new Categoria();
        $cat->nombre = $request->tittle;
        $cat->descripcion = $request->description;
        $cat->save();
        return Redirect::back()->with(['success' => ' ']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $libros= Libro::where('id_categoria', $id)
                ->get();
        $categorias = Categoria::get();
        $key = 1;
        return view('Libro.listado', compact('libros', 'categorias', 'key'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categoria = Categoria::find($id);
		return view('Categorias/modificar', compact('categoria'));
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
        $user = Categoria::find($id);
		$user->nombre = $request->tittle;
		$user->descripcion = $request->description;
		$user->save();
		return redirect('panel');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $flight = Categoria::find($id);
        $flight->delete();
        $message = 'Se Elimino la Categoria de nuestros registros';
        return $message;
    }
}
