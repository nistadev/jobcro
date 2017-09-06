<?php include("header.php"); ?>
    <header>
    </header>
    <main>
        <div class="container">
        
<?php 
    $page = $_GET["page"];

    if (isset($page) && $page != "") {
        include("connection.php");
        if ($page == "entra_hores"){
            include("formularis/entrar_hores/entrar_hores.php");
            include("formularis/entrar_hores/entrar_hores.html");
        } else if ($page == "registres") {
            include("pagines/registres/registres.php");
            include("pagines/registres/registres.html");
        } elseif ($page == "importar") {
            include("pagines/importador/importador.php");
            include("pagines/importador/importador.html");
        } elseif ($page == "inici") {
            include("pagines/inici/inici.php");
            include("pagines/inici/inici.html");
        } elseif ($page == "estadistiques") {
            include("pagines/estadistiques/estadistiques.php");
            include("pagines/estadistiques/estadistiques.html");
        } elseif ($page == "configuracions") {
            include("formularis/configuracions/configuracions.php");
            include("formularis/configuracions/configuracions.html");
        } else {
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

        </div>
    </main>

<?php include("footer.php"); ?>