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
        $cep = intval(str_replace(['-', '.'], '', $cep));        
        return $this->repository->consultaViaCep($this->api, $this->method, $cep);
    }

    public function cadastraViaCep(Request $r)
    {

        $r['cep'] = intval(str_replace(['-', '.'], '', $r['cep']));

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
}
