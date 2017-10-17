<!DOCTYPE html>
<html lang="ca">
<head>
    <title>TIME - Your Professional Job Timer</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <script src="js/jquery-3.2.1.min.js"></script>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<header>
    <nav id="menu-principal" class="navbar navbar-default navbar-static-top" role="navigation">
        <div class="container">
            <a class="navbar-brand" href="index.php?page=inici">TIME</a>
            <ul class="nav navbar-nav text-center">
                <li class="<?php echo $_GET['page'] == 'entra_hores' ? 'active' : ''; ?>">
                    <a href="index.php?page=entra_hores">Entrar Hores</a>
                </li>
                <li class="<?php echo $_GET['page'] == 'registres' ? 'active' : ''; ?>">
                    <a href="index.php?page=registres">Registres</a>
                </li>
                <li class="<?php echo $_GET['page'] == 'importar' ? 'active' : ''; ?>">
                    <a href="index.php?page=importar">Importar</a>
                </li>
                <li class="<?php echo $_GET['page'] == 'estadistiques' ? 'active' : ''; ?>">
                    <a href="index.php?page=estadistiques&subpage=mesos">Estadistiques</a>
                </li>
            </ul>
            <ul class="nav navbar-nav text-right">
                <li class="<?php echo $_GET['page'] == 'configuracions' ? 'active' : ''; ?>">
                    <a href="index.php?page=configuracions"><span class="glyphicon glyphicon-cog"></span></a>
                </li>
            </ul>
        </div>
    </nav>
</header>
<body>