<?php

namespace App\Models\Viacep;

use Illuminate\Database\Eloquent\Model;

class Endereco extends Model
{
    protected $fillable = ['cep','logradouro','complemento','bairro','localidade','uf','ibge','gia','ddd','siafi'];
}
