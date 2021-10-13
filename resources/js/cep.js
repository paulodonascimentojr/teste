
<script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script type="text/javascript">
    $("#cep").focusout(function(){
        $.ajax({
            url: 'https://viacep.com.br/ws/'+$(this).val()+'/json/unicode/',
            dataType: 'json',
            success: function(resposta){
                $("#logradouro").val(resposta.logradouro+', '+resposta.bairro+', '+resposta.localidade+'-'+resposta.uf);
                $("#numero").focus();
            }
        });
    });
</script>