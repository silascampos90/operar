<?php

namespace App\Repository;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
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

                Log::channel('operar')->error('CEP: '.$cep.' Não encontrado.');

            }else {

                Log::channel('operar')->info('CEP: '.$cep.' Encontrado.');

                return response()->json([
                    'status' => $response->status(),
                    'sucesso' => $response->successful(),
                    'msg' => 'CEP Encontrado',
                    'data' => $response->json()
                ]);
            }
        }else {

            Log::channel('operar')->error('ERROR: '.$response->status());

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

            Log::channel('operar')->info('CEP: '.$r->cep.' Cadastrado com sucesso.');
            
        } catch (\Throwable $th) {
            if ($th->getCode() === '23000') {

                Log::channel('operar')->error('CEP: '.$r->cep.' Já Cadastrao.');

                return response()->json([
                    'sucesso' => false,
                    'msg' => 'Cep Já cadastrado.',
                ]);
                
            }else {             

                Log::channel('operar')->error('CEP: '.$r->cep.' Erro ao cadastrar.');
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

    public function testeConsultaViaCEP($api, $method, $cep)
    {
        $response = Http::get($api . $cep . $method);

        if (!isset($response->json()['cep'])) {
            return response()->json([
                'code' => $response->status(),
                'sucesso' => false,
                'msg' => 'Erro ao pesquisar cep.',
            ]);
        }else{
            return response()->json([
                'code' => $response->status(),
                'sucesso' => true,
                'msg' => 'Cep Encontrado com Sucesso.',
            ]);

        }
    }
}
