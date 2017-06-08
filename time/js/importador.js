$(document).ready(function(){
    var aImportar = $("#textImportar"),
        botoImportar = $("#importa"),
        registreImportat = $("#taula-registres > table > tbody"),
        formulari = $("#form-import"),
        accions = $(".accions"),
        accionsGeneral = $("#accionsGeneral"),
        fitxerJSON = $('#fitxer-json');

    botoImportar.click(function(){
        inputUsuari = aImportar.val();
        try{
            registres = JSON.parse(inputUsuari);
            pintaRegistrePerValidar(registres);
        } catch (error) {
            alert("Error al importar el registre, format no compatible.");
            console.log(error);
        }
        $("#textImportar").val("");
        actualitzaAccions();
        document.getElementById('fitxer-json').value = "";
    });

    function pintaRegistrePerValidar(reg){
        registreImportat.show();
        for(var i = 0; i < reg.length; i++){
            registreImportat.append(`
            <tr>
                <td class="col-xs-12 col-sm-12 col-md-1 col-lg-1 camp-data">`+reg[i].data+`</td>
                <td class="col-xs-12 col-sm-12 col-md-1 col-lg-1 camp-hora_inicial">`+reg[i].hora_inici+`</td>
                <td class="col-xs-12 col-sm-12 col-md-1 col-lg-1 camp-hora_final">`+reg[i].hora_fi+`</td>
                <td class="col-xs-12 col-sm-12 col-md-1 col-lg-1 camp-temps_total">`+reg[i].temps_total+`</td>
                <td class="col-xs-12 col-sm-12 col-md-1 col-lg-1 camp-client">`+reg[i].client+`</td>
                <td class="col-xs-12 col-sm-12 col-md-1 col-lg-1 camp-concepte">`+reg[i].concepte+`</td>
                <td class="col-xs-12 col-sm-12 col-md-3 col-lg-3 camp-descripcio">`+reg[i].descripcio+`</td>
                <td class="col-xs-12 col-sm-12 col-md-1 col-lg-1 accions">
                    <span class="glyphicon glyphicon-ok registre-valid" title="Registre valid"></span>
                    <span class="glyphicon glyphicon-remove registre-novalid" title="Registre invalid"></span>
                    <!-- <span class="glyphicon glyphicon-unchecked seleccionar-registre" title="Seleccionar registre"></span> -->
                </td>
            </tr>
            `);
        }
        aImportar.html("");
    }

    function validaRegistre(dades) {
        $.post("accions.php", {
            data: JSON.stringify(dades)
        }).done(function(resposta){
            escriuText(resposta);
        });
    }

    function escriuText(r){
        console.log(r);
    }
    function actualitzaAccions(){
        accions = $(".accions");
        accions.on('click', '.registre-valid', function(){
            var regsValids = [[]];
            var regActual = $(this).parent().parent().children();

            regActual = $($.grep(regActual, function(r){return !$(r).hasClass("accions");}));
            
            regActual.each(function(i, r){
                var prova = $(r).text().trim();
                //console.log(prova.replace("\\[/]\/g",""));
                return regsValids[0].push(prova);
            });

            validaRegistre(regsValids);

            $(this).parent().parent().fadeOut().remove();
            //comprovaSeleccionades();
        });

        accions.on('click', '.registre-novalid', function(){
            $(this).parent().parent().fadeOut().remove();
            //comprovaSeleccionades();
        });
    }
        /*** seleccionar registre ***/
        /*accions.on('click', '.seleccionar-registre', function(){
            var check = $(this),
                filaPare = $(this).parent().parent();

            if (check.hasClass("glyphicon-unchecked")) {
                check.addClass("glyphicon-check").removeClass("glyphicon-unchecked");
                filaPare.attr("seleccionat", 1);
                if(!accionsGeneral.hasClass("visible"))
                    accionsGeneral.addClass("visible");
            } else {
                check.addClass("glyphicon-unchecked").removeClass("glyphicon-check");
                filaPare.attr("seleccionat", 0);
                comprovaSeleccionades();
            }

        });*/

        /*** seleccionar tots registres ***/
        /*accionsGeneral.on('click', '#seleccionar-registres', function(){
            var registres = $("#taula-registres tbody tr"),
                checks = $(".seleccionar-registre"),
                totsSeleccionats = 0,
                numSeleccionats = 0;
            
            registres.each(function(){
                if ($(this).attr("seleccionat") == "1")
                    numSeleccionats++;
            });
            if (numSeleccionats == registres.length) {
                registres.attr("seleccionat", 0);
                checks.removeClass("glyphicon-check").addClass("glyphicon-unchecked");
                $(this).removeClass("glyphicon-check").addClass("glyphicon-unchecked");
            } else {
                registres.attr("seleccionat", 1);
                checks.removeClass("glyphicon-unchecked").addClass("glyphicon-check");
                $(this).removeClass("glyphicon-unchecked").addClass("glyphicon-check");
            }
            comprovaSeleccionades();
        });
        accionsGeneral.on('click', '#registres-valids', function(){
            
            comprovaSeleccionades();
        });
        accionsGeneral.on('click', '#registres-novalids', function(){
            var registresPerEliminar = $("tr[seleccionat='1']");
            console.log("Clicked");
            console.log(registresPerEliminar);
            registresPerEliminar.remove();
            comprovaSeleccionades();
        });

    }

    function comprovaSeleccionades() {
        var files = $("#taula-registres tr"),
            algunSeleccionat = 0;

        files.each(function(){
            if ($(this).attr("seleccionat") == "1")
                algunSeleccionat = 1;
        });
        if (!algunSeleccionat)
            accionsGeneral.removeClass("visible");
    }*/
    function triaDeFitxer(evt) {
        var files = evt.target.files; // FileList object
        var reader = new FileReader();
        var f = files[0];
        var fitxerJSON = $('#fitxer-json');

        reader.onload = (function(theFile) {
            return function(e) {
                var span = document.createElement('span');
                $('#textImportar').val(e.target.result);
                document.getElementById('taula-registres').insertBefore(span, null);
            };
        })(f);
        reader.readAsText(f);
    }

    document.getElementById('fitxer-json').addEventListener('change', triaDeFitxer, false);
});
