<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;
use Illuminate\Support\Collection; 
class Producto extends ResourceCollection
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request
     * @return array
     */
    public function toArray($request)
    {
        $arrayResponse=array(); 
        foreach ($this->collection as $key) {
            $arrayResponse[]=array('idproducto'=>$key->idproducto,
                                    'titulo' =>utf8_encode($key->titulo),
                                    'descripcion'=>utf8_encode($key->descripcion),
                                    'tags'=>utf8_encode($key->tags),
                                    );
        }
        $collectResponse=collect($arrayResponse);
        return [
            'data' => $collectResponse
        ];

    }
 
}
