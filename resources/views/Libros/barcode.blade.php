
@extends('layouts.app')


@section('content')



    @foreach( $libros as $libro)
        <!-- {{--*/ @$libros = '"'.$libros->nombre.'"' /*--}} -->

        <div>
            {!! DNS1D::getBarcodeHTML($libro, "C128")!!}
        </div>
        <div style="padding-top: 50px;width: 24%;">
            {{ $libro->nombre }}
        </div>


    @endforeach





    <style>
        .code {
            height: 80px !important;
        }
    </style>








@endsection