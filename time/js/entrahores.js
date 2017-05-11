$(document).ready(function(){
    var form = $("#formulari-hores");
    var formSend = $("#boto-formulari");
    var missatgeError = $("#missatge-error span");

    document.getElementById('data').valueAsDate = new Date();

    formSend.click(function(e){
        e.preventDefault();
        if(validaFormulari()){
            form.submit();
        } else {
            missatgeError.html("Error: Revisa que tots els camps estiguin plens i que la hora inicial no sigui igual o superior a la hora final.").show();
        }
    });

    function validaFormulari(){
        var horaInici = $("#hora_inici");
        var horaFi = $("#hora_fi");
        var client = $("#client");
        var desc = $("#descripcio");
        var data = $("#data");
        var conc = $("#conc");
        var valid = true;

        if (horaInici.val() >= horaFi.val())
            valid = false;

        if (client.val() == "" || desc.val() == "" || conc.val() == "" || data.val() == "")
            valid = false;

        if (desc.val() == "")
            valid = false;

        return valid;
    }
    
    form.submit(function(e){
        e.preventDefault();
        $.post("entra_hores.php", $(this).serialize())
            .done(function(){
                document.getElementById("formulari-hores").reset();
                document.getElementById('data').valueAsDate = new Date();
                missatgeError.html("<span style='color: green;'>Dades enviades!</span>").show().fadeOut(2000);
            });
    });
});