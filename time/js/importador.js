$(document).ready(function(){
    var aImportar = $("#textImportar"),
        botoImportar = $("#importa"),
        registreImportat = $("#registreImportat"),
        formulari = $("#form-import");

    console.log(window.sessionStorage.getItem('autosave'));
    if (window.sessionStorage.getItem('autosave'))
    {
        var recuperaValor = window.sessionStorage.getItem('aImportar');
        aImportar.val(recuperaValor);
        console.log(recuperaValor);
    }

    botoImportar.click(function(){
        var text = aImportar.val();
        escriuText(text);
        window.sessionStorage.setItem('aimportar', text);
        console.log(aImportar,text);
    });

    function escriuText(text){
        registreImportat.show();
        registreImportat.html(text);
        registreImportat.fadeOut(2000);
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