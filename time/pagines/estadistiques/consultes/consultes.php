<form action="" method="POST" id="formulari-consultes" class="formulari-consultes form-inline" role="form">
    <div class="form-group">
        <input type="text" name="consulta_client" id="consulta-client" class="form-control" placeholder="Client">
        <input type="text" name="consulta_concepte" id="consulta-concepte" class="form-control" placeholder="Concepte">
    </div>
    <button type="submit" class="btn btn-primary">Consultar</button>
</form>
<div id="resultat-consulta">
    <div class="table-responsive">
        <table class="table table-hover estadistiques-consulta amagat">
            <thead>
                <tr>
                    <th class="col-xs-12 col-sm-12 col-md-3 col-lg-3">Hores Totals</th>
                    <th class="col-xs-12 col-sm-12 col-md-3 col-lg-3">Mitjana Hores/Dia</th>
                    <th class="col-xs-12 col-sm-12 col-md-3 col-lg-3">Max. Temps Invertit</th>
                    <th class="col-xs-12 col-sm-12 col-md-3 col-lg-3">Min. Temps Invertit</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
        <table class="table table-hover registres">
            <thead>
                <tr>
                    <th class="col-xs-12 col-sm-12 col-md-1 col-lg-1">Data</th>
                    <th class="col-xs-12 col-sm-12 col-md-1 col-lg-1">Hora Inicial</th>
                    <th class="col-xs-12 col-sm-12 col-md-1 col-lg-1">Hora Final</th>
                    <th class="col-xs-12 col-sm-12 col-md-1 col-lg-1">Total</th>
                    <th class="col-xs-12 col-sm-12 col-md-1 col-lg-1">Client</th>
                    <th class="col-xs-12 col-sm-12 col-md-2 col-lg-2">Concepte</th>
                    <th class="col-xs-12 col-sm-12 col-md-4 col-lg-4">Descripcio</th>
                </tr>
            </thead>
            <tbody></tbody>
        </table>
    </div>
</div>
<?php
include("consultes.html");
?>