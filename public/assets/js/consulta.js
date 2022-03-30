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

            showToaster('success', 'Sucesso', res.msg)

        }).done(function (res) {
            showToaster('success', 'Sucesso', res.msg)
            //     if (res.sucesso == true) {
            //         showToaster('success', 'Sucesso', res.msg)
            //         $('#procuradorJustica').val(null).trigger('change');
            //         $('#isSuplentePresidente').bootstrapSwitch('state', false);
            //         $('#isSuplenteCorregedor').bootstrapSwitch('state', false);

            //     } else {
            //         res.msg.map(function ($dado) {
            //             showToaster('error', 'Erro', $dado);
            //         })
            //         $('#dataInicio').val('');
            //         $('#procuradorJustica').val(null).trigger('change');
            //         $('#isSuplentePresidente').bootstrapSwitch('state', false);
            //         $('#isSuplenteCorregedor').bootstrapSwitch('state', false);

            //     };
            // });

        });
    }
});




