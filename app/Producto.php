<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
class Producto extends Model
{
	protected $table='productos';
	protected $fillable = ['name', 'description'];
  protected $guarded = ['id'];
  protected $primaryKey = 'idproducto';
   
   public static function searchProduct($text){
   		$subQuery= DB::table("productos")
   				   ->selectRaw("idproducto,
   				   			    titulo,
   				   			    descripcion,
                      tags,
   				   			   LOWER(CONCAT_WS(titulo,descripcion,tags)) AS concatenated");
   		$producto=DB::table(DB::raw("({$subQuery->toSql()}) as PRODUCTOSUB"))
   				  ->select("PRODUCTOSUB.idproducto","PRODUCTOSUB.titulo","PRODUCTOSUB.descripcion","PRODUCTOSUB.tags")->where("PRODUCTOSUB.concatenated","like","%".$text."%")
   				  ->get();
   		 return $producto;
   }
   
}
