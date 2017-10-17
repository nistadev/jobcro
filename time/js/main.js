function exportaCSV(regs, titolFitxer, context) {
    var caixaCompartir = context.parent().parent();
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
        var data = regs[i]["data"].split("/"),
            tempsTotal = parseFloat(regs[i]["temps_total"]);
        data = data[0]+"/"+data[1]+"/20"+data[2];
        tempsTotal += "";
        tempsTotal = tempsTotal.split(".");
        if (tempsTotal.length > 1) 
            tempsTotal = tempsTotal[0] + "," + tempsTotal[1];
        else
            tempsTotal = tempsTotal[0];


        regsCSV += "patri;;;"+data+';'+tempsTotal+';'+regs[i]["client"]+';'+regs[i]["concepte"]+';'+regs[i]["descripcio"]+';'+'\r\n';
    }
    console.log(regsCSV);
    return regsCSV;
}