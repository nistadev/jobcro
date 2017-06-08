$(document).ready(function(){
    var vdata, 
        vhoraInicial, 
        vhoraFinal, 
        vtempsTotal,
        vclient, 
        vconcepte, 
        vdescripcio,
        accions = $(".accions"),
        accionsGeneral = $("#accionsGeneral");

    /*
     * ACCIONS UN SOL REGISTRE
     */

    /*** eliminar registre ***/
    accions.on('click', '.eliminar-registre', function(){
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
    accions.on('click', '.editar-registre', function(){
        var accioClicada = this;
        var data = $(this).parent().siblings(".camp-data"),
            horaInicial = $(this).parent().siblings(".camp-hora_inicial"),
            horaFinal = $(this).parent().siblings(".camp-hora_final"),
            tempsTotal = $(this).parent().siblings(".camp-temps_total"),
            client = $(this).parent().siblings(".camp-client"),
            concepte = $(this).parent().siblings(".camp-concepte"),
            descripcio = $(this).parent().siblings(".camp-descripcio"),
            idRegistre = $(this).parent().parent().data("id"),
            formulari = $(this).parent().parent().find(".form-control"),
            altresIconesAccions = $(this).parent().parent().siblings().children().children("span");

        //no estem editant
        if ($(this).hasClass("glyphicon-pencil")) {
            copiaText();
            descripcio.html("");
            $(this).removeClass("glyphicon-pencil").addClass("glyphicon-ok");
            $(this).siblings("span").hide();
            $(this).parent().append("<span class='glyphicon glyphicon-remove cancela'></span>");
            altresIconesAccions.hide();

            fesCampsEditables();

        } else { // estem editant
            if (formulariValid()) { // comprovem si es valid el formulari
                copiaValors(true);
                // enviem la peticio al servidor
                $.ajax({
                    url: 'accions.php',
                    type: 'POST',
                    data: formulari.serialize() + "&id=" + idRegistre,
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
                altresIconesAccions.show();
                $(this).siblings("span").show();
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
            vtempsTotal = tempsTotal.text();
        }

        function copiaValors(guardar = false){ //copia els valors del formulari
            vdata = data.children().val();
            vhoraInicial = horaInicial.children().val();
            vhoraFinal = horaFinal.children().val();
            vtempsTotal = tempsTotal.text();
            vclient = client.children().val();
            vconcepte = concepte.children().val();
            vdescripcio = descripcio.children().val();
            if(guardar){
                var timestampFinal = (new Date(vdata + " " + vhoraFinal).getTime() / 1000);
                var timestampInici = (new Date(vdata + " " + vhoraInicial).getTime() / 1000);
                vtempsTotal = (timestampFinal - timestampInici) / 3600 + "h";
                vdata = vdata.split("-");
                vdata = vdata[2] + "/" + vdata[1] + "/" + vdata[0].charAt(2) + vdata[0].charAt(3);
            }
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
            tempsTotal.html(vtempsTotal);
            client.html(vclient);
            concepte.html(vconcepte);
            descripcio.html(vdescripcio);
        }

    });

    /*** cancelar edicio registre ***/
    accions.on('click', 'span.glyphicon-remove.cancela', function(){
        var accioClicada = this,
            data = $(this).parent().siblings(".camp-data"),
            horaInicial = $(this).parent().siblings(".camp-hora_inicial"),
            horaFinal = $(this).parent().siblings(".camp-hora_final"),
            client = $(this).parent().siblings(".camp-client"),
            concepte = $(this).parent().siblings(".camp-concepte"),
            descripcio = $(this).parent().siblings(".camp-descripcio"),
            altresIconesAccions = $(this).parent().parent().siblings().children().children("span");

        tornaValors();

        function tornaValors() { //recuperem els valors inicials
            data.html(vdata);
            horaInicial.html(vhoraInicial);
            horaFinal.html(vhoraFinal);
            client.html(vclient);
            concepte.html(vconcepte);
            descripcio.html(vdescripcio);
        }
        $(this).siblings(".editar-registre").addClass("glyphicon-pencil").removeClass("glyphicon-ok");
        $(this).siblings("span").show();
        altresIconesAccions.show();
        $(this).remove();
    });

    /*** copiar registre ***/
    accions.on('click', '.copia-registre', function(){
        var aquest = this,
            registreFormatat;

        registreFormatat = exportaRegistres([aquest]);

        function copiaRegistre() {
            var textArea = document.createElement("textarea");
            textArea.value = registreFormatat;
            document.body.appendChild(textArea);
            textArea.select();
            try {
                var successful = document.execCommand('copy');
                if (successful) {
                    $(aquest).parent().parent().fadeOut(50).fadeIn(300);
                } else {
                    alert("Hi ha hagut un error i no s'ha pogut copiar el registre.");
                }
            } catch (err) {
                console.log('Oops, unable to copy', err);
            }
            document.body.removeChild(textArea);
        }

        copiaRegistre();
    });

    /*** seleccionar registre ***/
    accions.on('click', '.seleccionar-registre', function(){
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

    });

    accions.on('click', '.opcions .mail', function(){
        console.log("mail");
    });


    /*
     * ACCIONS VARIS REGISTRES
     */

    /*** eliminar registres seleccionats ***/
    accionsGeneral.on('click', '#eliminar-registres', function(){
        var accioClicada = this,
            registres = $("#registres tbody tr[seleccionat='1']")
            idRegistres = [];

        registres.each(function(){
            idRegistres.push($(this).data("id"));
        });


        var confirmacio = confirm("Estas segur de que vols eliminar els registres?");
        if(confirmacio){
            $.ajax({
                url: 'accions.php?data=' + idRegistres + "",
                type: 'DELETE',
                success: function(data){
                    registres.fadeOut("slow");
                    registres.remove();
                    comprovaSeleccionades();
                },
                error: function(data){
                    console.log("Error al eliminar en massa.");
                }
            });
        }

    });

    /*** copiar registres seleccionats ***/
    accionsGeneral.on('click', '#copia-registres', function(){
        var registreFormatat;

        var registres = $("#registres tbody tr[seleccionat='1']");
        registreFormatat = exportaRegistres(registres, true);

        function copiaRegistre() {
            var textArea = document.createElement("textarea");
            textArea.value = registreFormatat;
            document.body.appendChild(textArea);
            textArea.select();
            try {
                var successful = document.execCommand('copy');
                if (successful) {
                    $("#registres tr[seleccionat='1']").fadeOut(50).fadeIn(300);
                } else {
                    alert("Hi ha hagut un error i no s'ha pogut copiar el registre.");
                }
            } catch (err) {
                console.log('Oops, unable to copy', err);
            }
            document.body.removeChild(textArea);
        }
        copiaRegistre();
    });

    /*** enviar registres seleccionats ***/
    accionsGeneral.on('click', '#enviar-registres', function(){
        var caixa = $(this).parent().find(".enviar-registres-opcions");
        if (!caixa.hasClass("visible"))
            caixa.addClass("visible");
        else
            caixa.removeClass("visible");
    });

    /*** enviar registre ***/
    accions.on('click', '.enviar-registre', function(){
        var caixa = $(this).parent().find(".enviar-registre-opcions");
        if (!caixa.hasClass("visible"))
            caixa.addClass("visible");
        else
            caixa.removeClass("visible");
    });

    /*** seleccionar tots registres ***/
    accionsGeneral.on('click', '#seleccionar-registres', function(){
        var registres = $("#registres tbody tr"),
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

    accionsGeneral.on('click', '.opcions-registres .mail', function(){
        console.log("mail");
    });

    accionsGeneral.on('click', '.opcions-registres .excel', function(){
        var registresFormatats,
            regs = $("#registres tbody tr[seleccionat='1']");

        registresFormatats = exportaRegistres(regs, true, true);

        exportaCSV(registresFormatats, "prova");

        function exportaCSV(regs, titolFitxer) {
            var caixaCompartir = $(this).parent().parent();
            var titol = titolFitxer + '.csv' || 'registres.csv';
            var csv = converteixRegistresACSV(regs);
            var fitxer = new Blob([csv], { type: 'text/csv;charset=utf-8;' });

            if (navigator.msSaveBlob) { // IE 10+
                navigator.msSaveBlob(fitxer, titol);
            } else {
                var enllas = document.createElement("a");
                if (enllas.download !== undefined) {
                    var url = URL.createObjectURL(fitxer);
                    enllas.setAttribute("href", url);
                    enllas.setAttribute("download", titol);
                    enllas.style.visibility = 'hidden';
                    document.body.appendChild(enllas);
                    enllas.click();
                    document.body.removeChild(enllas);
                }
            }
            caixaCompartir.removeClass("visible");

        }
        function converteixRegistresACSV(regs) {
            var regsCSV = '';
            for(var i = 0; i <= regs.length-1; i++){
                var data = regs[i]["data"].split("/");
                data = data[1]+"/"+data[0]+"/20"+data[2];
                regsCSV += "patri,,,"+data+','+parseFloat(regs[i]["temps_total"])+','+regs[i]["client"]+','+regs[i]["concepte"]+','+regs[i]["descripcio"]+','+'\r\n';
            }
            
            return regsCSV;
        }
    });

    accionsGeneral.on('click', '.opcions-registres .fitxer', function(){
        var registresFormatats,
            regs = $("#registres tbody tr[seleccionat='1']");

        registresFormatats = exportaRegistres(regs, true);

        exportaFitxer(registresFormatats, "registres");

        function exportaFitxer(regs, titolFitxer) {
            var caixaCompartir = $(this).parent().parent();
            var titol = titolFitxer + '.json' || 'registres.json';
            var fitxer = new Blob([regs], { type: 'application/json;charset=utf-8;' });

            if (navigator.msSaveBlob) { // IE 10+
                navigator.msSaveBlob(fitxer, titol);
            } else {
                var enllas = document.createElement("a");
                if (enllas.download !== undefined) {
                    var url = URL.createObjectURL(fitxer);
                    enllas.setAttribute("href", url);
                    enllas.setAttribute("download", titol);
                    enllas.style.visibility = 'hidden';
                    document.body.appendChild(enllas);
                    enllas.click();
                    document.body.removeChild(enllas);
                }
            }
            caixaCompartir.removeClass("visible");
        }
    });

    accionsGeneral.on('click', '.opcions-registres .tancar', function(){
        var caixaCompartir = $(this).parent().parent();
        if (!caixaCompartir.hasClass("visible"))
            caixaCompartir.addClass("visible");
        else
            caixaCompartir.removeClass("visible");
    });




    /*
     * FUNCIONS GENERALS
     */

    function comprovaSeleccionades() {
        var files = $("#taula-registres tr"),
            algunSeleccionat = 0;

        files.each(function(){
            if ($(this).attr("seleccionat") == "1")
                algunSeleccionat = 1;
        });
        if (!algunSeleccionat)
            accionsGeneral.removeClass("visible");
    }

    function exportaRegistres(context, general = false, json=false) {
        var aquest = $(context),
            registre = [],
            vregistre = [],
            textRegistres="";

        if(!general)
            aquest.each(function(){registre.push($(this).parent().parent().find("td"));});
        else 
            registre = aquest;

        registre = $(registre);
        registre.each(function(index){
            if (!general) {
                var reg = $(this).toArray();
            } else {
                var reg = $(this).children();
            }
            reg = $.grep(reg, function(r){ return !$(r).hasClass("accions"); });
            reg = $(reg);
            vregistre[index] = [];
            reg.each(function(){
                return vregistre[index].push($(this).text().trim());
            });
        });
        vregistre = $(vregistre);
        vregistre.each(function(index){
            if (index == 0)
                textRegistres = "[\n";
            if (index != vregistre.length - 1)
                textRegistres += '\t{\n\t\t"data" : "'+$(this)[0]+'",\n\t\t"hora_inici" : "'+$(this)[1]+'",\n\t\t"hora_fi" : "'+$(this)[2]+'",\n\t\t"temps_total" : "'+$(this)[3]+'",\n\t\t"client" : "'+$(this)[4]+'",\n\t\t"concepte" : "'+$(this)[5]+'",\n\t\t"descripcio" : "'+$(this)[6]+'"\n\t},\n';
            else
                textRegistres += '\t{\n\t\t"data" : "'+$(this)[0]+'",\n\t\t"hora_inici" : "'+$(this)[1]+'",\n\t\t"hora_fi" : "'+$(this)[2]+'",\n\t\t"temps_total" : "'+$(this)[3]+'",\n\t\t"client" : "'+$(this)[4]+'",\n\t\t"concepte" : "'+$(this)[5]+'",\n\t\t"descripcio" : "'+$(this)[6]+'"\n\t}\n]';
            
        });

        if (json) return JSON.parse(textRegistres);

        return textRegistres;
    }

});
