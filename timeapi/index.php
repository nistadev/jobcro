<?php include("header.php"); ?>
    <header>
    </header>
    <main>
<?php 
    $page = $_GET["page"];

    if (isset($page) && $page != "") {
        include("connection.php");
        if ($page == "entra_hores")
            include("pagines/formularis/entrar_hores.php");
        else if ($page == "registres")
            include("pagines/registres.php");
        elseif ($page == "importar")
            include("pagines/importador.php");
        elseif ($page == "inici")
            include("pagines/inici.php");
        elseif ($page == "configuracions"){
            include("pagines/formularis/configuracions.php");
            $user = "root";
            $pass = "root";
            $process = curl_init('http://localhost/wordpress-api/wp-json/wp/v2/pages');
            $data = array(
                'title' => 'REST API Post Test' ,
                'content' => 'REST API Post Post Content Test',
                'excerpt' => 'REST API Post Post Excerpt',
                );
            $data_string = json_encode($data);
            //curl_setopt($process, CURLOPT_USERPWD, $user . ":" . $pass);
            curl_setopt($process, CURLOPT_TIMEOUT, 30);
            curl_setopt($process, CURLOPT_POST, 1);
            curl_setopt($process, CURLOPT_CUSTOMREQUEST, "GET");
            curl_setopt($process, CURLOPT_POSTFIELDS, $data_string);
            curl_setopt($process, CURLOPT_RETURNTRANSFER, TRUE);
            curl_setopt($process, CURLOPT_HTTPHEADER, array(
                'Content-Type: application/json',
                'Authorization' => 'Basic ' . base64_encode( $user . ":" . $pass ),
                'Content-Length: ' . strlen($data_string))
            );
            $return = curl_exec($process);
            curl_close($process);
            $result = json_decode($return);
            echo '<pre>'.$return.'</pre>'; 
            //echo '<pre>'.$result.'</pre>'; 
        }else {
            echo "<h1 class='text-center'>404 Not Found</h1>";
            echo "<div class='text-center'>La pagina <strong>".$page."</strong> no ha estat trobada</div>"; 
        }

    } else {
        if (isset($page)) {
            header("location: index.php?page=404");
        } else {
            header("location: index.php?page=inici");
        }
    } ?>

    </main>

<?php include("footer.php"); ?>