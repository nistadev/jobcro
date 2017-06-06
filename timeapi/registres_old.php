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
        <span id="enviar-registre-<?php echo $row['id'];?>" class="glyphicon glyphicon-share-alt enviar-registre" title="Envia i elimina"></span>
        <span id="seleccionar-registre-<?php echo $row['id'];?>" class="glyphicon glyphicon-unchecked seleccionar-registre" title="Seleccionar registre"></span>
        <div class="enviar-registre-opcions">
            <div class="opcions">
                <span class="glyphicon glyphicon-list-alt excel"></span>
                <span class="glyphicon glyphicon-envelope mail"></span>
                <span class="glyphicon glyphicon-save-file fitxer"></span>
            </div>
        </div>
    </td>
</tr>