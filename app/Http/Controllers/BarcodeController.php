<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use app\Product;

class BarcodeController extends Controller
{
    public function index()
    {

        $libros = libro::all(["nombre","precio"]);
        return view('barcode')->with('libros',$libros);


    }
}
