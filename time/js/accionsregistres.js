$(document).ready(function(){
    var vdata, 
        vhoraInicial, 
        vhoraFinal, 
        vclient, 
        vconcepte, 
        vdescripcio,
        accions = $(".accions");

    /*** eliminar registre ***/
    accions.on('click', '#eliminar-registre', function(){
        var accioClicada = this;
        var idRegistre = $(this).parent().parent().data("id");
        var confirmacio = confirm("Estas segur de que vols eliminar el registre?");
        if(confirmacio){
            $.ajax({
                url: 'accions.php?id=' + idRegistre,
                type: 'DELETE',
                context: accioClicada,
                success: function(data){
                    console.log(data);
                    return $(this).parent().parent().fadeOut("slow");
                },
                error: function(data){
                    console.log("Error");
                }
            });
        }

    });

    /*** editar registre ***/
    accions.on('click', '#editar-registre', function(){
        var accioClicada = this;
        var data = $(this).parent().siblings(".camp-data"),
            horaInicial = $(this).parent().siblings(".camp-hora_inicial"),
            horaFinal = $(this).parent().siblings(".camp-hora_final"),
            tempsTotal = $(this).parent().siblings(".camp-temps_total"),
            client = $(this).parent().siblings(".camp-client"),
            concepte = $(this).parent().siblings(".camp-concepte"),
            descripcio = $(this).parent().siblings(".camp-descripcio"),
            idRegistre = $(this).parent().parent().data("id");

        //no estem editant
        if ($(this).hasClass("glyphicon-pencil")) {
            copiaText();
            descripcio.html("");
            $(this).removeClass("glyphicon-pencil").addClass("glyphicon-ok");
            $(this).siblings().hide();
            $(this).parent().append("<span class='glyphicon glyphicon-remove cancela'></span>");
            $(this).parent().parent().siblings().children().children("span").hide();

            fesCampsEditables();

        } else { // estem editant
            if (formulariValid()) { // comprovem si es valid el formulari
                copiaValors(true);
                // enviem la peticio al servidor
                $.ajax({
                    url: 'accions.php',
                    type: 'POST',
                    data: $(this).parent().parent().find(".form-control").serialize() + "&id=" + idRegistre,
                    context: accioClicada,
                    success: function(data){
                        return console.log(data);
                    },
                    //beforeSend: function(){console.log(idRegistre, $(this).parent().parent().find(".form-control").serialize() + "&id=" + idRegistre);},
                    error: function(data){
                        console.log("Error");
                    }
                });
                surtModeEdicio();
                $(this).addClass("glyphicon-pencil").removeClass("glyphicon-ok");
                $(this).siblings("span.glyphicon-remove.cancela").remove();
                $(this).parent().parent().siblings().children().children("span").show();
                $(this).siblings().show();
            } else { // formulari no valid
                alert("Camps invalids, comproveu que no hi haigui cap camp buit i que la data d'inici no sigui mes gran que la final.");
            } // validacio formulari
        } // comprovacio editant

        function formulariValid() { // funcio validar form
            if(data.children().val() == "" || horaInicial.children().val() >= horaFinal.children().val() || client.children().val() == "" || concepte.children().val() == "" || descripcio.children().val() == "") 
                return false;
            return true;
        }

        function copiaText(){ //copia el text del html
            vdata = data.text().trim();
            vhoraInicial = horaInicial.text().trim();
            vhoraFinal = horaFinal.text().trim();
            vclient = client.text().trim();
            vconcepte = concepte.text().trim();
            vdescripcio = descripcio.text().trim();
        }

        function copiaValors(guardar = false){ //copia els valors del formulari
            vdata = data.children().val();
            if(guardar){
                vdata = vdata.split("-");
                vdata = vdata[2] + "/" + vdata[1] + "/" + vdata[0].charAt(2) + vdata[0].charAt(3);
            }
            vhoraInicial = horaInicial.children().val();
            vhoraFinal = horaFinal.children().val();
            vclient = client.children().val();
            vconcepte = concepte.children().val();
            vdescripcio = descripcio.children().val();
        }

        function fesCampsEditables(){ // sustitueix els camps per camps editables amb les dades que teniem
            data.html("<input type='date' name='data' class='form-control' style='width:90%;'>");
            var dataAsetar = vdata.split("/");
            dataAsetar = "20"+dataAsetar[2]+"-"+dataAsetar[1]+"-"+dataAsetar[0];
            data.children("input").val(dataAsetar);

            horaInicial.html('<input type="time" step="900" name="hora_inici" id="hora_inici" class="form-control">');
            horaInicial.children().val(vhoraInicial);

            horaFinal.html('<input type="time" step="900" name="hora_fi" id="hora_fi" class="form-control">');
            horaFinal.children().val(vhoraFinal);

            client.html('<input type="text" name="client" id="client" class="form-control" value="'+vclient+'">');

            concepte.html('<input type="text" name="conc" id="conc" class="form-control" value="'+vconcepte+'">');

            descripcio.html('<input type="text" name="descripcio" id="descripcio" class="form-control" value="'+vdescripcio+'">');
        }

        function surtModeEdicio(){ //sortim de mode edicio, deixem les dades com estaven o les noves, en cas de haver fet la peticio
            data.html(vdata);
            horaInicial.html(vhoraInicial);
            horaFinal.html(vhoraFinal);
            client.html(vclient);
            concepte.html(vconcepte);
            descripcio.html(vdescripcio);
        }

    });

    /*** cancelar edicio registre ***/
    accions.on('click', 'span.glyphicon-remove.cancela', function(){
        var accioClicada = this;
        var data = $(this).parent().siblings(".camp-data");
        var horaInicial = $(this).parent().siblings(".camp-hora_inicial");
        var horaFinal = $(this).parent().siblings(".camp-hora_final");
        var client = $(this).parent().siblings(".camp-client");
        var concepte = $(this).parent().siblings(".camp-concepte");
        var descripcio = $(this).parent().siblings(".camp-descripcio");

        tornaValors();

        function tornaValors() { //recuperem els valors inicials
            data.html(vdata);
            horaInicial.html(vhoraInicial);
            horaFinal.html(vhoraFinal);
            client.html(vclient);
            concepte.html(vconcepte);
            descripcio.html(vdescripcio);
        }
        $(this).siblings("#editar-registre").addClass("glyphicon-pencil").removeClass("glyphicon-ok");
        $(this).siblings().show();
        $(this).parent().parent().siblings().children().children("span").show();
        $(this).remove();
    });
});