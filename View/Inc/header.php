<?php
    session_start();
    
    global $_MWC;
    $_MWC = array();    // Create blank array to overwrite previously used data.
    $_MWC['base'] = "./..";    // Equal to "/base"
    
    function glob_recursive($pattern)
    {
    $files = glob($pattern, null);

    foreach (glob(dirname($pattern).'/*', GLOB_ONLYDIR|GLOB_NOSORT) as $dir) {
        $files = array_merge($files, glob_recursive($dir.'/'.basename($pattern)));
    }

    return $files;
    }

    $phpFiles = glob_recursive($_MWC['base'] . '/' . "Model" . '/*.php');

    foreach($phpFiles as $phpFile){
        require_once $phpFile;
    }

    $phpFiles = glob_recursive($_MWC['base'] . '/' . "Controller" . '/*.php');

    foreach($phpFiles as $phpFile){
        require_once $phpFile;
    }

    $current_dir = getcwd();
    $current_dir = str_replace("\\", "/", $current_dir); // Utilisateurs de Windows, pensez à changer vos antislashes

    $path = $current_dir;
    $file = basename($path);

    if($file == "api-web"){
        $accueil = "./index.php";
        $dernieresSorties = "./View/dernieresSorties.php";
        $acteursMoment = "./View/acteursMoment.php";
        $mieuxNotes = "./View/mieuxNotes.php";
        $plusPopulaires = "./View/populaires.php";

        $style = "./Style/stylesheet.css";
    }
    else{
        $accueil = "../index.php";
        $dernieresSorties = "../View/dernieresSorties.php";
        $acteursMoment = "../View/acteursMoment.php";
        $mieuxNotes = "../View/mieuxNotes.php";
        $plusPopulaires = "../View/populaires.php";

        $style = "../Style/stylesheet.css";
    }

    if(isset($_POST["btn_search"])){
        $_SESSION['recherche'] = $_POST["text_search"];
        if($_SESSION['recherche'] != ""){
            header("Location: ./recherche.php");
        }
        else
        {
            header("Location: ./index.php");
        }
        
    }

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= $style ?>" >
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <title><?= $title ?> </title>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="<?= $accueil ?>">Cin'aima</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">

                <li class="nav-item">
                <a class="nav-link <?php if(strpos($_SERVER['PHP_SELF'], 'index.php')) echo "active"; ?>" aria-current="page" href="<?= $accueil ?>">Accueil</a>
                </li>

                <li class="nav-item">
                <a class="nav-link <?php if(strpos($_SERVER['PHP_SELF'], 'dernieresSorties.php')) echo "active"; ?>" href="<?= $dernieresSorties ?>">Dernières sorties</a>
                </li>

                <li class="nav-item">
                <a class="nav-link <?php if(strpos($_SERVER['PHP_SELF'], 'acteursMoment.php')) echo "active"; ?>" href="<?= $acteursMoment ?>">Acteurs du moment</a>
                </li>

                <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle <?php if(strpos($_SERVER['PHP_SELF'], 'mieuxNotes.php') || strpos($_SERVER['PHP_SELF'], 'populaires.php') ) echo "active"; ?>" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false"> Films</a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item <?php if(strpos($_SERVER['PHP_SELF'], 'mieuxNotes.php')) echo "active"; ?>" href="<?= $mieuxNotes ?>">Mieux notés</a></li>
                    <li><a class="dropdown-item <?php if(strpos($_SERVER['PHP_SELF'], 'populaires.php')) echo "active"; ?>" href="<?= $plusPopulaires ?>">Plus populaires</a></li>
                </ul>
                </li>
            
            </ul>
            <form method="POST" class="d-flex">
                <input name="text_search" class="form-control me-2" type="search" placeholder="Rechercher" aria-label="Search">
                <button name="btn_search" class="btn btn-outline-light" type="submit">Chercher</button>
            </form>
            </div>
        </div>
    </nav>