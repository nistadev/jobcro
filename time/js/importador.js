$(document).ready(function(){
    var aImportar = $("#textImportar"),
        botoImportar = $("#importa"),
        registreImportat = $("#registreImportat"),
        formulari = $("#form-import");

    botoImportar.click(function(){
        var text = aImportar.val();
        escriuText(text);
        $("#textImportar").val("");
    });

    function escriuText(text){
        registreImportat.show();
        registreImportat.html(text);
        registreImportat.fadeOut(2000);
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
    })
});