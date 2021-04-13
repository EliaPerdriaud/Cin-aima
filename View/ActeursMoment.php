<?php 
    $title = "Acteurs du moment";
    include_once('./Inc/header.php');
?>

<div>
  <h1 class="titre"> Les acteurs du moment </h1>
</div>

<div class="container">
    <div class="row row-cols-1 row-cols-md-2 g-5 mt-1">
        <?php 
        $donnees = popularPeople();
        foreach($donnees as $people){
        if($people->getProfilePath() == "https://www.themoviedb.org/t/p/w600_and_h900_bestv2"){
            $profile = "../Style/Images/no-poster.png";
        }
        else{
            $profile = $people->getProfilePath();
        }
        ?>
        <div class="col">
            <div class="card mb-3" style="max-width: 540px;">
            <div class="row g-0">
                <div class="col-md-4">
                <img src="<?= $profile ?>" alt="..." width="179px" class="mx-auto d-block">
                </div>
                <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title"><?= $people->getName() ?></h5>
                    <p class="card-text"><?= mb_strimwidth($people->getBiography(), 0, 250, "...") ?></p>
                    <a href="./Acteur.php?idPeople=<?= $people->getId() ?>" class="btn btn-dark ">Voir</a>
                </div>
                </div>
            </div>
            </div>
        </div>
        <?php } ?>
    </div>
</div>


<?php include_once('./Inc/footer.php'); 