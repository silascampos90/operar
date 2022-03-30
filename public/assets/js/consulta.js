// var return_first;
// var dataInicioDefault = $("#dataInicioDefault").val();
// var dataFimDefault = $("#dataFimDefault").val();
// var assessoresPreCadastro = [];
// var assessorSelecionadoText = '';

$(document).ready(function () {


    // $.ajax({
    //     url: $("#plenarioAtualRota").val(),
    //     method: "get",
    //     dataType: "json",
    //     data: {
    //         ano: new Date().getFullYear()
    //     },
    //     success: data => {
    //         $(data).each(i => {
    //             $('#dataInicio').val(data[0].dataInicio);
    //             $('#dataFim').val(data[0].dataFim);
    //         });
    //     },
    // });
    // //updateSuplentes();

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
            if(res.status == 200){                
                showToaster('success', 'Sucesso', res.msg)
                addTableResult(res.data);
                $('#listEndereco').show();
            }else if(res.status == 400){
                showToaster('error', 'Erro', res.msg)
                $('#listEndereco').hide();
            }  

        });
    }
});


function addTableResult(dados){

    $('#trCidade').remove();
    $('#tbCidade').append(`<tr id="trCidade">
            <th>${dados.uf}</th>
            <td>${dados.ddd}</td>
            <td>${dados.localidade}</td>
            <td>${dados.bairro}</td>
            <td>${dados.logradouro}</td>
        </tr>`);
}
function clearTableResult(){

    $('#tbCidade').append(``);
}




