<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Exchange;

class ExchangeController extends Controller
{
    public function set(Request $request)
    {
    	$rate     = $request->tasa;
    	
    	if($rate){
			
			$exchange = new Exchange();
			$exchange->amount = $rate;
			$exchange->save();
			return response ()->json ( $exchange );
		
		}
    }

    public function get()
    {
    	
    	$tasa = DB::table('tasa_cambio')->get();
    	return response()->json($tasa);

    }
}
