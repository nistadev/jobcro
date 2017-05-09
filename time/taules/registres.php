<div id="taula-registres">
    <div class="table-responsive">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th class="col-xs-1 col-sm-1 col-md-1 col-lg-1">Hora Inicial</th>
                    <th class="col-xs-1 col-sm-1 col-md-1 col-lg-1">Hora Final</th>
                    <th class="col-xs-1 col-sm-1 col-md-1 col-lg-1">Temps total</th>
                    <th class="col-xs-2 col-sm-2 col-md-2 col-lg-2">Client</th>
                    <th class="col-xs-5 col-sm-5 col-md-5 col-lg-5">Descripcio</th>
                    <th class="col-xs-1 col-sm-1 col-md-1 col-lg-1 text-center">Accions</th>
                </tr>
            </thead>
            <tbody>
    <?php   $query = "SELECT * FROM work_done";
            $result = $conn->query($query);
            while($row = $result->fetch_array(MYSQLI_ASSOC)){?>
                    <tr>
                        <td class="col-xs-1 col-sm-1 col-md-1 col-lg-1">
                            <?php echo $row["hora_inicial"]; ?>
                        </td>
                        <td class="col-xs-1 col-sm-1 col-md-1 col-lg-1">
                            <?php echo $row["hora_final"]; ?>
                        </td>
                        <td class="col-xs-1 col-sm-1 col-md-1 col-lg-1">
                            <?php echo (strtotime($row["hora_final"]) - strtotime($row["hora_inicial"])) / 3600, "h"; ?>
                        </td>
                        <td class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
                            <?php echo $row["client"]; ?>
                        </td>
                        <td class="col-xs-5 col-sm-5 col-md-5 col-lg-5">
                            <?php echo $row["descripcio"]; ?>
                        </td>
                        <td class="col-xs-1 col-sm-1 col-md-1 col-lg-1 text-center accions">
                            <span class="glyphicon glyphicon-remove"></span>
                            <span class="glyphicon glyphicon-pencil"></span>
                        </td>
                    </tr>
            <?php } ?>
            </tbody>
        </table>
    </div>
</div>