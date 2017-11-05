<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
class PalabraProducto extends Model
{
	protected $table='palabra_producto';
	protected $fillable = ['idproducto', 'idpalabra'];
	protected $guarded = ['idpalabraproducto'];
	protected $primaryKey = 'idpalabraproducto';

	public static function getStadistic(){
		$subTable=DB::table('palabra_producto')
					->select("idproducto",DB::raw('count(idproducto) as cant'))
					->groupBy("idproducto")
					->orderBy("cant","desc")
					->limit(20);
		$stadistic=DB::table('palabra_producto as pp')
					->select("pps.*","pa.palabra","pr.titulo","pr.descripcion","pr.tags")
					->join(DB::raw("({$subTable->toSql()}) as pps"), 'pp.idproducto', '=', 'pps.idproducto')
					->join("palabras as pa","pa.idpalabra","=","pp.idpalabra")
					->join("productos as pr","pr.idproducto","=","pp.idproducto")
					->orderBy("pps.cant","desc")
					->get();
		return $stadistic;  			
	
	}
}
