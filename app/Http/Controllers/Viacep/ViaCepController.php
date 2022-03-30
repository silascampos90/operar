<?php

namespace App\Http\Controllers\Viacep;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\ViaCepRequest;
use Illuminate\Http\Request;

use App\Repository\ViaCepRepository;

class ViaCepController extends Controller
{

    private $api = "https://viacep.com.br/ws/";
    private $method = "/json/";
    private $repository;


    public function __construct(ViaCepRepository $repository)
    {

        $this->repository = $repository;
    }

    public function consultar()
    {
        return view('consulta');
    }


    public function consultaViaCep($cep)
    {
        $cep = str_replace(['-', '.'], '', $cep);        
        return $this->repository->consultaViaCep($this->api, $this->method, $cep);
    }

    public function listar(){             
        $enderecos =$this->repository->listar();
        return view('listar')->with(['enderecos'=>$enderecos]);
    }

    public function cadastraViaCep(Request $r)
    {

        $r['cep'] = str_replace(['-', '.'], '', $r['cep']);

        $validator = Validator::make(
            $r->all(),
            (new ViaCepRequest)->rules(),
            (new ViaCepRequest)->messages()
        );

        if ($validator->fails()) {
            return response()->json([
                'sucesso' => false,
                'msg' => $validator->getMessageBag()->all()
            ]);
        }        

        return $this->repository->cadastraViaCep($r);
    }

    public function detalhaCep($cep)
    {
        $detalhes = $this->repository->detalhaCep($cep);
        return view('detalhes')->with(['detalhes' => $detalhes]);
    }

    public function testeConsultaViaCEP($cep)
    {
        return $this->repository->testeConsultaViaCEP($this->api, $this->method, $cep);       
    }

    

    
}
