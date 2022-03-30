@include('templates/head');
@include('templates/menu');

<!--CONTAINER -->
<div class="page-wrapper">
    <div class="page-content">
        <div class="row">
            <div class="col-12 col-lg-12">
                <div class="card radius-10">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div>
                                <h6 class="mb-0">Lista de Endereços Cadastrados</h6>
                            </div>
                            <div>

                            </div>
                        </div>
                        <div class="d-flex j-center">
                            <div class="card-body">
                                <table class="table mb-0">
                                    <thead>
                                        <tr>
                                            <th scope="col">UF</th>
                                            <th scope="col">DDD</th>
                                            <th scope="col">Cidade</th>
                                            <th scope="col">Bairro</th>
                                            <th scope="col">Logradouro</th>
                                            <th scope="col"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($enderecos as $e)
                                        <tr>
                                            <th>{{$e->uf}}</th>
                                            <td>{{$e->ddd}}</td>
                                            <td>{{$e->localidade}}</td>
                                            <td>{{$e->bairro}}</td>
                                            <td>{{$e->logradouro}}</td>
                                            <td>
                                                <a type="button" href="detalhes/{{$e->cep}}" target="" class="btn btn-sm btn-warning"><i class="bx bx-detail mr-1"></i>Detalhar</a>
                                            </td>
                                        </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                            </div>


                        </div>

                    </div>

                </div>
            </div>
        </div>

    </div>
</div>


<!--CONTAINER -->

@include('templates/footer');


<script src="assets/js/listar.js"></script>