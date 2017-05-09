<?php include("header.php"); ?>
<body>
    <header>
    </header>
    <main>
<?php 
    $page = $_GET["page"];

    if (isset($page) && $page != "") {

        if ($page == "entra_hores") {
            $miss = $_GET["msg"];

            include("formularis/entrar_hores.php");

            if(isset($miss)):
                if($miss != "ko")
                    echo "<small>Dades entrades correctament!</small>";
                else
                    echo "<small>Error al entrar dades.</small>";
            endif;

        } else if ($page == "registres") {
            include("connection.php");
            if(!$conn){
                    echo "Error al connectar amb la base de dades.<br/>";
                    exit();
                } else {
                    include("taules/registres.php");
                } ?>    
        <?php } else if ($page == "contrasenya_perduda") {
            include("lost_password.php");
        }

    } else {
        if (!isset($page)) 
            echo "Hola";
        else
            echo "<h1>404</h1>";
    }


?>
    </main>

</body>
</html>