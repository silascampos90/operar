$(document).ready(function () {
    $("#cepConsultaInput").mask('00000-000', { reverse: true });
});

$( "input" ).focus(function() {
    $('.error').removeClass('error');
    $('#cepConsultaInput-error').hide();
});

function validarFormulario(form) {
    return $(`#${form}`).valid();
}

$('#consultaCepBtn').click(function (e) {
    e.preventDefault();

    if (validarFormulario('cepConsultaInput')) {
        var cep = $('#cepConsultaInput').val();
        $.ajax({
            method: 'get',
            url: $('#consultaCepRoute').val() + '/' + cep,
        }).fail(function (res) {

            showToaster('error', 'Erro', res.msg)

        }).done(function (res) {
           
            if(res.sucesso == true){                
                showToaster('success', 'Sucesso', res.msg)
                updateDados(res.data);
                addTableResult(res.data);
                $('#listEndereco').show();
            }else{
                showToaster('error', 'Erro', res.msg)
                $('#listEndereco').hide();
            }  

        });
    }
});


function addTableResult(dados){

    $('#trCidade').remove();
    $('#tbCidade').append(`<tr id="trCidade">
            <th id="dadoUF">${dados.uf}</th>
            <td>${dados.ddd}</td>
            <td id="dadoCidade">${dados.localidade}</td>
            <td>${dados.bairro}</td>
            <td>${dados.logradouro}</td>
        </tr>`);
}
function clearTableResult(){

    $('#tbCidade').append(``);
}


const endereco = {
    cep: null,
    logradouro: null,
    complemento: null,
    bairro: null,
    localidade: null,
    uf: null,
    ibge: null,
    gia: null,
    ddd: null,
    siafi: null
}

function updateDados(dados){
    endereco.cep = dados.cep;
    endereco.logradouro = dados.logradouro;
    endereco.complemento = dados.complemento;
    endereco.bairro = dados.bairro;
    endereco.localidade = dados.localidade;
    endereco.uf = dados.uf;
    endereco.ibge = dados.ibge;
    endereco.gia = dados.gia;
    endereco.ddd = dados.ddd;
    endereco.siafi = dados.siafi;
}


$('#cadastrarEndereco').click(function (e) {
    
    e.preventDefault();        
        
        $.ajax({
            method: 'post',
            url: $('#cadastraCepRoute').val(),
            data : endereco
        }).fail(function (res) {
            showToaster('error', 'Erro', res.msg)
        }).done(function (res) {
            $('#listEndereco').hide();
            if(res.sucesso == true){                
                showToaster('success', 'Sucesso', res.msg)
                addTableResult(res.data);
            }else{
                showToaster('error', 'Erro', res.msg)
            }  


        });

        $('#listEndereco').hide();
    
});





