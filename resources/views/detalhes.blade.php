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
                                <h6 class="mb-0">Detalhes do CEP:  {{$detalhes->cep}}</h6>
                            </div>
                            <div>

                            </div>
                        </div>
                        <div class="container" style="margin-top:20px; padding-bottom: 50px;">
                            <div class="j-center col-md-12">
                                <div class="row j-center" style="">
                                    <div class="col-md-2">
                                        <label class="form-label">UF:</label>
                                        <input type="text" class="form-control" value="{{$detalhes->uf}}" disabled>
                                    </div>
                                    <div class="col-md-10" style="">
                                        <label class="form-label">Cidade:</label>
                                        <input type="text" class="form-control" value="{{$detalhes->localidade}}" disabled>
                                    </div>
                                </div>
                                <div class="row j-center" style="margin-top:10px;">
                                    <div class="col-md-4" style="">
                                        <label class="form-label">Bairro:</label>
                                        <input type="text" class="form-control" value="{{$detalhes->bairro}}" disabled>
                                    </div>
                                    <div class="col-md-8" style="">
                                        <label class="form-label">Logradouro:</label>
                                        <input type="text" class="form-control" value="{{$detalhes->logradouro}}" disabled>
                                    </div>
                                </div>
                                <div class="row j-center" style="margin-top:10px;">
                                    <div class="col-md-12" style="">
                                        <label class="form-label">Complemento:</label>
                                        <input type="text" class="form-control" value="{{$detalhes->complemento}}" disabled>
                                    </div>
                                </div>
                                <div class="row j-center" style="margin-top:10px;">
                                    <div class="col-md-4" style="">
                                        <label class="form-label">DDD:</label>
                                        <input type="text" class="form-control" value="{{$detalhes->ddd}}" disabled>
                                    </div>
                                    <div class="col-md-4" style="">
                                        <label class="form-label">GIA:</label>
                                        <input type="text" class="form-control" value="{{$detalhes->gia}}" disabled>
                                    </div>
                                    <div class="col-md-4" style="">
                                        <label class="form-label">IBGE:</label>
                                        <input type="text" class="form-control" value="{{$detalhes->ibge}}" disabled>
                                    </div>
                                </div>
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