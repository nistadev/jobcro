<form action="entra_hores.php" method="POST">
    <div class="row formulari">
        <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
            <label for="hora_inici">Hora Inici</label><br/>
            <select name="hora_inici" id="hora_inici">
                <option value="08:00" name="hora_inici">08:00</option>
                <option value="08:15" name="hora_inici">08:15</option>
                <option value="08:30" name="hora_inici">08:30</option>
                <option value="08:45" name="hora_inici">08:45</option>
                <option value="09:00" name="hora_inici">09:00</option>
                <option value="09:15" name="hora_inici">09:15</option>
                <option value="09:30" name="hora_inici">09:30</option>
                <option value="09:45" name="hora_inici">09:45</option>
                <option value="10:00" name="hora_inici">10:00</option>
                <option value="10:15" name="hora_inici">10:15</option>
                <option value="10:30" name="hora_inici">10:30</option>
                <option value="10:45" name="hora_inici">10:45</option>
                <option value="11:00" name="hora_inici">11:00</option>
                <option value="11:15" name="hora_inici">11:15</option>
                <option value="11:30" name="hora_inici">11:30</option>
                <option value="11:45" name="hora_inici">11:45</option>
                <option value="12:00" name="hora_inici">12:00</option>
                <option value="12:15" name="hora_inici">12:15</option>
                <option value="12:30" name="hora_inici">12:30</option>
                <option value="12:45" name="hora_inici">12:45</option>
                <option value="13:00" name="hora_inici">13:00</option>
                <option value="13:15" name="hora_inici">13:15</option>
                <option value="13:30" name="hora_inici">13:30</option>
                <option value="13:45" name="hora_inici">13:45</option>
                <option value="14:00" name="hora_inici">14:00</option>
                <option value="14:15" name="hora_inici">14:15</option>
                <option value="14:30" name="hora_inici">14:30</option>
                <option value="14:45" name="hora_inici">14:45</option>
                <option value="15:00" name="hora_inici">15:00</option>
                <option value="15:15" name="hora_inici">15:15</option>
                <option value="15:30" name="hora_inici">15:30</option>
                <option value="15:45" name="hora_inici">15:45</option>
                <option value="16:00" name="hora_inici">16:00</option>
            </select>
        </div>
        <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
            <label for="hora_fi">Hora Fi</label><br/>
            <select name="hora_fi" id="hora_fi">
                <option value="08:00" name="hora_fi">08:00</option>
                <option value="08:15" name="hora_fi">08:15</option>
                <option value="08:30" name="hora_fi">08:30</option>
                <option value="08:45" name="hora_fi">08:45</option>
                <option value="09:00" name="hora_fi">09:00</option>
                <option value="09:15" name="hora_fi">09:15</option>
                <option value="09:30" name="hora_fi">09:30</option>
                <option value="09:45" name="hora_fi">09:45</option>
                <option value="10:00" name="hora_fi">10:00</option>
                <option value="10:15" name="hora_fi">10:15</option>
                <option value="10:30" name="hora_fi">10:30</option>
                <option value="10:45" name="hora_fi">10:45</option>
                <option value="11:00" name="hora_fi">11:00</option>
                <option value="11:15" name="hora_fi">11:15</option>
                <option value="11:30" name="hora_fi">11:30</option>
                <option value="11:45" name="hora_fi">11:45</option>
                <option value="12:00" name="hora_fi">12:00</option>
                <option value="12:15" name="hora_fi">12:15</option>
                <option value="12:30" name="hora_fi">12:30</option>
                <option value="12:45" name="hora_fi">12:45</option>
                <option value="13:00" name="hora_fi">13:00</option>
                <option value="13:15" name="hora_fi">13:15</option>
                <option value="13:30" name="hora_fi">13:30</option>
                <option value="13:45" name="hora_fi">13:45</option>
                <option value="14:00" name="hora_fi">14:00</option>
                <option value="14:15" name="hora_fi">14:15</option>
                <option value="14:30" name="hora_fi">14:30</option>
                <option value="14:45" name="hora_fi">14:45</option>
                <option value="15:00" name="hora_fi">15:00</option>
                <option value="15:15" name="hora_fi">15:15</option>
                <option value="15:30" name="hora_fi">15:30</option>
                <option value="15:45" name="hora_fi">15:45</option>
                <option value="16:00" name="hora_fi">16:00</option>
            </select>
        </div>
        <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
            <label for="client">Client</label><br>
            <input type="text" name="client" id="client" class="form-control">
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <label for="descripcio">Descripcio</label><br>
            <input type="text" name="descripcio" id="descripcio" class="form-control">
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <button type="submit" class="btn btn-default boto-formulari">Entrar Hora</button>
        </div>
    </div>
</form>