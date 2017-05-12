<div id="formulari-importacio">
    <form class="form-inline" id="form-import">
        <textarea name="textImportar" id="textImportar" class="form-control" placeholder="[registre a importar]"></textarea>
        <button type="button" class="btn btn-info " id="importa">Importar</button>
    </form>
    <div id="registreImportat">
    	<table class="table table-hover">
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
            <tbody>
		    	<tr>
		            <td class="col-xs-12 col-sm-12 col-md-1 col-lg-1 camp-data"></td>
		            <td class="col-xs-12 col-sm-12 col-md-1 col-lg-1 camp-hora_inicial"></td>
		            <td class="col-xs-12 col-sm-12 col-md-1 col-lg-1 camp-hora_final"></td>
		            <td class="col-xs-12 col-sm-12 col-md-1 col-lg-1 camp-temps_total"></td>
		            <td class="col-xs-12 col-sm-12 col-md-1 col-lg-1 camp-client"></td>
		            <td class="col-xs-12 col-sm-12 col-md-1 col-lg-1 camp-concepte"></td>
		            <td class="col-xs-12 col-sm-12 col-md-3 col-lg-3 camp-descripcio"></td>
		            <td class="col-xs-12 col-sm-12 col-md-1 col-lg-1 accions">
		                <span id="registre-valid" class="glyphicon glyphicon-ok" title="Registre valid"></span>
		                <span id="registre-novalid" class="glyphicon glyphicon-remove" title="Registre invalid"></span>
		            </td>
		        </tr>
            </tbody>
        </table>
    </div>
</div>
<script src="js/importador.js"></script>