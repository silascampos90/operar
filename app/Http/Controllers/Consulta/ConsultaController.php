<?php

namespace App\Http\Controllers\Consulta;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\ConsultaRequest;
use Illuminate\Http\Request;

use App\Repository\ConsultaRepository;

class ConsultaController extends Controller
{

    private $api = "https://viacep.com.br/ws/";
    private $method = "/json/";
    private $repository;


    public function __construct(ConsultaRepository $repository)
    {

        $this->repository = $repository;
       
    }

    public function consultar()
    {
        return view('consulta');
    }


    public function consultaViaCep(Request $r, $cep)
    {       

        
        $r->request->add(['cep' => $cep]);
        
        $validator = Validator::make(
            $r->all(),
            (new ConsultaRequest)->rules(),
            (new ConsultaRequest)->messages()
        );
        
        if ($validator->fails()) {

                return response()->json([
                    'sucesso' => false,
                    'msg' => $validator->getMessageBag()->all()
                ]);
        } 

       return $this->repository->consultaViaCep($this->api, $this->method, $cep);
        
        
    }
}
