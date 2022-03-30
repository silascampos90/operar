<?php

namespace App\Repository;

use Illuminate\Support\Facades\Http;
use App\Models\Viacep\Endereco;

class ViaCepRepository
{


    public function consultaViaCep($api, $method, $cep)
    {
        $response = Http::get($api . $cep . $method);
       
        if ($response->status() == 200) {
            if (!isset($response->json()['cep'])) {
                return response()->json([
                    'status' => $response->status(),
                    'sucesso' => false,
                    'msg' => 'CEP não encontrado',
                    'data' => ''
                ]);
            }else {
                return response()->json([
                    'status' => $response->status(),
                    'sucesso' => $response->successful(),
                    'msg' => 'CEP Encontrado',
                    'data' => $response->json()
                ]);
            }
        }else {
            return response()->json([
                'status' => $response->status(),
                'sucesso' => false,
                'msg' => 'Erro ao realizar pesquisa.',
                'data' => ''
            ]);
        }
    }

    public function cadastraViaCep($r)
    {
        try {            

            Endereco::create($r->all());

            return response()->json([
                'sucesso' => true,
                'msg' => 'CEP Cadastrado com sucesso',
            ]);
            
        } catch (\Throwable $th) {
            if ($th->getCode() === '23000') {
                return response()->json([
                    'sucesso' => false,
                    'msg' => 'Cep Já cadastrado.',
                ]);
            }else {
                return response()->json([
                    'sucesso' => false,
                    'msg' => 'Erro ao Cadastrar.',
                ]);

            }
        }
    }


    public function listar(){
        try {
            
            return Endereco::all();

        } catch (\Throwable $th) {
            return response()->json([
                'sucesso' => false,
                'msg' => 'Erro ao pesquisar endereços.',
            ]);
        }
    }

    public function detalhaCep($cep){
        try {
            
            return Endereco::where('cep',$cep)->first();

        } catch (\Throwable $th) {
            return response()->json([
                'sucesso' => false,
                'msg' => 'Erro ao pesquisar endereços.',
            ]);
        }
    }
}
