<div id="formulari-importacio">
    <form class="form-inline" id="form-import">
        <textarea name="textImportar" id="textImportar" class="form-control" placeholder="[registre a importar]"></textarea>
        <button type="button" class="btn btn-info " id="importa">Importar</button>
    </form>
    <div id="taula-registres">
    	<table class="table table-hover" id="registres">
            <thead>
                <tr>
                    <th class="col-xs-12 col-sm-12 col-md-1 col-lg-1">Data</th>
                    <th class="col-xs-12 col-sm-12 col-md-1 col-lg-1">Hora Inicial</th>
                    <th class="col-xs-12 col-sm-12 col-md-1 col-lg-1">Hora Final</th>
                    <th class="col-xs-12 col-sm-12 col-md-1 col-lg-1">Total</th>
                    <th class="col-xs-12 col-sm-12 col-md-1 col-lg-1">Client</th>
                    <th class="col-xs-12 col-sm-12 col-md-2 col-lg-2">Concepte</th>
                    <th class="col-xs-12 col-sm-12 col-md-4 col-lg-4">Descripcio</th>
                    <th class="col-xs-12 col-sm-12 col-md-1 col-lg-1">Accions</th>
                </tr>
            </thead>
            <tbody></tbody>
        </table>
        <div id="accionsGeneral">
            <div class="opcions">
                <span class="glyphicon glyphicon-ok registres-valids" title="Registre valid"></span>
                <span class="glyphicon glyphicon-remove registres-novalids" title="Registre invalid"></span>
                <span id="seleccionar-registres" class="glyphicon glyphicon-unchecked" title="Seleccionar registres"></span>
            </div>
        </div>
    </div>
</div>
<script src="js/importador.js"></script>