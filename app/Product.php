<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table= 'libros';
   protected $primarykey = 'id';
   public $timestamps = false;

   protected  $fillable= [
      'id','nombre', 'precio'
   ];


   public function mark()
   {
      // hasmany - tiene muchas
      return $this->hasmany(Mark::class);
   }
}
