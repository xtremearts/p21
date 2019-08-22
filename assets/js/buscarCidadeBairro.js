$(document).ready(function () {
    $('#id_cidade').change(function () {
    	var valorCidade = $(this).val();
        var url = "<?php  base_url() ?>index.php/cidadesebairros/gerarJsonCidadesEBairros/" + valorCidade;

        $.ajax({
            url: url,
            type: "GET",
            dataType: 'json',
            success: function (data) {
                var options = '<option>Escolha o Bairro</option>';

                for (var i = 0; i < data.length; i++) {
                    options += '<option value="' + data[i].id + '">' + data[i].nome_bairro + '</option>';
                }
                $('#id_bairro').html(options).show();
            },
        });
    });
});