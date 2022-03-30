@include('templates/head');
@include('templates/menu');


<input type="hidden" value="{{route('consultaViaCep','')}}" id="consultaCepRoute">
<input type="hidden" value="{{route('cadastraViaCep')}}" id="cadastraCepRoute">
<!--CONTAINER -->
<div class="page-wrapper">
    <div class="page-content">
        <div class="row">
            <div class="col-12 col-lg-12">
                <div class="card radius-10">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div>
                                <h6 class="mb-0">Consultar CEP</h6>
                            </div>
                            <div>

                            </div>
                        </div>
                        <form id="formConsulta">
                            <div class="d-flex j-center">

                                <div class=" col-7">
                                    <input class="form-control mb-3" id="cepConsultaInput" name="cepConsultaInput" type="text" placeholder="00000-000" required>
                                </div>

                                <div class="col-2" style="margin-left: 10px;">
                                    <button type="button" id="consultaCepBtn" class="btn btn-primary px-5"><i class="bx bx-search-alt mr-1"></i>Pesquisar</button>
                                </div>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
        <div style="display:none" id="listEndereco" class="row">
            <div class="col-12 col-lg-12">
                <div class="card radius-10">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div style="padding-bottom:20px">
                                <h6 class="mb-0">Endereço Encontrado: </h6>
                            </div>
                        </div>
                        <div class="d-flex j-center">
                            <table class="table mb-0">
                                <thead>
                                    <tr>
                                        <th scope="col">UF</th>
                                        <th scope="col">DDD</th>
                                        <th scope="col">Cidade</th>
                                        <th scope="col">Bairro</th>
                                        <th scope="col">Logradouro</th>
                                    </tr>
                                </thead>
                                <tbody id="tbCidade">
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="cad-btn">
                        <a type="button" id="cadastrarEndereco" class="btn btn-info px-5"><i class="bx bx-save mr-1"></i>Cadastrar Endereço</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<!--CONTAINER -->

@include('templates/footer');


<script src="assets/js/consulta.js"></script>