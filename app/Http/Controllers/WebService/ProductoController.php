<?php

namespace App\Http\Controllers\WebService;
use App\Producto;
use App\Palabra;
use App\PalabraProducto;
use App\Http\Resources\Producto as ProductoResource;
use Illuminate\Http\Request;
use App\Http\Requests\SearchKeyword;
use App\Http\Controllers\Controller;

class ProductoController extends Controller
{
	private $palabraModel;
	private $productoModel;
	private $palabraProductoModel;
	public function __construct(){
		$this->palabraModel= new Palabra;
		$this->palabraProductoModel= new PalabraProducto;
		$this->productoModel= new Producto;
	}

    public function search(SearchKeyword $request)
    {
    	$input=$request->all();
        $textPost=strtolower($input["keyword"]);
    	$collectResult=$this->productoModel->searchProduct($textPost);
    	if($collectResult->count()>0){
    		$idWord=$this->palabraModel->getIdWord($textPost);
    		if(is_null($idWord)){
    			$this->palabraModel->palabra=$textPost;
    			$this->palabraModel->save();
    			$idPalabra=$this->palabraModel->idpalabra;
    		}else{
    			$idPalabra=$idWord;
    		}
    		foreach ($collectResult as $key){
    			$this->palabraProductoModel->create(['idproducto'=>$key->idproducto,
	    											 'idpalabra'=>$idPalabra]);
    		}
    	}
    	return new ProductoResource($collectResult);
    }
}
