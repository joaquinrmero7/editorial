<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Unitario;
use App\User;
use App\Libro;
use App\Compra;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\View;

use Carbon\Carbon;
use Auth;
use Barryvdh\DomPDF\PDF;
use Barryvdh\DomPDF;
class CompraController extends Controller
{
    public function compra(Request $request){
        $compras = json_decode($request->jcompra);
        $plan = $request->plan;
        if($plan == 'no'){
            
            $v = new Compra();
            $v->status = 'Pendiente de Pago';
            $v->total = $request->jtotal;
            $v->id_user = Auth::user()->id;
            $v->save();
            $compra = Compra::orderBy('created_at', 'desc')->first();

            foreach($compras as $c){
                $u = new Unitario();
                $u->cantidad = $c->unidades;
                $u->total = $c->total;
                $u->id_compra = $compra->id;
                $u->id_libro = $c->id;
                $libro = Libro::find($c->id);
                $libro->stock = $libro->stock - $c->unidades;
                $libro->save();
                $u->save();
            }
        }
        $user = User::where('id', Auth::user()->id)
                ->get();
        $libros = Unitario::where('id_compra', $compra->id)
                    ->join('libros', 'libros.id', 'id_libro')
                    ->get();
        
        $view =  \View::make('reporteCompra', compact('user', 'libros'))->render();
        //$view =  \View::make('reporteCompra', compact('l', 'number'))->render();
        $pdf = \App::make('dompdf.wrapper'); //Note: in 0.6.x this will be 'dompdf.wrapper'
        $pdf->loadHTML($view)->setPaper('letter');
        $carbon = new Carbon();
        return $pdf->download('Factura_'.$carbon->now(new \DateTimeZone('America/La_Paz'))->toDateTimeString().'.pdf');
        Redirect::back()->with(['success' => ' ']);
    }
    public function reporte() {
        $view =  \View::make('reporteCompra')->render();
        //$view =  \View::make('reporteCompra', compact('l', 'number'))->render();
        $pdf = \App::make('dompdf.wrapper'); //Note: in 0.6.x this will be 'dompdf.wrapper'
        $pdf->loadHTML($view)->setPaper('letter');
        $carbon = new Carbon();
        return $pdf->download('Reporte_Docentes_'.$carbon->now(new \DateTimeZone('America/La_Paz'))->toDateTimeString().'.pdf');
    }
}
