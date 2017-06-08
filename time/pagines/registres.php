<div id="taula-registres">
    <div class="table-responsive">
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
            <tbody>
    <?php   $query = "SELECT * FROM work_done ORDER BY data ASC, hora_inicial ASC";
            $result = $conn->query($query);
            while($row = $result->fetch_array(MYSQLI_ASSOC)){ ?>
                    <tr data-id="<?php echo $row['id']; ?>" seleccionat="0">
                        <td class="col-xs-12 col-sm-12 col-md-1 col-lg-1 camp-data <?php if(!is_null($row['nuvol'])) echo 'al-nuvol';?>">
                            <?php echo date("d/m/y", strtotime($row["data"])); ?>
                        </td>
                        <td class="col-xs-12 col-sm-12 col-md-1 col-lg-1 camp-hora_inicial">
                            <?php echo date('H:i', strtotime($row["hora_inicial"])); ?>
                        </td>
                        <td class="col-xs-12 col-sm-12 col-md-1 col-lg-1 camp-hora_final">
                            <?php echo date('H:i', strtotime($row["hora_final"])); ?>
                        </td>
                        <td class="col-xs-12 col-sm-12 col-md-1 col-lg-1 camp-temps_total">
                            <?php echo (strtotime($row["hora_final"]) - strtotime($row["hora_inicial"])) / 3600, "h"; ?>
                        </td>
                        <td class="col-xs-12 col-sm-12 col-md-1 col-lg-1 camp-client">
                            <?php echo $row["client"]; ?>
                        </td>
                        <td class="col-xs-12 col-sm-12 col-md-1 col-lg-1 camp-concepte">
                            <?php echo $row["concepte"]; ?>
                        </td>
                        <td class="col-xs-12 col-sm-12 col-md-3 col-lg-3 camp-descripcio">
                            <?php echo $row["descripcio"]; ?>
                        </td>
                        <td class="col-xs-12 col-sm-12 col-md-1 col-lg-1 accions">
                            <span id="eliminar-registre-<?php echo $row['id'];?>" class="glyphicon glyphicon-remove eliminar-registre" title="Elimina registre"></span>
                            <span id="editar-registre-<?php echo $row['id'];?>" class="glyphicon glyphicon-pencil editar-registre" title="Edita registre"></span>
                            <span id="copia-registre-<?php echo $row['id'];?>" class="glyphicon glyphicon-duplicate copia-registre" title="Copia registre"></span>
                            <span id="seleccionar-registre-<?php echo $row['id'];?>" class="glyphicon glyphicon-unchecked seleccionar-registre" title="Seleccionar registre"></span>
                        </td>
                    </tr>
            <?php } ?>
            </tbody>
        </table>
        <div id="accionsGeneral">
            <div class="opcions">
                <span id="eliminar-registres" class="glyphicon glyphicon-remove" title="Elimina registres"></span>
                <span id="copia-registres" class="glyphicon glyphicon-duplicate" title="Copia registres"></span>
                <span id="enviar-registres" class="glyphicon glyphicon-share-alt" title="Envia i elimina"></span>
                <span id="seleccionar-registres" class="glyphicon glyphicon-unchecked" title="Seleccionar registres"></span>
                <div class="enviar-registres-opcions">
                    <div class="overlay"></div>
                    <div class="opcions-registres">
                        <span class="glyphicon glyphicon-list-alt excel" title="Exportar com a csv per a excel"></span>
                        <span class="glyphicon glyphicon-envelope mail" title="Enviar via mail"></span>
                        <span class="glyphicon glyphicon-save-file fitxer" title="Generar fitxer"></span>
                        <span class="glyphicon glyphicon-remove tancar" title="Cancela accio"></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="js/accionsregistres.js"></script>