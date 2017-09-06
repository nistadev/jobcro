<nav class="navbar navbar-default" role="navigation">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>
        <div class="collapse navbar-collapse navbar-ex1-collapse">
            <ul class="nav navbar-nav">
                <li class="<?php echo $_GET['subpage']=='mesos' ? 'active' : '';?>"><a href="index.php?page=estadistiques&subpage=mesos">Mesos</a></li>
                <li class="<?php echo $_GET['subpage']=='consultes' ? 'active' : '';?>"><a href="index.php?page=estadistiques&subpage=consultes">Consultes</a></li>
            </ul>
        </div>
    </div>
</nav>
<?php
    $subpage = $_GET['subpage'];
    if (isset($subpage) && $subpage != NULL){
        if ($subpage == "mesos") {
            include("mesos/mesos.php");
            include("mesos/mesos.html");
        } elseif ($subpage == "consultes") {
            include("consultes/consultes.php");
        }
    } else {
        echo "<h2>Error, pagina no trobada</h2>";
    }
?>