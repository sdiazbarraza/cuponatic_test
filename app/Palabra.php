<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
class Palabra extends Model
{
	protected $table='palabras';
	protected $fillable = ['idpalabra', 'palabra'];
    protected $guarded =  ['idpalabra'];
    protected $primaryKey = 'idpalabra';
   
   public static function getIdWord($word){
      $word=DB::table("palabras")->where("palabra",$word)->first();
      if(is_null($word)){
      	return null;
      }
      return $word->idpalabra;		
   }
}
