<?php
namespace App\Http\Controllers;
use App\Libro;
use App\User;
use App\Unitario;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Redirect;
//use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\View;
//use Barryvdh\DomPDF\PDF;
//use Barryvdh\DomPDF;
use Validator;
use Illuminate\Support\Facades\File;
use App\Categoria;
use Illuminate\Support\Facades\Storage;

use Barryvdh\DomPDF\PDF;
use Barryvdh\DomPDF;
class LibroController extends Controller
{
    public function createLibrounidad(){
      $cat = Categoria::all();
      return view('Libro.createunidad', compact('cat'));
    }
    public function createLibropeso(){
      $cat = Categoria::all();
      return view('Libro.createpeso', compact('cat'));
    }
    public function createLibrovolumen(){
      $cat = Categoria::all();
      return view('Libro.createvolumen', compact('cat'));
    }public function createLibro(){
      $cat = Categoria::all();
      return view('Libro.create', compact('cat'));
    }

    
    public function saveLibro(Request $request){
      $libro = new Libro();
      //subida Miniatura
      $image = $request->file('mini');
      if($image)
      {
        $image_path = time().$image->getClientOriginalName();
        \Storage::disk('images')->put($image_path, \File::get($image));
        $libro->image = $image_path;
      }
      $libro->id_categoria = $request->categoria;
      $libro->nombre = $request->tittle;
      $libro->descripcion = $request->description;
      $libro->id_proveedor = $request->proveedor;
      $libro->autor = $request->autor;
      $libro->precio = $request->precio;
      $libro->stock = $request->stock;
      $libro->save();
      return Redirect::back()->with(['success' => ' ']);
    }
    public function getImage($filename){
      $file = \Storage::disk('images')->get($filename);
      return \Response($file, 200);
    }
    public function getDescription($id){
      $l = Libro::find($id);
      $categorias = Categoria::get();
      return view('Libro.detalle', compact('l', 'categorias'));
    }
    public function vendidos(){
      $libros = Unitario::join('libros as l', 'unitarios.id_libro', 'l.id')
                  ->paginate();
      $categorias = Categoria::get();
      return view('Libro/vendidos', compact('libros', 'categorias'));
    }
    public function orden(Request $request) {
      $id = $request->_id;
      $number = $request->cant;
      $categorias = Categoria::get();
      $l = Libro::find($id);
      return view('ordenCompra', compact('l', 'number', 'categorias'));
    }
    public function crearOrden(Request $request){ 
      //$docentes = Instituto::get();
      $id = $request->_id;
      $number = $request->_n;
      $l = Libro::find($id);
      $view =  \View::make('reporteCompra', compact('l', 'number'))->render();
      $pdf = \App::make('dompdf.wrapper'); //Note: in 0.6.x this will be 'dompdf.wrapper'
      $pdf->loadHTML($view)->setPaper('letter');
      $carbon = new Carbon();
      return $pdf->download('Reporte_Docentes_'.$carbon->now(new \DateTimeZone('America/La_Paz'))->toDateTimeString().'.pdf');
    }
    public function viewCarro(){

      $categorias = Categoria::get();
      return view('carrito' , compact('categorias'));
    }
    public function reporte($id){
      if($id == 1){
        
        $libros = Unitario::whereDate('unitarios.created_at', Carbon::today()->toDateString())
                    ->join('libros', 'libros.id', 'id_libro')
                    ->get();            
        $view =  \View::make('reportes/reporte1', compact('libros'))->render();
        $pdf = \App::make('dompdf.wrapper'); //Note: in 0.6.x this will be 'dompdf.wrapper'
        $pdf->loadHTML($view)->setPaper('letter');
        $carbon = new Carbon();
        return $pdf->download('Reporte_Diario_'.$carbon->now(new \DateTimeZone('America/La_Paz'))->toDateTimeString().'.pdf');
      }
      elseif($id == 2)
      {
        $libros = Unitario::whereMonth('unitarios.created_at', '06')
                    ->join('libros', 'libros.id', 'id_libro')
                    ->get();            
        $view =  \View::make('reportes/reporte2', compact('libros'))->render();
        $pdf = \App::make('dompdf.wrapper'); //Note: in 0.6.x this will be 'dompdf.wrapper'
        $pdf->loadHTML($view)->setPaper('letter');
        $carbon = new Carbon();
        return $pdf->download('Reporte_Mensual_'.$carbon->now(new \DateTimeZone('America/La_Paz'))->toDateTimeString().'.pdf');
      }
      elseif($id == 3)
      {
        $libros = Unitario::whereYear('unitarios.created_at', '2018')
                ->join('libros', 'libros.id', 'id_libro')
                ->get();            
        $view =  \View::make('reportes/reporte3', compact('libros'))->render();
        $pdf = \App::make('dompdf.wrapper'); //Note: in 0.6.x this will be 'dompdf.wrapper'
        $pdf->loadHTML($view)->setPaper('letter');
        $carbon = new Carbon();
        return $pdf->download('Reporte_Anual_'.$carbon->now(new \DateTimeZone('America/La_Paz'))->toDateTimeString().'.pdf');
      }
    }
    public function reporte1(){ 
      $libros = Unitario::whereDate('unitarios.created_at', Carbon::today()->toDateString())
                ->join('libros', 'libros.id', 'id_libro')
                ->get();
      $view =  \View::make('reportes/reporte1', compact('libros'))->render();
      $pdf = \App::make('dompdf.wrapper'); //Note: in 0.6.x this will be 'dompdf.wrapper'
      $pdf->loadHTML($view)->setPaper('letter');
      $carbon = new Carbon();
      return $pdf->download('Reporte_Diario_'.$carbon->now(new \DateTimeZone('America/La_Paz'))->toDateTimeString().'.pdf');
    }
    public function reporte2(Request $request){ 
      $id = $request->_id;
      $number = $request->_n;
      $l = Libro::find($id);
      $view =  \View::make('reporteCompra', compact('l', 'number'))->render();
      $pdf = \App::make('dompdf.wrapper'); //Note: in 0.6.x this will be 'dompdf.wrapper'
      $pdf->loadHTML($view)->setPaper('letter');
      $carbon = new Carbon();
      return $pdf->download('Reporte_Mensual_'.$carbon->now(new \DateTimeZone('America/La_Paz'))->toDateTimeString().'.pdf');
    }
    public function reporte3(Request $request){ 
      $id = $request->_id;
      $number = $request->_n;
      $l = Libro::find($id);
      $view =  \View::make('reporteCompra', compact('l', 'number'))->render();
      $pdf = \App::make('dompdf.wrapper'); //Note: in 0.6.x this will be 'dompdf.wrapper'
      $pdf->loadHTML($view)->setPaper('letter');
      $carbon = new Carbon();
      return $pdf->download('Reporte_Anual_'.$carbon->now(new \DateTimeZone('America/La_Paz'))->toDateTimeString().'.pdf');
    }
    public function getViewReporte(){
      return view('reportes/index');
    }
    public function addStorage($id)
    {
      
    }
    public function reporteFecha($desde, $hasta){
        $libros = Unitario::whereDate('unitarios.created_at', '>', $desde)
            ->whereDate('unitarios.created_at', '<', $hasta)
            ->join('libros', 'libros.id', 'id_libro')
            ->get();
        $view =  \View::make('reportes/reporte1', compact('libros'))->render();
        $pdf = \App::make('dompdf.wrapper'); //Note: in 0.6.x this will be 'dompdf.wrapper'
        $pdf->loadHTML($view)->setPaper('letter');
        $carbon = new Carbon();
        return $pdf->download('Reporte_Diario_'.$carbon->now(new \DateTimeZone('America/La_Paz'))->toDateTimeString().'.pdf');
    }
}
