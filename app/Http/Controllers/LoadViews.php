<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LoadViews extends Controller
{
   public function search(Request $request)
    {
    	return view('webservice.search');
    }
    public function stadistic(Request $request)
    {
     return view('webservice.stadistic');

    }

}
