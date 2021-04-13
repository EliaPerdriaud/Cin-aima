<?php
$title = "Acteur";
include_once('./Inc/header.php');

if (isset($_GET['idPeople'])) {
    $idPeople = $_GET['idPeople'];
    $people = detailsPeople($idPeople);
    if ($people->getProfilePath() == "https://www.themoviedb.org/t/p/w600_and_h900_bestv2") {
        $poster = "../Style/Images/no-poster.png";
    } else {
        $poster = $people->getProfilePath();
    }
} else {
    $idPeople = null;
    $people = null;
    $poster = "../Style/Images/no-poster.png";
}
?>

<div class="description">
    <div class="poster">
        <img src="<?= $poster ?>" class="image" alt="" />
    </div>

    <div class="synopsis">
        <h2><?= $people->getName() ?></h2>
        <br>
        <h4>Biographie</h4>
        <br>
        <p><?= $people->getBiography() ?></p>

    </div>

    <div class="details-acteurs">
        <div class="text-details">
            <h5>GENRE </h5>
            <p><?= $people->getGender() ?></p>
            <br>
            <h5>DATE DE NAISSANCE</h5>
            <p><?= $people->getBirthday() ?></p>
            <br>
            <?php
            if ($people->getDeathday() != null) {
            ?>
                <h5>DATE DE DECES</h5>
                <p><?= $people->getDeathday() ?></p>
                <br>
            <?php } ?>
            <h5>LIEU DE NAISSANCE</h5>
            <p><?= $people->getPlaceOfBirth() ?></p>
            <br>
            <h5>POPULARITE</h5>
            <p><?= $people->getPopularity() ?></p>
            <br>
            <h5>CONNU POUR</h5>
            <p><?= $people->getKnownForDepartment() ?></p>

        </div>
    </div>
</div>

<h2 class="ms-5 mt-3">Connu pour :</h2>
<div class="container mt-3">
    <div class="card-group">
    <?php
        $count = 1;
        foreach($people->getTabMovie() as $film){
            if ($film->getPosterPath() == "https://www.themoviedb.org/t/p/w600_and_h900_bestv2") {
                $posterFilm = "../Style/Images/no-poster.png";
            } else {
                $posterFilm = $film->getPosterPath();
            }
            
    ?>
        <div class="card">
            <img src="<?= $posterFilm ?>" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title"><?= $film->getTitle() ?> </h5>
                <a href="./Film.php?idFilm=<?= $film->getId() ?>" class="stretched-link"></a>
            </div>
        </div>
        <?php 
            $count++;
            if($count > 8) break;
        } 
        ?>
    </div>
</div>


<?php include_once('./Inc/footer.php');
