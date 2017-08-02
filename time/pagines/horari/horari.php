<h2>Horari</h2>
<?php
    $mesos = array(
        "01" => "Gener",
        "02" => "Febrer",
        "03" => "Març",
        "04" => "Abril",
        "05" => "Maig",
        "06" => "Juny",
        "07" => "Juliol",
        "08" => "Agost",
        "09" => "Setembre",
        "10" => "Octubre",
        "11" => "Novembre",
        "12" => "Desembre",
    );

    if (isset($conn)) {
        $dies = array();
        $ant_mes = "00";
        $query = "SELECT id, data, sum(temps_total) as temps_total FROM work_done GROUP BY data ORDER BY data ASC";
        $result = $conn->query($query);
        while($row = $result->fetch_array(MYSQLI_ASSOC)){
            $dies[] = $row;
        }
    } else {
        echo "no conn";
    }

    if (count($dies) > 0) {
        $primera_volta = 1;
        foreach ($dies as $dia) { ?>
            <?php 
                $data_array = explode("-", $dia['data']);
                $mes = $data_array[1];
                $any = $data_array[0];
                if ($mes != $ant_mes) { 
                    if($primera_volta) { ?>
                        <div class="table-responsive">
                            <table class="table table-hover" id="horari">
            <?php 
                    } else { ?>
                            </table>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-hover" id="horari"> 
            <?php                
                    }
                    $total_mes = 0;
                    echo "<td class='col-md-6 col-lg-6 mes'><h4>".$mesos[$mes]." ".$any."</h4></td><td style='vertical-align: middle;' class='col-md-6 col-lg-6 total-mes'>Total ".$mesos[$mes].": ".$total_mes."</td>";
                    $ant_mes = $mes;
                    $primera_volta = 0;
                }
            ?>
            <tr>
                <td>
                    <div class="data"><?php echo $dia['data']; ?></div>
                    <div class="temps-total"><?php echo $dia['temps_total'];?></div>
                </td>
            </tr>        
            
        <?php }
    }
?>
            
    </table>
</div>