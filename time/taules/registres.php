<div id="taula-registres">
    <div class="table-responsive">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th class="col-xs-12 col-sm-12 col-md-1 col-lg-1">Data</th>
                    <th class="col-xs-12 col-sm-12 col-md-1 col-lg-1">Hora Inicial</th>
                    <th class="col-xs-12 col-sm-12 col-md-1 col-lg-1">Hora Final</th>
                    <th class="col-xs-12 col-sm-12 col-md-1 col-lg-1">Temps total</th>
                    <th class="col-xs-12 col-sm-12 col-md-2 col-lg-2">Client</th>
                    <th class="col-xs-12 col-sm-12 col-md-2 col-lg-2">Concepte</th>
                    <th class="col-xs-12 col-sm-12 col-md-4 col-lg-4">Descripcio</th>
                    <th class="col-xs-12 col-sm-12 col-md-1 col-lg-1 text-center">Accions</th>
                </tr>
            </thead>
            <tbody>
    <?php   $query = "SELECT * FROM work_done";
            $result = $conn->query($query);
            while($row = $result->fetch_array(MYSQLI_ASSOC)){?>
                    <tr data-id="<?php echo $row['id']; ?>">
                        <td class="col-xs-12 col-sm-12 col-md-1 col-lg-1">
                            <?php echo date("d/m/y", strtotime($row["data"])); ?>
                        </td>
                        <td class="col-xs-12 col-sm-12 col-md-1 col-lg-1">
                            <?php echo date('h:i', strtotime($row["hora_inicial"])); ?>
                        </td>
                        <td class="col-xs-12 col-sm-12 col-md-1 col-lg-1">
                            <?php echo date('h:i', strtotime($row["hora_final"])); ?>
                        </td>
                        <td class="col-xs-12 col-sm-12 col-md-1 col-lg-1">
                            <?php echo (strtotime($row["hora_final"]) - strtotime($row["hora_inicial"])) / 3600, "h"; ?>
                        </td>
                        <td class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
                            <?php echo $row["client"]; ?>
                        </td>
                        <td class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
                            <?php echo $row["concepte"]; ?>
                        </td>
                        <td class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                            <?php echo $row["descripcio"]; ?>
                        </td>
                        <td class="col-xs-12 col-sm-12 col-md-1 col-lg-1 text-center accions">
                            <span id="eliminar-registre" class="glyphicon glyphicon-remove" title="Elimina registre"></span>
                            <span id="editar-registre" class="glyphicon glyphicon-pencil" title="Edita registre"></span>
                            <span id="exportar-registre" class="glyphicon glyphicon-download-alt" title="Exporta registre"></span>
                            <span id="enviar-registre" class="glyphicon glyphicon-upload" title="Envia i elimina"></span>
                        </td>
                    </tr>
            <?php } ?>
            </tbody>
        </table>
    </div>
</div>
<script>
    $(document).ready(function(){
        var accions = $(".accions");
        accions.on('click', '#eliminar-registre', function(){
            var accioClicada = this;
            var confirmacio = confirm("Estas segur de que vols eliminar el registre?");
            if(confirmacio){
                $.ajax({
                    url: 'accions.php' + '?' + $(this).parent().parent().data("id"),
                    type: 'DELETE',
                    context: accioClicada,
                    success: function(data){
                        return $(this).parent().parent().fadeOut("slow");
                    },
                    beforeSend: function(){
                        console.log($(this).parent().parent().data("id"));
                    },
                    error: function(data){
                        console.log("Error");
                    }
                });
            }

        });
    });
</script>