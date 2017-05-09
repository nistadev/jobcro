<?php include("connection.php"); ?>

<?php if(!$conn){
        echo "Error al connectar amb la base de dades.<br/>";
        exit();
    } else {
        $query = "SELECT * FROM work_done";
        $result = $conn->query($query);?>
<?php   while($row = $result->fetch_array(MYSQLI_ASSOC)){?>
            <div class="row">
                <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1">
                    <?php echo $row["hora_inicial"]; ?>
                </div>
                <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1">
                    <?php echo $row["hora_final"]; ?>
                </div>
                <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1">
                    <?php echo $row["hora_final"] - $row["hora_inicial"]; ?>
                </div>
                <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                    <?php echo $row["client"]; ?>
                </div>
                <div class="col-xs-5 col-sm-5 col-md-5 col-lg-5">
                    <?php echo $row["descripcio"]; ?>
                </div>
            </div>
        <?php }
    } ?>
    </table>
</div>