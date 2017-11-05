<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;
use Illuminate\Support\Collection; 
class PalabraProducto extends ResourceCollection
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
        $collectResponse=collect();
        $collectSort=$this->collection->sortBy('idproducto')->values();
        $arrayStadistic=array();
        $count=-1;
        foreach ($collectSort as $key) {
            if(isset($arrayStadistic[$count]) && $arrayStadistic[$count]['idproducto']===$key->idproducto){
               array_push($arrayStadistic[$count]['palabras'],$key->palabra);
               $arrayVal=$arrayStadistic[$count]['palabras'];
               $values=array_count_values($arrayVal);
               arsort($values);
               $top5word=array_slice(array_keys($values), 0, 5, true);
               $arrayStadistic[$count]['palabras']=$top5word;
            }else{
                  $arrayStadistic[]=array('idproducto'=>$key->idproducto,
                                    'titulo' =>utf8_encode($key->titulo),
                                    'palabras'=>array($key->palabra),
                                    'descripcion'=>utf8_encode($key->descripcion),
                                    'tags'=>utf8_encode($key->tags)
                                    );
                   $count++;
            }
        }

         $collectResponse=collect($arrayStadistic);
        return [
            'data' => $collectResponse
        ];
    }
    
 
}
