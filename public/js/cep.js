$(document).ready(function(){
    const consultarCep = (cep) =>{
        if(cep){
            $.ajax({
            url: `https://viacep.com.br/ws/${cep}/json/unicode/`,
            dataType: 'json',
            success: function(response){
                console.log(response);
                let logradouro = `${response.logradouro}, ${response.bairro}, ${response.localidade} - ${resposta.uf}`
                $("#numero").focus();
                $("#logradouro").val(logradouro)
                console.log(logradouro)
            }
        });
        }

    }

    $("#cep").on("change", function(){
        let cep = $(this).val()
        consultarCep(cep)
    })

    $("#cep").trigger("change");
})