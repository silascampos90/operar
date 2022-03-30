@include('templates/head');
@include('templates/menu');


<input type="hidden" value="{{route('consultaViaCep','')}}" id="consultaCepRoute">
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
                                    <input class="form-control mb-3" id="cepConsultaInput" type="number" placeholder="00000-000" required>
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
    </div>
</div>


<!--CONTAINER -->

@include('templates/footer');


<script src="assets/js/consulta.js"></script>