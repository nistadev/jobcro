$(document).ready(function(){
    var aImportar = $("#textImportar"),
        botoImportar = $("#importa"),
        registreImportat = $("#registreImportat > table > tbody"),
        formulari = $("#form-import"),
        accions = $(".accions");

    botoImportar.click(function(){
        var text = aImportar.val();

        validaRegistre(text);
        $("#textImportar").val("");

        actualitzaAccions();
    });

    accions.on('click', '.registre-valid', function(){
        $(this).parent().parent().fadeOut(2000);
    });

    accions.on('click', '.registre-novalid', function(){
        $(this).parent().parent().remove();
    });

    function validaRegistre(text){
        registreImportat.show();
        registreImportat.append(`
        <tr>
            <td class="col-xs-12 col-sm-12 col-md-1 col-lg-1 camp-data"></td>
            <td class="col-xs-12 col-sm-12 col-md-1 col-lg-1 camp-hora_inicial"></td>
            <td class="col-xs-12 col-sm-12 col-md-1 col-lg-1 camp-hora_final"></td>
            <td class="col-xs-12 col-sm-12 col-md-1 col-lg-1 camp-temps_total"></td>
            <td class="col-xs-12 col-sm-12 col-md-1 col-lg-1 camp-client"></td>
            <td class="col-xs-12 col-sm-12 col-md-1 col-lg-1 camp-concepte"></td>
            <td class="col-xs-12 col-sm-12 col-md-3 col-lg-3 camp-descripcio">`+text+`</td>
            <td class="col-xs-12 col-sm-12 col-md-1 col-lg-1 accions">
                <span class="glyphicon glyphicon-ok registre-valid" title="Registre valid"></span>
                <span class="glyphicon glyphicon-remove registre-novalid" title="Registre invalid"></span>
            </td>
        </tr>
        `);
        aImportar.html("");
    }

    formulari.submit(function(e){
        e.preventDefault();

        $.ajax("accions.php", {
            action: 'POST',
            data: "hola",
            succes: function(resposta){
                escriuText(resposta);
            },
            error: function(resposta){
                escriuText(resposta);
            }
        });
    });

    function actualitzaAccions(){
        accions = $(".accions");
    }
});