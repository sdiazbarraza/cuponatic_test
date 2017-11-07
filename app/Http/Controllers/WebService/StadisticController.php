<?php
namespace App\Http\Controllers\WebService;
use App\PalabraProducto;
use App\Http\Resources\PalabraProducto as PalabraProductoResource;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StadisticController extends Controller
{
	private $palabraModel;
	private $productoModel;
	private $palabraProductoModel;
	public function __construct(){
		$this->palabraProductoModel= new PalabraProducto;
	}

    
    public function get(Request $request)
    {
        $collectResult=$this->palabraProductoModel->getStadistic();
        return new PalabraProductoResource($collectResult);
        
    }

}
