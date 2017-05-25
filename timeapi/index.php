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
        elseif ($page == "configuracions")
            include("pagines/formularis/configuracions.php");
        else {
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