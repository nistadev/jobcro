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

    } else {
        echo "<h1>Error 404: Pagina no trobada</h1>";
    } ?>

    </main>

<?php include("footer.php"); ?>