<form action="#" method="POST" id="formulari-hores">
        <div id="camp-data" class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
            <label for="data">Data</label><br/>
            <input type="date" id="data" class="form-control" name="data">
        </div>
        <div id="camp-hora-inici" class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
            <label for="hora_inici">Hora Inici</label><br/>
            <input type="time" step="900" value="09:00" name="hora_inici" id="hora_inici" class="form-control">
        </div>
        <div id="camp-hora-fi" class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
            <label for="hora_fi">Hora Fi</label><br/>
            <input type="time" step="900" value="09:30" name="hora_fi" id="hora_fi" class="form-control">
        </div>
        <div id="camp-client" class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
            <label for="client">Client</label><br>
            <input type="text" name="client" id="client" class="form-control">
        </div>
        <div id="camp-concepte" class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
            <label for="conc">Concepte</label><br>
            <input type="text" name="conc" id="conc" class="form-control">
        </div>
        <div id="camp-descripcio" class="col-xs-12 col-sm-12 col-md-9 col-lg-9">
            <label for="descripcio">Descripcio</label><br>
            <input type="text" name="descripcio" id="descripcio" class="form-control">
        </div>
        <div id="missatge-error" class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <span></span>
        </div>
        <div id="camp-boto-formulari" class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-right">
            <button id="boto-formulari" type="submit" class="btn btn-default">Entrar Hora</button>
        </div>
    </div>
</form>
<script src="js/entrahores.js"></script>