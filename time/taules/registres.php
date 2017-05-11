<div id="taula-registres">
    <div class="table-responsive">
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
    <?php   $query = "SELECT * FROM work_done ORDER BY data DESC, hora_inicial DESC";
            $result = $conn->query($query);
            while($row = $result->fetch_array(MYSQLI_ASSOC)){ ?>
                    <tr data-id="<?php echo $row['id']; ?>">
                        <td class="col-xs-12 col-sm-12 col-md-1 col-lg-1 camp-data">
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
                            <span id="eliminar-registre" class="glyphicon glyphicon-remove" title="Elimina registre"></span>
                            <span id="editar-registre" class="glyphicon glyphicon-pencil" title="Edita registre"></span>
                            <span id="copia-registre" class="glyphicon glyphicon-duplicate" title="Copia registre"></span>
                            <span id="enviar-registre" class="glyphicon glyphicon-upload" title="Envia i elimina"></span>
                        </td>
                    </tr>
            <?php } ?>
            </tbody>
        </table>
    </div>
</div>
<script src="js/accionsregistres.js"></script>