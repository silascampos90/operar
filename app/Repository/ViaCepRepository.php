<?php

namespace App\Repository;

use Illuminate\Support\Facades\Http;

class ViaCepRepository
{


    public function consultaViaCep($api, $method, $cep)
    {      
        $response = Http::get($api.$cep.$method);  

        return response()->json([
            'status'=> $response->status(),
            'sucesso' => $response->successful(),
            'msg' => $response->successful() == true ? 'sucesso' : 'Falha',
            'data' => $response->successful() == true ? $response->json() : ''
        ]);
    }
}
