<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Knp\Snappy\Pdf;

class PdfController extends Controller
{
    public function github (){
        //return \Barryvdh\Snappy\Facades\SnappyImage::loadFile('www.google.com.bo')->stream('github.pdf');
        $pdf = \Barryvdh\Snappy\Facades\SnappyPdf::loadView('auth.login');
        return $pdf->download('invoice.pdf');
    }
}
